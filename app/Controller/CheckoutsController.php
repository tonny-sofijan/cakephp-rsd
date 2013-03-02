<?php

App::uses('AppController', 'Controller');

/**
 * Checkouts Controller
 *
 * @property Checkout $Checkout
 */
class CheckoutsController extends AppController {

	public function setSearchOptions() {
		return array(
			'Checkout.created_date' => __('Tanggal Checkout'),
			'Checkout.service_grade' => __('Kelas Ruangan & Servis'),
		);
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->set('options', $this->setSearchOptions());
		$this->Checkout->recursive = 0;
		# if there's search
		$model = $this->modelClass;
		if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
			$data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
		} else {
			$data = $this->paginate();
		}
		$this->set('checkouts', $data);
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Checkout->id = $id;
		if (!$this->Checkout->exists()) {
			throw new NotFoundException(__('Invalid checkout'));
		}

		$checkout = $this->Checkout->read(null, $id);
		$this->paginate = array('order' => 'service_type_id asc');
		$checkoutDetails = $this->paginate('CheckoutDetail', array('checkout_id' => $id));

		$this->set(compact('checkout', 'checkoutDetails'));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add($patient_registration_id) {
		if ($patient_registration_id != null) {
			$checkout = $this->Checkout->find('first', array('conditions' => array('patient_registration_id' => $patient_registration_id)));
			if ($checkout !== false) {
				$this->redirect(array('action' => 'view', $checkout['Checkout']['id']));
			} else {
				if ($this->request->is('post')) {
					$this->request->data['Checkout']['patient_registration_id'] = $patient_registration_id;
					$this->Checkout->create();
					if ($this->Checkout->save($this->request->data)) {
						$this->Session->setFlash(__('The checkout has been saved'));
						$this->redirect(array('action' => 'view', $this->Checkout->id));
					} else {
						$this->Session->setFlash(__('The checkout could not be saved. Please, try again.'));
					}
				}
				$patientRegistrations = $this->Checkout->PatientRegistration->find('list');
				$patientRegistration = $this->Checkout->PatientRegistration->read(null, $patient_registration_id);
				$this->set(compact('patientRegistrations', 'patientRegistration'));
			}
		} else {
			$this->redirect(array('controller' => 'patient_registrations', 'action' => 'index'));
		}
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this->Checkout->id = $id;
		if (!$this->Checkout->exists()) {
			throw new NotFoundException(__('Invalid checkout'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Checkout->save($this->request->data)) {
				$this->Session->setFlash(__('The checkout has been saved'));
				$this->redirect(array('action' => 'view', $this->Checkout->id));
			} else {
				$this->Session->setFlash(__('The checkout could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Checkout->read(null, $id);
		}
		$patientRegistrations = $this->Checkout->PatientRegistration->find('list');
		$this->set(compact('patientRegistrations'));
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
		$this->Checkout->id = $id;
		if (!$this->Checkout->exists()) {
			throw new NotFoundException(__('Invalid checkout'));
		}
		if ($this->Checkout->delete()) {
			$this->Session->setFlash(__('Checkout deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Checkout was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
