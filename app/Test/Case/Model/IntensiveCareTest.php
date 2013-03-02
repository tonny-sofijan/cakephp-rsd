<?php
App::uses('IntensiveCare', 'Model');

/**
 * IntensiveCare Test Case
 *
 */
class IntensiveCareTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.intensive_care', 'app.patient_registration', 'app.patient', 'app.person', 'app.doctor', 'app.medical_record', 'app.prescription', 'app.pharmacy', 'app.prescription_detail', 'app.medicament', 'app.personalized_medicine');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->IntensiveCare = ClassRegistry::init('IntensiveCare');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->IntensiveCare);

		parent::tearDown();
	}

}
