<?php
App::uses('Icd10', 'Model');

/**
 * Icd10 Test Case
 *
 */
class Icd10Test extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.icd10'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Icd10 = ClassRegistry::init('Icd10');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Icd10);

		parent::tearDown();
	}

}
