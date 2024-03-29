<?php
App::uses('Activity', 'Model');

/**
 * Activity Test Case
 *
 */
class ActivityTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.activity', 'app.department');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Activity = ClassRegistry::init('Activity');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Activity);

		parent::tearDown();
	}

}
