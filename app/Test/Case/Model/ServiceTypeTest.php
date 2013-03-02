<?php
App::uses('ServiceType', 'Model');

/**
 * ServiceType Test Case
 *
 */
class ServiceTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.service_type',
		'app.checkout_detail',
		'app.checkout',
		'app.patient_registration',
		'app.patient',
		'app.person',
		'app.medical_record',
		'app.prescription',
		'app.pharmacy',
		'app.prescription_detail',
		'app.medicament',
		'app.personalized_medicine',
		'app.doctor',
		'app.icd10'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ServiceType = ClassRegistry::init('ServiceType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ServiceType);

		parent::tearDown();
	}

}
