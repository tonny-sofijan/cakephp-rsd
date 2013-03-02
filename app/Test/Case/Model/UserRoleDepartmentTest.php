<?php
App::uses('UserRoleDepartment', 'Model');

/**
 * UserRoleDepartment Test Case
 *
 */
class UserRoleDepartmentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.user_role_department', 'app.user_role', 'app.user', 'app.employee', 'app.department', 'app.activity', 'app.mail_out', 'app.mail_log');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserRoleDepartment = ClassRegistry::init('UserRoleDepartment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserRoleDepartment);

		parent::tearDown();
	}

}
