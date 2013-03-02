<?php
App::uses('Medicament', 'Model');

/**
 * Medicament Test Case
 *
 */
class MedicamentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.medicament', 'app.prescription_detail');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medicament = ClassRegistry::init('Medicament');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medicament);

		parent::tearDown();
	}

}
