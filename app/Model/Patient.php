<?php

App::uses('AppModel', 'Model');

/**
 * Patient Model
 *
 * @property Person $Person
 * @property PatientRegistration $PatientRegistration
 */
class Patient extends AppModel {

    protected function loadValidation() {
        $this->validate = array(
            'patient_no' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('No. Pasien'))
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
        'Person' => array(
            'className' => 'Person',
            'foreignKey' => 'person_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'PatientRegistration' => array(
            'className' => 'PatientRegistration',
            'foreignKey' => 'patient_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
