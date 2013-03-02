<?php
App::uses('UserRoleDepartmentsController', 'Controller');

/**
 * TestUserRoleDepartmentsController *
 */
class TestUserRoleDepartmentsController extends UserRoleDepartmentsController {
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
 * UserRoleDepartmentsController Test Case
 *
 */
class UserRoleDepartmentsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.user_role_department', 'app.user_role', 'app.user', 'app.employee', 'app.department', 'app.activity', 'app.mail_out', 'app.mail_log', 'app.aro', 'app.aco', 'app.permission', 'app.aros_aco');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserRoleDepartments = new TestUserRoleDepartmentsController();
		$this->UserRoleDepartments->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserRoleDepartments);

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
