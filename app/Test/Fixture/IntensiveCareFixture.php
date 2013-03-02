<?php
/**
 * IntensiveCareFixture
 *
 */
class IntensiveCareFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'patient_registration_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'long_hospitalization' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 3),
		'icu_cost' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'icu_note' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'patient_registration_id' => 1,
			'long_hospitalization' => 1,
			'icu_cost' => 1,
			'icu_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);
}
