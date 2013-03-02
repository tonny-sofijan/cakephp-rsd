<?php
App::uses('Patient', 'Model');

/**
 * Patient Test Case
 *
 */
class PatientTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.patient', 'app.person', 'app.patient_registration', 'app.doctor', 'app.medical_record', 'app.prescription');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Patient = ClassRegistry::init('Patient');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Patient);

		parent::tearDown();
	}

}
