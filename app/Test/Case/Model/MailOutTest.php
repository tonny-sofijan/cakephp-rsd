<?php
App::uses('MailOut', 'Model');

/**
 * MailOut Test Case
 *
 */
class MailOutTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.mail_out', 'app.department', 'app.activity', 'app.mail_in', 'app.user', 'app.person', 'app.user_role');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MailOut = ClassRegistry::init('MailOut');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MailOut);

		parent::tearDown();
	}

}
