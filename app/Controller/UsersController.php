<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public function setSearchOptions() {
        return array(
            'user_username' => __('Nama User'),
            'Person.person_first_name' => __('Nama Awalan'),
            'Person.person_last_name' => __('Nama Akhiran'),
            'UserRole.role_name' => __('Hak Akses'),
        );
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $options = $this->setSearchOptions();
        #$this->paginate = array('order' => 'Department.created_date desc');
        # if there's search
        $model = $this->modelClass;
        if (isset($this->data[$model]['q']) && ($this->data[$model]['c'] !== "")) {
            $data = $this->paginate($model, array(h($this->data[$model]['c']) . ' LIKE' => '%' . h($this->data[$model]['q']) . '%'));
        } else {
            $data = $this->paginate();
        }

        $this->loadModel('Person');
        foreach ($data as $idx => $dt) {
            $person = $this->Person->find('first', array('condition' => array('Person.id' => $dt['Employee']['person_id'])));
            $data[$idx]['Person'] = $person['Person'];
        }

        $this->set('users', $data);
        $this->set('options', $options);
    }

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
        $this->set('person', $this->User->Employee->Person->find('first'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {

            $existingUsername = $this->User->find('count', array('conditions' => array('user_username' => $this->request->data['User']['user_username'])));
            if ($existingUsername <= 0) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Tambah pengguna')), 'custom', array('class' => 'success'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Tambah pengguna')), 'custom', array('class' => 'error'));
                }
            } else {
                $this->Session->setFlash(__('Username sudah ada.'), 'custom', array('class' => 'error'));
            }
        }
        $employees = $this->User->Employee->find('list', array('recursive' => 1, 'fields' => array('id', 'Person.person_first_name')));
        $userRoles = $this->User->UserRole->find('list', array('fields' => array('id', 'role_name'), 'order' => array('role_priority' => 'DESC', 'role_name' => 'ASC')));
        $this->set(compact('employees', 'userRoles'));
    }

    /**
     * edit method
     *
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            if (empty($this->request->data['User']['user_password'])) {
                unset($this->request->data['User']['user_password']);
            }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Ubah pengguna')), 'custom', array('class' => 'success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Ubah pengguna')), 'custom', array('class' => 'error'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
        $employees = $this->User->Employee->find('list', array('recursive' => 1, 'fields' => array('id', 'Person.person_first_name')));
        $userRoles = $this->User->UserRole->find('list', array('fields' => array('id', 'role_name')));
        $this->set(compact('employees', 'userRoles'));
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$MSG_SUCCESS), __('Hapus pengguna')), 'custom', array('class' => 'success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(sprintf(AppConstant::getMessage(AppConstant::$ERR_FAILED), __('Hapus pengguna')), 'custom', array('class' => 'error'));
        $this->redirect(array('action' => 'index'));
    }

}
