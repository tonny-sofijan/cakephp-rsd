<?php
App::uses('HospitalizationsController', 'Controller');

/**
 * HospitalizationsController Test Case
 *
 */
class HospitalizationsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hospitalization',
		'app.patient',
		'app.person',
		'app.patient_registration',
		'app.medical_record',
		'app.prescription',
		'app.pharmacy',
		'app.prescription_detail',
		'app.medicament',
		'app.personalized_medicine',
		'app.aro',
		'app.aco',
		'app.permission',
		'app.aros_aco',
		'app.user_role',
		'app.user',
		'app.employee'
	);

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
