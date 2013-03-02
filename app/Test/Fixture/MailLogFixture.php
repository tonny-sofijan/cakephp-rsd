<?php
/**
 * MailLogFixture
 *
 */
class MailLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'mail_type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mail_pk' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 32, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3),
		'mail_prev_status' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 1),
		'mail_current_status' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 1),
		'created_date' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'created_by' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
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
			'mail_type' => 'Lorem ipsum dolor sit ame',
			'mail_pk' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'mail_prev_status' => 1,
			'mail_current_status' => 1,
			'created_date' => 1339946341,
			'created_by' => 1339946341
		),
	);
}
