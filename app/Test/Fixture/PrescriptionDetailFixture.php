<?php
/**
 * PrescriptionDetailFixture
 *
 */
class PrescriptionDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'prescription_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'medicament_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'personalized_medicine_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'dose' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'price' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'prescription_id' => 1,
			'medicament_id' => 1,
			'personalized_medicine_id' => 1,
			'dose' => 1,
			'price' => 1
		),
	);
}
