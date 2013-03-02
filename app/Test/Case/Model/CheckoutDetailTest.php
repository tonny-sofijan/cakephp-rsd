<?php
App::uses('CheckoutDetail', 'Model');

/**
 * CheckoutDetail Test Case
 *
 */
class CheckoutDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.checkout_detail',
		'app.checkout',
		'app.service_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CheckoutDetail = ClassRegistry::init('CheckoutDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CheckoutDetail);

		parent::tearDown();
	}

}
