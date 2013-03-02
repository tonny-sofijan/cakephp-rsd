<?php
App::uses('Outpatient', 'Model');

/**
 * Outpatient Test Case
 *
 */
class OutpatientTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.outpatient',
		'app.patient',
		'app.person',
		'app.patient_registration',
		'app.medical_record',
		'app.prescription',
		'app.pharmacy',
		'app.prescription_detail',
		'app.medicament',
		'app.personalized_medicine'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Outpatient = ClassRegistry::init('Outpatient');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Outpatient);

		parent::tearDown();
	}

}
