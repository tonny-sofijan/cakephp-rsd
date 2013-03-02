<?php
App::uses('PatientRegistration', 'Model');

/**
 * PatientRegistration Test Case
 *
 */
class PatientRegistrationTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.patient_registration', 'app.patient', 'app.doctor', 'app.person', 'app.medical_record', 'app.prescription');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PatientRegistration = ClassRegistry::init('PatientRegistration');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PatientRegistration);

		parent::tearDown();
	}

}
