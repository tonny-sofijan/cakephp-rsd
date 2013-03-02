<?php
App::uses('PrescriptionDetail', 'Model');

/**
 * PrescriptionDetail Test Case
 *
 */
class PrescriptionDetailTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.prescription_detail', 'app.prescription', 'app.medicament', 'app.personalized_medicine');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PrescriptionDetail = ClassRegistry::init('PrescriptionDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PrescriptionDetail);

		parent::tearDown();
	}

}
