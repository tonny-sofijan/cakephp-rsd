<?php
App::uses('AppController', 'Controller');
/**
 * Outpatients Controller
 *
 * @property Outpatient $Outpatient
 */
class OutpatientsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Outpatient->recursive = 0;
		$this->set('outpatients', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Outpatient->id = $id;
		if (!$this->Outpatient->exists()) {
			throw new NotFoundException(__('Invalid outpatient'));
		}
		$this->set('outpatient', $this->Outpatient->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Outpatient->create();
			if ($this->Outpatient->save($this->request->data)) {
				$this->Session->setFlash(__('The outpatient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The outpatient could not be saved. Please, try again.'));
			}
		}
		$patients = $this->Outpatient->Patient->find('list');
		$this->set(compact('patients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Outpatient->id = $id;
		if (!$this->Outpatient->exists()) {
			throw new NotFoundException(__('Invalid outpatient'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Outpatient->save($this->request->data)) {
				$this->Session->setFlash(__('The outpatient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The outpatient could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Outpatient->read(null, $id);
		}
		$patients = $this->Outpatient->Patient->find('list');
		$this->set(compact('patients'));
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
		$this->Outpatient->id = $id;
		if (!$this->Outpatient->exists()) {
			throw new NotFoundException(__('Invalid outpatient'));
		}
		if ($this->Outpatient->delete()) {
			$this->Session->setFlash(__('Outpatient deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Outpatient was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
