<?php
/**
 * CheckoutDetailFixture
 *
 */
class CheckoutDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'checkout_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'service_type_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'cd_qty' => array('type' => 'integer', 'null' => false, 'default' => null),
		'cd_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
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
			'checkout_id' => 1,
			'service_type_id' => 1,
			'cd_qty' => 1,
			'cd_cost' => 1
		),
	);

}
