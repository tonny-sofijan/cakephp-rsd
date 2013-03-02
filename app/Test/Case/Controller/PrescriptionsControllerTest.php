<?php
App::uses('PrescriptionsController', 'Controller');

/**
 * TestPrescriptionsController *
 */
class TestPrescriptionsController extends PrescriptionsController {
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
 * PrescriptionsController Test Case
 *
 */
class PrescriptionsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.prescription', 'app.medical_record', 'app.patient_registration', 'app.patient', 'app.person', 'app.doctor', 'app.pharmacy', 'app.prescription_detail', 'app.medicament', 'app.personalized_medicine', 'app.aro', 'app.aco', 'app.permission', 'app.aros_aco', 'app.user_role', 'app.user', 'app.employee', 'app.mail_log');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Prescriptions = new TestPrescriptionsController();
		$this->Prescriptions->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Prescriptions);

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
