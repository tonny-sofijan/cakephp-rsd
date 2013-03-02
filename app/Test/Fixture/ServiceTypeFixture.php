<?php
/**
 * ServiceTypeFixture
 *
 */
class ServiceTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'no' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'type_of_service' => array('type' => 'integer', 'null' => false, 'default' => null),
		'unit' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'igd_bhp_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'igd_tool_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'igd_service_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'igd_total_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'vip_bhp_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'vip_tool_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'vip_service_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'vip_total_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'top_bhp_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'top_tool_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'top_service_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'top_total_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c1_bhp_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c1_tool_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c1_service_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c1_total_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c2_bhp_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c2_tool_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c2_service_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c2_total_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c3_bhp_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c3_tool_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c3_service_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
		'c3_total_cost' => array('type' => 'integer', 'null' => false, 'default' => null),
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
			'no' => 'Lor',
			'type_of_service' => 1,
			'unit' => 'Lorem ipsum dolor sit ame',
			'igd_bhp_cost' => 1,
			'igd_tool_cost' => 1,
			'igd_service_cost' => 1,
			'igd_total_cost' => 1,
			'vip_bhp_cost' => 1,
			'vip_tool_cost' => 1,
			'vip_service_cost' => 1,
			'vip_total_cost' => 1,
			'top_bhp_cost' => 1,
			'top_tool_cost' => 1,
			'top_service_cost' => 1,
			'top_total_cost' => 1,
			'c1_bhp_cost' => 1,
			'c1_tool_cost' => 1,
			'c1_service_cost' => 1,
			'c1_total_cost' => 1,
			'c2_bhp_cost' => 1,
			'c2_tool_cost' => 1,
			'c2_service_cost' => 1,
			'c2_total_cost' => 1,
			'c3_bhp_cost' => 1,
			'c3_tool_cost' => 1,
			'c3_service_cost' => 1,
			'c3_total_cost' => 1
		),
	);

}
