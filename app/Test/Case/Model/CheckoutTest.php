<?php
App::uses('Checkout', 'Model');

/**
 * Checkout Test Case
 *
 */
class CheckoutTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.icd10',
		'app.checkout_detail',
		'app.service_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Checkout = ClassRegistry::init('Checkout');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Checkout);

		parent::tearDown();
	}

}
