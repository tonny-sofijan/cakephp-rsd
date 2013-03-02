<?php

App::uses('AppController', 'Controller');
require_once APP . 'Vendor' . DS . 'PHPExcel' . DS . 'PHPExcel.php';

/**
 * ToExcel Controller
 *
 * @property CheckoutDetail $CheckoutDetail
 */
class ToExcelController extends AppController {

	public $helpers = array('PhpExcel');
	public $view = 'Default';
	public $theme = 'Excel';

	public function checkout($id = null) {
		$this->loadModel('Checkout');
		$this->Checkout->recursive = 2;
		$this->Checkout->id = $id;
		if (!$this->Checkout->exists()) {
			throw new NotFoundException(__('Invalid checkout'));
		}
		$checkout = $this->Checkout->read(null, $id);
		
		if ($checkout !== false) {
			$this->loadModel('Person');
			$this->Person->recursive = 0;
			$person = $this->Person->read(null, $checkout['PatientRegistration']['Patient']['id']);
		}
		$this->set(compact('checkout', 'person'));
	}

}
