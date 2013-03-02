<?php
App::uses('Prescription', 'Model');

/**
 * Prescription Test Case
 *
 */
class PrescriptionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.prescription', 'app.medical_record', 'app.patient_registration', 'app.patient', 'app.person', 'app.doctor', 'app.pharmacy', 'app.prescription_detail', 'app.medicament', 'app.personalized_medicine');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Prescription = ClassRegistry::init('Prescription');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Prescription);

		parent::tearDown();
	}

}
