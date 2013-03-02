<?php
App::uses('AppController', 'Controller');
/**
 * Hospitalizations Controller
 *
 * @property Hospitalization $Hospitalization
 */
class HospitalizationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Hospitalization->recursive = 0;
		$this->set('hospitalizations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Hospitalization->id = $id;
		if (!$this->Hospitalization->exists()) {
			throw new NotFoundException(__('Invalid hospitalization'));
		}
		$this->set('hospitalization', $this->Hospitalization->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Hospitalization->create();
			if ($this->Hospitalization->save($this->request->data)) {
				$this->Session->setFlash(__('The hospitalization has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hospitalization could not be saved. Please, try again.'));
			}
		}
		$patients = $this->Hospitalization->Patient->find('list');
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
		$this->Hospitalization->id = $id;
		if (!$this->Hospitalization->exists()) {
			throw new NotFoundException(__('Invalid hospitalization'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Hospitalization->save($this->request->data)) {
				$this->Session->setFlash(__('The hospitalization has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hospitalization could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Hospitalization->read(null, $id);
		}
		$patients = $this->Hospitalization->Patient->find('list');
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
		$this->Hospitalization->id = $id;
		if (!$this->Hospitalization->exists()) {
			throw new NotFoundException(__('Invalid hospitalization'));
		}
		if ($this->Hospitalization->delete()) {
			$this->Session->setFlash(__('Hospitalization deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Hospitalization was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
