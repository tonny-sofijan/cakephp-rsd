<?php
App::uses('MailLog', 'Model');

/**
 * MailLog Test Case
 *
 */
class MailLogTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.mail_log', 'app.user', 'app.person', 'app.user_role');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MailLog = ClassRegistry::init('MailLog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MailLog);

		parent::tearDown();
	}

}
