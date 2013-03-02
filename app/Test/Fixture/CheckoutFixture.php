<?php
/**
 * CheckoutFixture
 *
 */
class CheckoutFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'patient_registration_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'service_grade' => array('type' => 'integer', 'null' => false, 'default' => null),
		'total_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'note' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created_date' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'updated_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'updated_by' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
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
			'patient_registration_id' => 'Lorem ipsum dolor sit ame',
			'service_grade' => 1,
			'total_cost' => 1,
			'note' => 1,
			'created_date' => 1356844733,
			'updated_date' => '2012-12-30 12:18:53',
			'created_by' => '2012-12-30 12:18:53',
			'updated_by' => '2012-12-30 12:18:53'
		),
	);

}
