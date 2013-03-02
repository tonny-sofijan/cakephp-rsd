<?php
App::uses('Mytest', 'Model');

/**
 * Mytest Test Case
 *
 */
class MytestTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.mytest');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Mytest = ClassRegistry::init('Mytest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Mytest);

		parent::tearDown();
	}

}
