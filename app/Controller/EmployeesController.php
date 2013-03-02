<?php

App::uses('AppController', 'Controller');

/**
 * Employees Controller
 *
 * @property Employee $Employee
 */
class EmployeesController extends AppController {

    public function setSearchOptions() {
        return array(
            'Person.person_first_name' => __('Nama Depan'),
            'Person.person_last_name' => __('Nama Belakang'),
            'Employee.position' => __('Jabatan'),
        );
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('options', $this->setSearchOptions());
        $this->Employee->recursive = 0;

        # if there's search
        $model = $this->modelClass;
        if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
            $data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
        } else {
            $data = $this->paginate();
        }

        $this->set('employees', $data);
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Employee->id = $id;
        if (!$this->Employee->exists()) {
            throw new NotFoundException(__('Invalid employee'));
        }
        $this->set('employee', $this->Employee->read(null, $id));
    }
    
    private function saveOrUpdateChanges($requestData, $isCreate = true) {
        $ds = $this->Employee->getDataSource();

        // begin transactions
        $ds->begin();
        
        try 
        {            
            $this->loadModel('Person');
            $transactionClean = array(true);
            
            if ($isCreate)
                $this->Person->create();
            
            $requestData['Person']['person_birth_date'] = $this->commonUtil->convertToDBTimestamp($requestData['Person']['person_birth_date']);
            $transactionClean[] = $this->Person->save($requestData['Person']) !== false;
            
            // set person id into employee
            $requestData['Employee']['person_id'] = $this->Person->getInsertID();
            
            if ($isCreate)
                $this->Employee->create();
            
            $transactionClean[] = $this->Employee->save($requestData['Employee']) !== false;
            
            if (!in_array(false, $transactionClean)) {
                $ds->commit();
                return true;
            } else {
                throw new Exception();
            }
            
        } catch (Exception $e) {
            $ds->rollback();            
            return $this->mergedValidationErrorMessages();
        }
    }
    
    private function mergedValidationErrorMessages() {
        $result = $this->Employee->validationErrors + $this->Person->validationErrors;
        return $result;
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            
            $requestData = $this->request->data;            
            $result = $this->saveOrUpdateChanges($requestData);
            
            if ($result === true) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah Pegawai')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah Pegawai')), 'custom', array('class' => 'error'));
                $this->generateErrMsg($result);
            }
            
        }
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Employee->id = $id;
        if (!$this->Employee->exists()) {
            throw new NotFoundException(__('Invalid employee'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            
            $requestData = $this->request->data;            
            $result = $this->saveOrUpdateChanges($requestData, false);
            
            if ($result === true) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah Pegawai')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah Pegawai')), 'custom', array('class' => 'error'));
                $this->generateErrMsg($result);
            }
            
        } else {
            $this->request->data = $this->Employee->read(null, $id);
        }
    }

    /**
     * delete method
     *
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Employee->id = $id;
        if (!$this->Employee->exists()) {
            throw new NotFoundException(__('Invalid employee'));
        }
        if ($this->Employee->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus Pegawai')), 'custom', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus Pegawai')), 'custom', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}
