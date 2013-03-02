<?php

App::uses('AppController', 'Controller');

/**
 * Pharmacies Controller
 *
 * @property Pharmacy $Pharmacy
 */
class PharmaciesController extends AppController {

	public function setSearchOptions() {
		return array(
			'redeem_date' => __('Tanggal Tebus'),
			'prescription_id' => __('ID Resep'),
			'created_date' => __('Diagnosa Akhir'),
		);
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->set('options', $this->setSearchOptions());
		$this->Pharmacy->recursive = 0;

		# if there's search
		$model = $this->modelClass;
		if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
			$data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
		} else {
			$data = $this->paginate();
		}

		$this->set('pharmacies', $data);
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->Pharmacy->id = $id;
		if (!$this->Pharmacy->exists()) {
			throw new NotFoundException(__('Invalid pharmacy'));
		}
		$this->set('pharmacy', $this->Pharmacy->read(null, $id));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pharmacy->create();
			if ($this->Pharmacy->save($this->request->data)) {
				$this->Session->setFlash(__('The pharmacy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pharmacy could not be saved. Please, try again.'));
			}
		}
		$prescriptions = $this->Pharmacy->Prescription->find('list');
		$this->set(compact('prescriptions'));
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$this->Pharmacy->id = $id;
		if (!$this->Pharmacy->exists()) {
			throw new NotFoundException(__('Invalid pharmacy'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pharmacy->save($this->request->data)) {
				$this->Session->setFlash(__('The pharmacy has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pharmacy could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Pharmacy->read(null, $id);
		}
		$prescriptions = $this->Pharmacy->Prescription->find('list');
		$this->set(compact('prescriptions'));
	}

	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Pharmacy->id = $id;
		if (!$this->Pharmacy->exists()) {
			throw new NotFoundException(__('Invalid pharmacy'));
		}
		if ($this->Pharmacy->delete()) {
			$this->Session->setFlash(__('Pharmacy deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pharmacy was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
