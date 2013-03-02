<?php

App::uses('AppModel', 'Model');

/**
 * Prescription Model
 *
 * @property MedicalRecord $MedicalRecord
 * @property MedicalRecord $MedicalRecord
 * @property Pharmacy $Pharmacy
 * @property PrescriptionDetail $PrescriptionDetail
 */
class Prescription extends AppModel {

    public function afterSave($created) {
        parent::afterSave($created);

        // save created prescription id into medical record.
        if ($created) {
            $medicalRecordId = $this->data[$this->name]['medical_record_id'];
            $medicalRecordMdl = ClassRegistry::init('MedicalRecord');

            $medicalRecord = $medicalRecordMdl->find('first', array('conditions' => array('MedicalRecord.id' => $medicalRecordId)));
            if (!empty($medicalRecord)) {
                $medicalRecord['MedicalRecord']['prescription_id'] = $this->getInsertID();                                
                $medicalRecordMdl->save($medicalRecord['MedicalRecord']);
            }
        }
        
        return true;
    }
    
    public function beforeDelete($cascade = true) {
        parent::beforeDelete($cascade);
        
        $medicalRecordMdl = ClassRegistry::init('MedicalRecord');
        $medicalRecord = $medicalRecordMdl->find('first', array('conditions' => array('MedicalRecord.prescription_id' => $this->id)));
        if (!empty($medicalRecord)) {
            $medicalRecord['MedicalRecord']['prescription_id'] = null;
            $medicalRecordMdl->save($medicalRecord['MedicalRecord']);
        }
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'MedicalRecord' => array(
            'className' => 'MedicalRecord',
            'foreignKey' => 'prescription_id',
            'dependent' => false,
        ),
        'Pharmacy' => array(
            'className' => 'Pharmacy',
            'foreignKey' => 'prescription_id',
            'dependent' => false,
        ),
        'PrescriptionDetail' => array(
            'className' => 'PrescriptionDetail',
            'foreignKey' => 'prescription_id',
            'dependent' => true
        )
    );

}
