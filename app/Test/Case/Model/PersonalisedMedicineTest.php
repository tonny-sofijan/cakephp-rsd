<?php
App::uses('PersonalisedMedicine', 'Model');

/**
 * PersonalisedMedicine Test Case
 *
 */
class PersonalisedMedicineTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.personalised_medicine');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PersonalisedMedicine = ClassRegistry::init('PersonalisedMedicine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PersonalisedMedicine);

		parent::tearDown();
	}

}
