<?php

App::uses('AppController', 'Controller');

/**
 * PatientRegistrations Controller
 *
 * @property PatientRegistration $PatientRegistration
 */
class PatientRegistrationsController extends AppController {

    public function setSearchOptions() {
        return array(
            'PatientRegistration.id' => __('ID Pendaftaran'),
            'PatientRegistration.patient_id' => __('ID Pasien'),
            'Person.person_first_name' => __('Nama Depan Pasien'),
            'Person.person_last_name' => __('Nama Belakang Pasien'),
        );
    }

    public function MROptions() {
        return array(
            'Person' => __('Dokter'),
            'ICD' => __('Kode ICD10')
        );
    }

    public function registrationType() {
        return array(
            'hospitalization' => __('Rawat Inap'),
            'outpatient' => __('Rawat Jalan'),
            'icu' => __('IGD'),
        );
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('options', $this->setSearchOptions());
        $this->PatientRegistration->recursive = 2;
        # if there's search
        $model = $this->modelClass;
        if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
            $data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
        } else {
            $data = $this->paginate();
        }

        foreach ($data as $idx => $patientRegistration) {
            if ($patientRegistration['PatientRegistration']['registration_type'] == 'hospitalization') {
                $this->loadModel('Hospitalization');
                $hospitalization = $this->Hospitalization->find('first', array('conditions' => array('patient_registration_id' => $patientRegistration['PatientRegistration']['id'])));
                $data[$idx]['Hospitalization'] = $hospitalization['Hospitalization'];
            } elseif ($patientRegistration['PatientRegistration']['registration_type'] == 'outpatient') {
                $this->loadModel('Outpatient');
                $outpatient = $this->Outpatient->find('first', array('conditions' => array('patient_registration_id' => $patientRegistration['PatientRegistration']['id'])));
                $data[$idx]['Outpatient'] = $outpatient['Outpatient'];
            } elseif ($patientRegistration['PatientRegistration']['registration_type'] == 'icu') {
                $this->loadModel('IntensiveCare');
                $intensiveCare = $this->IntensiveCare->find('first', array('conditions' => array('patient_registration_id' => $patientRegistration['PatientRegistration']['id'])));
                $data[$idx]['intensiveCare'] = $intensiveCare['IntensiveCare'];
            }
        }

        $this->set('patientRegistrations', $data);
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->PatientRegistration->id = $id;
        if (!$this->PatientRegistration->exists()) {
            throw new NotFoundException(__('Invalid patient registration'));
        }
        $patientRegistration = $this->PatientRegistration->read(null, $id);
        $patient = $this->PatientRegistration->Patient->read(null, $patientRegistration['PatientRegistration']['patient_id']);

        if ($patientRegistration['PatientRegistration']['registration_type'] == 'hospitalization') {
            $this->loadModel('Hospitalization');
            $hospitalization = $this->Hospitalization->find('first', array('conditions' => array('patient_registration_id' => $patientRegistration['PatientRegistration']['id'])));
            $this->set(compact('hospitalization'));
        } elseif ($patientRegistration['PatientRegistration']['registration_type'] == 'outpatient') {
            $this->loadModel('Outpatient');
            $outpatient = $this->Outpatient->find('first', array('conditions' => array('patient_registration_id' => $patientRegistration['PatientRegistration']['id'])));
            $this->set(compact('outpatient'));
        } elseif ($patientRegistration['PatientRegistration']['registration_type'] == 'intensiveCare') {
            $this->loadModel('IntensiveCare');
            $intensiveCare = $this->IntensiveCare->find('first', array('conditions' => array('patient_registration_id' => $patientRegistration['PatientRegistration']['id'])));
            $this->set(compact('intensiveCare'));
        }

        $this->set('options', $this->MROptions());
        $model = 'MedicalRecord';
        $this->paginate = array('order' => 'MedicalRecord.created_date desc');
        $conditions = array('patient_registration_id' => $patientRegistration['PatientRegistration']['id']);
        
        if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
            
            $searchBy = $this->data[$model]['c'];
            $keyword = $this->data[$model]['q'];            
            
