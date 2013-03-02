<?php

App::uses('AppController', 'Controller');

/**
 * Doctors Controller
 *
 * @property Doctor $Doctor
 */
class DoctorsController extends AppController {

    public function setSearchOptions() {
        return array(
            'Person.person_first_name' => __('Nama Depan'),
            'Person.person_last_name' => __('Nama Belakang'),
            'Doctor.doctor_specialty' => __('Spesialis dibidang'),
            'Doctor.doctor_license_id' => __('Lisensi dokter'),
        );
    }

    public function autoComplete() {
        if (!empty($this->data)) {
            $this->redirect(array(
                'controller' => 'doctors',
                'action' => 'view', $this->data['Doctor']['id']
            ));
        }
        $this->autoRender = false;
        $doctors = $this->Doctor->find('all', array(
            'conditions' => array(
                'OR' => array(
                    'Person.person_first_name LIKE' => '%' . $_GET['term'] . '%',
                    'Person.person_last_name LIKE' => '%' . $_GET['term'] . '%',
                    'Doctor.doctor_specialty LIKE' => '%' . $_GET['term'] . '%'
                )
            ),
            'limit' => 8
                ));

        $model = $this->modelClass;
        $temp = array();
        foreach ($doctors as $doctor) {
            array_push($temp, array(
                'id' => $doctor[$model]['id'],
                'label' => $doctor['Doctor']['doctor_specialty'] . ' / ' . $doctor['Person']['person_first_name'] . ' ' . $doctor['Person']['person_last_name'] . ' / ' . $doctor['Person']['person_mobile_phone'],
                'value' => $doctor['Doctor']['doctor_specialty'] . ' / ' . $doctor['Person']['person_first_name'] . ' ' . $doctor['Person']['person_last_name'] . ' / ' . $doctor['Person']['person_mobile_phone'],
            ));
        }
        echo json_encode($temp);

        #echo json_encode($this->Doctor->autoComplete_encode($doctors));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('options', $this->setSearchOptions());
        $this->Doctor->recursive = 0;

        # if there's search
        $model = $this->modelClass;
        if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
            $data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
        } else {
            $data = $this->paginate();
        }

        $this->set('doctors', $data);
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Doctor->id = $id;
        if (!$this->Doctor->exists()) {
            throw new NotFoundException(__('Invalid doctor'));
        }
        $this->set('doctor', $this->Doctor->read(null, $id));
    }
    
    private function saveOrUpdateChanges($requestData, $isCreate = true) {
        $ds = $this->Doctor->getDataSource();

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
            
            // set person id into doctor
            $requestData['Doctor']['person_id'] = $this->Person->getInsertID();
            
            if ($isCreate)
                $this->Doctor->create();
            
            $transactionClean[] = $this->Doctor->save($requestData['Doctor']) !== false;
            
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
        $result = $this->Doctor->validationErrors + $this->Person->validationErrors;
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
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah Dokter')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah Dokter')), 'custom', array('class' => 'error'));
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
        $this->Doctor->id = $id;
        if (!$this->Doctor->exists()) {
            throw new NotFoundException(__('Invalid doctor'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            
            $requestData = $this->request->data;            
            $result = $this->saveOrUpdateChanges($requestData, false);
            
            if ($result === true) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah Dokter')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah Dokter')), 'custom', array('class' => 'error'));
                $this->generateErrMsg($result);
            }
            
        } else {
            $this->request->data = $this->Doctor->read(null, $id);
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
        $this->Doctor->id = $id;
        if (!$this->Doctor->exists()) {
            throw new NotFoundException(__('Invalid doctor'));
        }
        if ($this->Doctor->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus Dokter')), 'custom', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus Dokter')), 'custom', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}
