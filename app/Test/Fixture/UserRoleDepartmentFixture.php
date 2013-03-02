<?php
/**
 * UserRoleDepartmentFixture
 *
 */
class UserRoleDepartmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_role_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'department_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'created_date' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'updated_date' => array('type' => 'timestamp', 'null' => true, 'default' => NULL),
		'created_by' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'updated_by' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 150, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'user_role_id' => 1,
			'department_id' => 1,
			'created_date' => 1347605768,
			'updated_date' => 1347605768,
			'created_by' => 'Lorem ipsum dolor sit amet',
			'updated_by' => 'Lorem ipsum dolor sit amet'
		),
	);
}
