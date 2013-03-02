<?php
App::uses('PatentMedicine', 'Model');

/**
 * PatentMedicine Test Case
 *
 */
class PatentMedicineTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.patent_medicine');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PatentMedicine = ClassRegistry::init('PatentMedicine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PatentMedicine);

		parent::tearDown();
	}

}
