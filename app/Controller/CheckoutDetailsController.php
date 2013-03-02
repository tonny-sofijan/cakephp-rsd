<?php

App::uses('AppController', 'Controller');

/**
 * CheckoutDetails Controller
 *
 * @property CheckoutDetail $CheckoutDetail
 */
class CheckoutDetailsController extends AppController {

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->CheckoutDetail->id = $id;
		if (!$this->CheckoutDetail->exists()) {
			throw new NotFoundException(__('Invalid checkout detail'));
		}
		$this->set('checkoutDetail', $this->CheckoutDetail->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add($checkout_id) {
		if ($this->request->is('post')) {
			$this->request->data['CheckoutDetail']['checkout_id'] = $checkout_id;
			$this->CheckoutDetail->create();
			if ($this->CheckoutDetail->save($this->request->data)) {
				# calculate total and save to checkouts table
				$checkoutDetail = $this->CheckoutDetail->Checkout->read(null, $checkout_id);
				$checkoutDetailTotal = $this->CheckoutDetail->find('first', array(
					'fields' => array('sum(cd_qty * cd_cost) AS total'),
					'conditions' => array('CheckoutDetail.checkout_id' => $checkout_id)
						));
				$checkoutDetail['Checkout']['total_cost'] = $checkoutDetailTotal[0]['total'];
				$this->CheckoutDetail->Checkout->saveAll($checkoutDetail['Checkout']);

				$this->Session->setFlash(__('The checkout detail has been saved'));
				$this->redirect(array('controller' => 'checkouts', 'action' => 'view', $checkout_id));
			} else {
				$this->Session->setFlash(__('The checkout detail could not be saved. Please, try again.'));
			}
		}
		$checkout = $this->CheckoutDetail->Checkout->read(null, $checkout_id);
		$this->set(compact('checkout'));
	}

	/**
	 * delete method
	 *
	 * @throws MethodNotAllowedException
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->CheckoutDetail->id = $id;
		if (!$this->CheckoutDetail->exists()) {
			throw new NotFoundException(__('Invalid checkout detail'));
		}

		$checkoutDetail = $this->CheckoutDetail->read();
		$checkoutDetailTotal = $this->CheckoutDetail->find('first', array(
			'fields' => array('sum(cd_qty * cd_cost) AS total'),
			'conditions' => array('CheckoutDetail.checkout_id' => $checkoutDetail['Checkout']['id'])
				));
		$checkoutDetail['Checkout']['total_cost'] = $checkoutDetailTotal[0]['total'] - ($checkoutDetail['CheckoutDetail']['cd_qty'] * $checkoutDetail['CheckoutDetail']['cd_cost']);
		$this->CheckoutDetail->Checkout->save($checkoutDetail['Checkout']);

		if ($this->CheckoutDetail->delete()) {
			$this->Session->setFlash(__('Checkout detail deleted'));
			$this->redirect(array('controller' => 'checkouts', 'action' => 'view', $checkoutDetail['Checkout']['id']));
		}
		$this->Session->setFlash(__('Checkout detail was not deleted'));
		$this->redirect(array('controller' => 'checkouts', 'action' => 'view', $checkoutDetail['Checkout']['id']));
	}

}
