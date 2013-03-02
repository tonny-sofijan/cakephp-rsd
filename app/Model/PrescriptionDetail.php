<?php

App::uses('AppModel', 'Model');

/**
 * PrescriptionDetail Model
 *
 * @property Prescription $Prescription
 * @property Medicament $Medicament
 * @property PersonalizedMedicine $PersonalizedMedicine
 */
class PrescriptionDetail extends AppModel {

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Prescription' => array(
            'className' => 'Prescription',
            'foreignKey' => 'prescription_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Medicament' => array(
            'className' => 'Medicament',
            'foreignKey' => 'medicament_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'PersonalizedMedicine' => array(
            'className' => 'PersonalizedMedicine',
            'foreignKey' => 'personalized_medicine_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'PatentMedicine' => array(
            'className' => 'PatentMedicine',
            'foreignKey' => 'patent_medicine_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

}
