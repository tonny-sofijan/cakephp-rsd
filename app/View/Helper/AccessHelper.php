<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserAccessHelper
 *
 * @author Joko Hermanto
 */
App::import('Component', 'Auth');
App::import('Model', 'Employee');

class AccessHelper extends AppHelper {

    var $helpers = array("Session");
    public $userData;
    public $controllerName;
    public $actionName;
    public $rolePriorities;

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);

        if (is_null($this->controllerName))
            $this->controllerName = ucfirst($this->params['controller']);

        if (is_null($this->actionName))
            $this->actionName = $this->action;

        $auth = new AuthComponent(new ComponentCollection());
        $auth->Session = $this->Session;
        $user = $auth->user();

        if (!empty($user)) {
            $userMdl = ClassRegistry::init('User');

            $userMdl->Behaviors->attach('Containable');
            $userMdl->contain(array(
                'Employee.id', 'Employee.position', 'Employee.person_id', #'Employee.department_id', 'Employee.name', 'Employee.position',
                'Employee.Person',
#                'Employee.Department',
                'UserRole.id', 'UserRole.role_name', 'UserRole.role_priority',
#                'MailLog'
            ));

            $userMdl->recursive = 2;
            $user = $userMdl->find('first', array('conditions' => array('User.id' => $user['id'])));

            if (isset($user['Employee'])) {
                $person = $userMdl->Employee->Person->find('list', array('conditions' => array('Person.id' => $user['Employee']['person_id'])));
                $user['Employee']['Person'][] = $user['Employee']['person_id'];
                $user['Employee']['Person'] = array_merge($user['Employee']['Person'], $person);
            }

            if (empty($this->userData))
                $this->userData = $user;
        }
        
        // set role priorities
        $this->rolePriorities = array(
            'admin' => AppConstant::$ROLE_PRIORITY_ADMIN,
            'head' => AppConstant::$ROLE_PRIORITY_HEAD,
            'finance' => AppConstant::$ROLE_PRIORITY_FINANCE_STAFF,
            'medical_record' => AppConstant::$ROLE_PRIORITY_MEDICAL_RECORD_STAFF,
            'patient_reg' => AppConstant::$ROLE_PRIORITY_PATIENT_REG_STAFF,
            'emergency' => AppConstant::$ROLE_PRIORITY_EMERGENCY_STAFF,
            'pharmacy' => AppConstant::$ROLE_PRIORITY_PHARMACY_STAFF,
            'doctor' => AppConstant::$ROLE_PRIORITY_DOCTORS_STAFF
        );
    }

    public function isLoggedIn() {
        return !empty($this->userData);
    }

}

?>
