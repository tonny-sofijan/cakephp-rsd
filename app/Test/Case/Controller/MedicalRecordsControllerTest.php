<?php
App::uses('MedicalRecordsController', 'Controller');

/**
 * TestMedicalRecordsController *
 */
class TestMedicalRecordsController extends MedicalRecordsController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * MedicalRecordsController Test Case
 *
 */
class MedicalRecordsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.medical_record', 'app.patient_registration', 'app.prescription', 'app.aro', 'app.aco', 'app.permission', 'app.aros_aco', 'app.user_role', 'app.user', 'app.employee', 'app.person', 'app.mail_log');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MedicalRecords = new TestMedicalRecordsController();
		$this->MedicalRecords->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MedicalRecords);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}
/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}
/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}
/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}
/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}
}
