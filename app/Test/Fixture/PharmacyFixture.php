<?php
/**
 * PharmacyFixture
 *
 */
class PharmacyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'redeem_date' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'prescription_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'created_date' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'updated_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'updated_by' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
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
			'redeem_date' => '2012-12-03 23:09:41',
			'prescription_id' => 1,
			'created_date' => 1354550981,
			'updated_date' => '2012-12-03 23:09:41',
			'created_by' => 1,
			'updated_by' => 1
		),
	);
}
