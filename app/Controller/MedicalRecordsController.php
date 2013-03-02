<?php

App::uses('AppController', 'Controller');

/**
 * MedicalRecords Controller
 *
 * @property MedicalRecord $MedicalRecord
 */
class MedicalRecordsController extends AppController {

    public function setSearchOptions() {
        return array(
            'physical_check' => __('Cek Fisik'),
            'patient_information' => __('Keterangan Pasien'),
            'diagnoses_of_the_patient' => __('Diagnosa Akhir'),
        );
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->set('options', $this->setSearchOptions());
        $this->MedicalRecord->recursive = 0;

        # if there's search
        $model = $this->modelClass;
        if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
            $data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
        } else {
            $data = $this->paginate();
        }
        $this->set('medicalRecords', $data);
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->MedicalRecord->id = $id;
        if (!$this->MedicalRecord->exists()) {
            throw new NotFoundException(__('Invalid medical record'));
        }
        $medicalRecord = $this->MedicalRecord->read(null, $id);
        $patient = $this->MedicalRecord->PatientRegistration->Patient->find('first', array('recursive' => 0, 'conditions' => array('Patient.id' => $medicalRecord['PatientRegistration']['patient_id'])));
        $doctor = $this->MedicalRecord->Doctor->find('first', array('recursive' => 0, 'conditions' => array('Doctor.id' => $medicalRecord['Doctor']['id'])));
        $this->set(compact('medicalRecord', 'patient', 'doctor'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($patient_registration_id = null) {
        if (is_null($patient_registration_id)) {
            throw new NotFoundException(__('Invalid medical record'));
        }        
        
//        $medicalRecord = $this->MedicalRecord->find('first', array('conditions' => array('patient_registration_id' => $patient_registration_id)));
//        if ($medicalRecord !== false) {
//                $this->redirect(array('action' => 'view', $medicalRecord['MedicalRecord']['id']));
//                exit();
//        }        
        
        if ($this->request->is('post')) {            
            $this->MedicalRecord->create();
            if ($this->MedicalRecord->save($this->request->data)) {
                # make prescription too for this medical records

                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah Rekam Medis')), 'custom', array('class' => 'success'));
                $this->redirect(array('controller' => 'patient_registrations', 'action' => 'view', $this->request->data['MedicalRecord']['patient_registration_id']));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah Rekam Medis')), 'custom', array('class' => 'error'));
            }
        }
        $this->set(compact('patient_registration_id'));
        
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->MedicalRecord->id = $id;
        if (!$this->MedicalRecord->exists()) {
            throw new NotFoundException(__('Invalid medical record'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->MedicalRecord->save($this->request->data)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah Rekam Medis')), 'custom', array('class' => 'success'));
                $this->redirect(array('controller' => 'patient_registrations', 'action' => 'view', $this->request->data['MedicalRecord']['patient_registration_id']));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah Rekam Medis')), 'custom', array('class' => 'error'));
            }
        } else {
            $medicalRecord = $this->MedicalRecord->read(null, $id);
            $person = $this->MedicalRecord->Doctor->Person->find('first', array(
                'conditions' => array('Person.id' => $medicalRecord['Doctor']['person_id']),
                'fields' => array('person_first_name', 'person_last_name', 'person_mobile_phone')
            ));
            $medicalRecord['Person'] = $person['Person'];
            
            $this->request->data = $medicalRecord;            
            $this->info('medical record', $medicalRecord);
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
        $this->MedicalRecord->id = $id;
        if (!$this->MedicalRecord->exists()) {
            throw new NotFoundException(__('Invalid medical record'));
        }
        
        $medicalRecord = $this->MedicalRecord->read(null, $id);
        if ($this->MedicalRecord->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus Rekam Medis')), 'custom', array('class' => 'success'));
            $this->redirect(array('controller' => 'patient_registrations', 'action' => 'view', $medicalRecord['MedicalRecord']['patient_registration_id']));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus Rekam Medis')), 'custom', array('class' => 'error'));
        $this->redirect(array('controller' => 'patient_registrations', 'action' => 'view', $medicalRecord['MedicalRecord']['patient_registration_id']));
    }

}
