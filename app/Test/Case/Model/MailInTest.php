<?php
App::uses('MailIn', 'Model');

/**
 * MailIn Test Case
 *
 */
class MailInTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.mail_in', 'app.user', 'app.person', 'app.user_role', 'app.department', 'app.activity', 'app.mail_out');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MailIn = ClassRegistry::init('MailIn');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MailIn);

		parent::tearDown();
	}

}
