<?php
App::uses('Pharmacy', 'Model');

/**
 * Pharmacy Test Case
 *
 */
class PharmacyTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.pharmacy', 'app.prescription');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Pharmacy = ClassRegistry::init('Pharmacy');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pharmacy);

		parent::tearDown();
	}

}
