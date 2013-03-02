<?php
App::uses('PersonalisedMedicinesController', 'Controller');

/**
 * TestPersonalisedMedicinesController *
 */
class TestPersonalisedMedicinesController extends PersonalisedMedicinesController {
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
 * PersonalisedMedicinesController Test Case
 *
 */
class PersonalisedMedicinesControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.personalised_medicine', 'app.aro', 'app.aco', 'app.permission', 'app.aros_aco', 'app.user_role', 'app.user', 'app.employee', 'app.person', 'app.mail_log');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PersonalisedMedicines = new TestPersonalisedMedicinesController();
		$this->PersonalisedMedicines->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PersonalisedMedicines);

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
