<?php

App::uses('AppController', 'Controller');

/**
 * Patients Controller
 *
 * @property Patient $Patient
 */
class PatientsController extends AppController {

    public function setSearchOptions() {
        return array(
            'Person.person_first_name' => __('Nama Depan'),
            'Person.person_last_name' => __('Nama Belakang'),
            'Patient.position' => __('Jabatan'),
        );
    }

    public function autoComplete() {
        if (!empty($this->data)) {
            $this->redirect(array(
                'controller' => 'patients',
                'action' => 'view', $this->data['Patient']['id']
            ));
        }
        $this->autoRender = false;
        $patients = $this->Patient->find('all', array(
            'recursive' => 1,
            'conditions' => array(
                'OR' => array(
                    'Person.person_first_name LIKE' => '%' . $_GET['term'] . '%',
                    'Person.person_last_name LIKE' => '%' . $_GET['term'] . '%'
                )
            ),
            'limit' => 8
                ));

        $model = $this->modelClass;
        $temp = array();
        foreach ($patients as $patient) {
            array_push($temp, array(
                'id' => $patient[$model]['id'],
                'label' => $patient['Patient']['patient_no'] . ' / ' . $patient['Person']['person_first_name'] . ' ' . $patient['Person']['person_last_name'] . ' / ' . $patient['Person']['person_mobile_phone'],
                'value' => $patient['Patient']['patient_no'] . ' ' . $patient['Person']['person_first_name'] . ' ' . $patient['Person']['person_last_name'] . ' / ' . $patient['Person']['person_mobile_phone'],
            ));
        }
        echo json_encode($temp);

        #echo json_encode($this->Patient->autoComplete_encode($patients));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('options', $this->setSearchOptions());
        $this->Patient->recursive = 0;

        # if there's search
        $model = $this->modelClass;
        if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
            $data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
        } else {
            $data = $this->paginate();
        }

        $this->set('patients', $data);
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Patient->id = $id;
        if (!$this->Patient->exists()) {
            throw new NotFoundException(__('Invalid patient'));
        }
		$patient = $this->Patient->read(null, $id);
		
		$this->loadModel('MedicalRecord');
		$this->MedicalRecord->recursive = 1;
		$medicalRecords = $this->Paginate('MedicalRecord', array('PatientRegistration.patient_id' => $id));
		
        $this->set(compact('patient', 'medicalRecords'));
    }
    
    public function medical_records($id = null) {
#		$medicalRecord = $this->MedicalRecord->find('all', array('conditions' =>  array('PatientRegistration.patient_id' => $id)));
		pr($medicalRecord);exit();
		
		$this->Patient->recursive = 2;
        $this->Patient->id = $id;
        if (!$this->Patient->exists()) {
            throw new NotFoundException(__('Invalid patient'));
        }
		pr($patient);exit();
        $this->set('patient', $patient);
    }
    
    private function saveOrUpdateChanges($requestData, $isCreate = true) {
        $ds = $this->Patient->getDataSource();

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
            
            // set person id into patient
            $requestData['Patient']['person_id'] = $this->Person->getInsertID();
            
            if ($isCreate)
                $this->Patient->create();
            
            $transactionClean[] = $this->Patient->save($requestData['Patient']) !== false;
            
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
        $result = $this->Patient->validationErrors + $this->Person->validationErrors;
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
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah Pasien')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah Pasien')), 'custom', array('class' => 'error'));
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
        $this->Patient->id = $id;
        if (!$this->Patient->exists()) {
            throw new NotFoundException(__('Invalid patient'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            
            $requestData = $this->request->data;            
            $result = $this->saveOrUpdateChanges($requestData, false);
            
            if ($result === true) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah Pasien')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah Pasien')), 'custom', array('class' => 'error'));
                $this->generateErrMsg($result);
            }
        } else {
            $this->request->data = $this->Patient->read(null, $id);
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
        $this->Patient->id = $id;
        if (!$this->Patient->exists()) {
            throw new NotFoundException(__('Invalid patient'));
        }
        if ($this->Patient->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus Pasien')), 'custom', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus Pasien')), 'custom', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}
