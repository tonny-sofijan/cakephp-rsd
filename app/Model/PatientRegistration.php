<?php

App::uses('AppModel', 'Model');

/**
 * PatientRegistration Model
 *
 * @property Patient $Patient
 * @property MedicalRecord $MedicalRecord
 */
class PatientRegistration extends AppModel {

    protected function loadValidation() {
        $this->validate = array(
            'registration_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Registrasi'))
                ),
            ),
        );
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Patient' => array(
            'className' => 'Patient',
            'foreignKey' => 'patient_id',
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
    public $hasMany = array(
        'MedicalRecord' => array(
            'className' => 'MedicalRecord',
            'foreignKey' => 'patient_registration_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'IntensiveCare' => array(
            'className' => 'IntensiveCare',
            'foreignKey' => 'patient_registration_id',
            'dependent' => true,
        ),
        'Hospitalization' => array(
            'className' => 'Hospitalization',
            'foreignKey' => 'patient_registration_id',
            'dependent' => true,
        ),
        'Outpatient' => array(
            'className' => 'Outpatient',
            'foreignKey' => 'patient_registration_id',
            'dependent' => true,
        ),
    );

}
