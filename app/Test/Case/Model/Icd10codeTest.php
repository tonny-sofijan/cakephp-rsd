<?php
App::uses('Icd10code', 'Model');

/**
 * Icd10code Test Case
 *
 */
class Icd10codeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.icd10code',
		'app.medical_record',
		'app.patient_registration',
		'app.patient',
		'app.person',
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
		$this->Icd10code = ClassRegistry::init('Icd10code');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Icd10code);

		parent::tearDown();
	}

}
