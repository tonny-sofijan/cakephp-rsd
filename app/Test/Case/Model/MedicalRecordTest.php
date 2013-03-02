<?php
App::uses('MedicalRecord', 'Model');

/**
 * MedicalRecord Test Case
 *
 */
class MedicalRecordTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.medical_record', 'app.patient_registration', 'app.prescription');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MedicalRecord = ClassRegistry::init('MedicalRecord');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MedicalRecord);

		parent::tearDown();
	}

}
