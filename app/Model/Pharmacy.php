<?php
App::uses('AppModel', 'Model');
/**
 * Pharmacy Model
 *
 * @property Prescription $Prescription
 */
class Pharmacy extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'prescription_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created_by' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

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
		)
	);
}
