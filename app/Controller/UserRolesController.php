<?php

App::uses('AppController', 'Controller');

/**
 * UserRoles Controller
 *
 * @property UserRole $UserRole
 */
class UserRolesController extends AppController {
    
    public function beforeFilter() {
        parent::beforeFilter();
        
        switch ($this->action) {
            case 'add':
            case 'edit':
                $userRoles = $this->UserRole->find('list', array('fields' => array('role_priority', 'role_name')));
                $this->set('userRoles', $userRoles);
                break;
        }
        
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->UserRole->recursive = 0;
        
        $paginate['order'] = array('role_priority' => 'DESC');
        $this->paginate = $paginate;
        $userRoles = $this->paginate();
        
        $this->set('userRoles', $userRoles);
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->UserRole->id = $id;
        if (!$this->UserRole->exists()) {
            throw new NotFoundException(__('Invalid user role'));
        }
        $this->set('userRole', $this->UserRole->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->UserRole->create();
            if ($this->UserRole->save($this->request->data)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah hak akses')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah hak akses')), 'custom', array('class' => 'error'));
            }
        }
        $userRoles = $this->UserRole->find('list', array('fields' => array('role_priority', 'role_name')));
        $this->set('userRoles', $userRoles);
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->UserRole->id = $id;
        if (!$this->UserRole->exists()) {
            throw new NotFoundException(__('Invalid user role'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->UserRole->save($this->request->data)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah hak akses')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah hak akses')), 'custom', array('class' => 'error'));
            }
        } else {
            $this->request->data = $this->UserRole->read(null, $id);
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
        $this->UserRole->id = $id;
        if (!$this->UserRole->exists()) {
            throw new NotFoundException(__('Invalid user role'));
        }
        if ($this->UserRole->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus hak akses')), 'custom', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus hak akses')), 'custom', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}
