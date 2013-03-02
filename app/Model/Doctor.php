<?php

App::uses('AppModel', 'Model');

/**
 * Doctor Model
 *
 * @property Person $Person
 * @property PatientRegistration $PatientRegistration
 */
class Doctor extends AppModel {

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
        'MedicalRecord' => array(
            'className' => 'MedicalRecord',
            'foreignKey' => 'doctor_id',
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
