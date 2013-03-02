<?php
App::uses('AppController', 'Controller');
/**
 * Codesets Controller
 *
 * @property Codeset $Codeset
 */
class CodesetsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Codeset->recursive = 0;
		$this->set('codesets', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Codeset->id = $id;
		if (!$this->Codeset->exists()) {
			throw new NotFoundException(__('Invalid codeset'));
		}
		$this->set('codeset', $this->Codeset->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Codeset->create();
			if ($this->Codeset->save($this->request->data)) {
				$this->Session->setFlash(__('The codeset has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The codeset could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Codeset->id = $id;
		if (!$this->Codeset->exists()) {
			throw new NotFoundException(__('Invalid codeset'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Codeset->save($this->request->data)) {
				$this->Session->setFlash(__('The codeset has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The codeset could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Codeset->read(null, $id);
		}
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
		$this->Codeset->id = $id;
		if (!$this->Codeset->exists()) {
			throw new NotFoundException(__('Invalid codeset'));
		}
		if ($this->Codeset->delete()) {
			$this->Session->setFlash(__('Codeset deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Codeset was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
