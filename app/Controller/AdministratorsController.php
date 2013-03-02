<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdministratorsController
 *
 * @author Joko Hermanto
 */
class AdministratorsController extends AppController {
    
    var $uses = array('');
    
    public function beforeFilter() {
        
//        $this->Auth->loginAction = array('controller' => 'administrators', 'action' => 'login');
//        $this->Auth->logoutRedirect = array('controller' => 'administrators', 'action' => 'login');
//        $this->Auth->loginRedirect = array('controller' => 'patientRegistrations', 'action' => 'index');
//        $this->aclNotLoggedUserRedirect = $this->Auth->logoutRedirect;
        
        parent::beforeFilter();
    }
    
    public function login() {
        $this->layout = 'login';
        
        if ($this->Session->read('Auth.User')) {
            $this->Session->setFlash(__('You are logged in!'), 'custom', array('class' => 'success'));
            $this->redirect($this->Auth->loginRedirect);
        } else if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Your username or password was incorrect.'), 'custom', array('class' => 'error'));
            }
        }
    }

    public function logout() {
        $this->Session->setFlash(__('Good-Bye'), 'custom', array('class' => 'notice'));
        $this->redirect($this->Auth->logout());
    }
    
    public function index() {
        $this->redirect(array('controller' => 'patientRegistrations', 'action' => 'index'));
    }
    
}

?>
