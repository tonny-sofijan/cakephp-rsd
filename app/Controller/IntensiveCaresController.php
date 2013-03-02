<?php
App::uses('AppController', 'Controller');
/**
 * IntensiveCares Controller
 *
 * @property IntensiveCare $IntensiveCare
 */
class IntensiveCaresController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->IntensiveCare->recursive = 0;
		$this->set('intensiveCares', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->IntensiveCare->id = $id;
		if (!$this->IntensiveCare->exists()) {
			throw new NotFoundException(__('Invalid intensive care'));
		}
		$this->set('intensiveCare', $this->IntensiveCare->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->IntensiveCare->create();
			if ($this->IntensiveCare->save($this->request->data)) {
				$this->Session->setFlash(__('The intensive care has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The intensive care could not be saved. Please, try again.'));
			}
		}
		$patientRegistrations = $this->IntensiveCare->PatientRegistration->find('list');
		$this->set(compact('patientRegistrations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->IntensiveCare->id = $id;
		if (!$this->IntensiveCare->exists()) {
			throw new NotFoundException(__('Invalid intensive care'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->IntensiveCare->save($this->request->data)) {
				$this->Session->setFlash(__('The intensive care has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The intensive care could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->IntensiveCare->read(null, $id);
		}
		$patientRegistrations = $this->IntensiveCare->PatientRegistration->find('list');
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
		$this->IntensiveCare->id = $id;
		if (!$this->IntensiveCare->exists()) {
			throw new NotFoundException(__('Invalid intensive care'));
		}
		if ($this->IntensiveCare->delete()) {
			$this->Session->setFlash(__('Intensive care deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Intensive care was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
