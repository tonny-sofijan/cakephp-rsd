<?php

App::uses('AppModel', 'Model');

/**
 * MedicalRecord Model
 *
 * @property PatientRegistration $PatientRegistration
 * @property Prescription $Prescription
 * @property Prescription $Prescription
 */
class MedicalRecord extends AppModel {

    protected function loadValidation() {
        $this->validate = array(
            'doctor_id' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Dokter'))
                ),
            )           
        );
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'PatientRegistration' => array(
            'className' => 'PatientRegistration',
            'foreignKey' => 'patient_registration_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Prescription' => array(
            'className' => 'Prescription',
            'foreignKey' => 'prescription_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Doctor' => array(
            'className' => 'Doctor',
            'foreignKey' => 'doctor_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Icd10' => array(
            'className' => 'Icd10',
            'foreignKey' => 'icd10_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

    /**
     * hasMany associations
     *
     * @var array
     */
//	public $hasMany = array(
//		'Prescription' => array(
//			'className' => 'Prescription',
//			'foreignKey' => 'medical_record_id',
//			'dependent' => false,
//			'conditions' => '',
//			'fields' => '',
//			'order' => '',
//			'limit' => '',
//			'offset' => '',
//			'exclusive' => '',
//			'finderQuery' => '',
//			'counterQuery' => ''
//		)
//	);
}
