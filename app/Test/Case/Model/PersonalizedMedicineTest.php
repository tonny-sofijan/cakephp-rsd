<?php
App::uses('PersonalizedMedicine', 'Model');

/**
 * PersonalizedMedicine Test Case
 *
 */
class PersonalizedMedicineTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.personalized_medicine', 'app.prescription_detail', 'app.prescription', 'app.medicament');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PersonalizedMedicine = ClassRegistry::init('PersonalizedMedicine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PersonalizedMedicine);

		parent::tearDown();
	}

}