            switch (strtolower($searchBy)) {
                case 'person':
                    $people = $this->PatientRegistration->MedicalRecord->Doctor->Person->find('list', array(
                        'conditions' => array(
                            'OR' => array(
                                'LOWER(Person.person_first_name) LIKE' => '%' . strtolower($keyword) . '%',
                                'LOWER(Person.person_last_name) LIKE' => '%' . strtolower($keyword) . '%',
                            )
                        )
                    ));

                    $doctors = $this->PatientRegistration->MedicalRecord->Doctor->find('list', array(
                        'conditions' => array('Doctor.person_id' => $people)
                    ));

                    $conditions = array_merge($conditions, array('MedicalRecord.doctor_id' => $doctors));
                    break;
                case 'icd':
                    $icds = $this->PatientRegistration->MedicalRecord->Icd10->find('list', array(
                        'conditions' => array('LOWER(Icd10.icd) LIKE' => '%'. strtolower($keyword) .'%')
                    ));
                    
                    $conditions = array_merge($conditions, array('MedicalRecord.icd10_id' => $icds));
                    break;
            }
            
        }

        $medicalRecords = $this->paginate($model, $conditions);
        foreach ($medicalRecords as $idx => $medicalRecord) {
            $doctor = $this->PatientRegistration->MedicalRecord->Doctor->find('first', array('conditions' => array('Doctor.id' => $medicalRecord['Doctor']['id'])));
            $medicalRecords[$idx]['Doctor'] = $doctor;
        }

        $this->set(compact('patientRegistration', 'patient', 'medicalRecords'));
    }

    private function saveOrUpdateChanges($requestData, $isCreate = true) {
        $ds = $this->PatientRegistration->getDataSource();

        // begin transactions
        $ds->begin();
        $model = null;

        try {

            $transactionClean = array(true);

            if ($isCreate)
                $this->PatientRegistration->create();

            $transactionClean[] = $this->PatientRegistration->save($requestData) !== false;

            switch ($requestData['PatientRegistration']['registration_type']) {
                case 'hospitalization':

                    $model = 'Hospitalization';
                    $this->loadModel($model);

                    if ($isCreate)
                        $this->Hospitalization->create();

                    $requestData['Hospitalization']['patient_registration_id'] = $this->PatientRegistration->getInsertID();
                    $transactionClean[] = $this->Hospitalization->save($requestData['Hospitalization']) !== false;

                    break;
                case 'outpatient':

                    $model = 'Outpatient';
                    $this->loadModel($model);

                    if ($isCreate)
                        $this->Outpatient->create();

                    $requestData['Outpatient']['patient_registration_id'] = $this->PatientRegistration->getInsertID();
                    $transactionClean[] = $this->Outpatient->save($requestData['Outpatient']) !== false;

                    break;
                case 'icu':

                    $model = 'IntensiveCare';
                    $this->loadModel($model);

                    if ($isCreate)
                        $this->IntensiveCare->create();

                    $requestData['IntensiveCare']['patient_registration_id'] = $this->PatientRegistration->getInsertID();
                    $transactionClean[] = $this->IntensiveCare->save($requestData['IntensiveCare']) !== false;

                    break;
            }

            if (!in_array(false, $transactionClean)) {
                $ds->commit();
                return true;
            } else {
                throw new Exception();
            }
        } catch (Exception $e) {
            $ds->rollback();
            return $this->mergedValidationErrorMessages($model);
        }
    }

    private function mergedValidationErrorMessages($model) {
        $result = $this->PatientRegistration->validationErrors;

        switch ($model) {
            case 'hospitalization':
                $result += $this->Hospitalization->validationErrors;
                break;
            case 'outpatient':
                $result += $this->Outpatient->validationErrors;
                break;
            case 'intensiveCare':
                $result += $this->IntensiveCare->validationErrors;
                break;
        }

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
            $requestData['PatientRegistration']['registration_cost'] = $this->commonUtil->getCleanPrice($requestData['PatientRegistration']['registration_cost']);

            $result = $this->saveOrUpdateChanges($requestData);
            if ($result === true) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Pendaftaran Pasien')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Pendaftaran Pasien')), 'custom', array('class' => 'error'));
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
        $this->PatientRegistration->id = $id;
        $patientRegistration = $this->PatientRegistration->read(null, $id);
        if (!$this->PatientRegistration->exists()) {
            throw new NotFoundException(__('Invalid patient registration'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            $requestData = $this->request->data;
            $requestData['PatientRegistration']['registration_cost'] = $this->commonUtil->getCleanPrice($requestData['PatientRegistration']['registration_cost']);

            $result = $this->saveOrUpdateChanges($requestData, false);
            if ($result === true) {

                // if the registration type is changed then remove the old type data.
//                if ($requestData['PatientRegistration']['registration_type'] !== $requestData['PatientRegistration']['old_reg_type']) {
//                    
//                }

                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah Data Pendaftaran Pasien')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah Data Pendaftaran Pasien')), 'custom', array('class' => 'error'));
                $this->generateErrMsg($result);
            }
        } else {
            $person = $this->PatientRegistration->Patient->Person->find('first', array(
                'conditions' => array('Person.id' => $patientRegistration['Patient']['person_id']),
                'fields' => array('person_first_name', 'person_last_name', 'person_mobile_phone')
                    ));
            if (!empty($person)) {
                $patientRegistration['Person'] = $person['Person'];
            }

            switch ($patientRegistration['PatientRegistration']['registration_type']) {
                case 'hospitalization':
                    $model = 'Hospitalization';
                    break;
                case 'outpatient':
                    $model = 'Outpatient';
                    break;
                case 'icu':
                    $model = 'IntensiveCare';
                    break;
            }

            $this->loadModel($model);
            $this->DynamicModel = new $model;
            $data = $this->DynamicModel->find('first', array(
                'conditions' => array($model . '.patient_registration_id' => $patientRegistration['PatientRegistration']['id'])
            ));

            if (!empty($data)) {
                $patientRegistration[$model] = $data[$model];
            }

            $this->request->data = $patientRegistration;
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
        $this->PatientRegistration->id = $id;
        if (!$this->PatientRegistration->exists()) {
            throw new NotFoundException(__('Invalid patient registration'));
        }
        if ($this->PatientRegistration->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus Pendaftaran Pasien')), 'custom', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus Pendaftaran Pasien')), 'custom', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}
