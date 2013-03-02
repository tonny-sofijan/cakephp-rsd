<?php
App::uses('Doctor', 'Model');

/**
 * Doctor Test Case
 *
 */
class DoctorTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.doctor', 'app.person', 'app.patient_registration');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Doctor = ClassRegistry::init('Doctor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Doctor);

		parent::tearDown();
	}

}
