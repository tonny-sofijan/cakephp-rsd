<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
App::uses('Controller', 'Controller');
App::import('Vendor', 'Util/CommonUtil');
App::import('Vendor', 'Util/AppConstant');
App::import('Vendor', 'Util/FileManager');

class AppController extends Controller {

    public $view = 'Theme';
    public $theme = 'Default';
    public $components = array(
        'Acl',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array(
                        'username' => 'user_username',
                        'password' => 'user_password'
                    )
                )
            )
        ),
        'Session',
        'RequestHandler'
    );
    public $helpers = array('Html', 'Form', 'Session', 'Access', 'Converter', 'Constant', 'Js' => array('Jquery'));
    public $uses = array('AroModel', 'AcoModel', 'UserRole', 'ArosAcoModel', 'User');
    public $log;
    public $user;
    public $arosAcos;
    public $controllerName;
    public $aclNotLoggedUserRedirect;
    public $commonUtil;
    public $targetImgDir;
    public $defaultSelectedDepartmentsId = array(1, 2, 3);

    private function getFirePHPInstance() {
        if ($this->log == null) {
            $this->log = FirePHP::getInstance(true);
        }
    }

    private function initCommonUtil() {
        if ($this->commonUtil == null)
            $this->commonUtil = new CommonUtil();
    }

    private function initUserData() {

        if ($this->user == null) {
            $user = $this->Auth->user();

            $this->User->Behaviors->attach('Containable');
            $this->User->contain(array(
                'Employee.id', 'Employee.position', 'Employee.person_id', #'Employee.department_id', 'Employee.name', 'Employee.position',
                'Employee.Person',
#                'Employee.Department',
                'UserRole.id', 'UserRole.role_name', 'UserRole.role_priority',
#                'MailLog'
            ));

            $this->User->recursive = 2;
            $user = $this->User->find('first', array('conditions' => array('User.id' => $user['id'])));

            if (isset($user['Employee'])) {

                $conditions = array();
                if ($user['UserRole']['role_priority'] != AppConstant::$ROLE_PRIORITY_HEAD) {
                    $conditions = array('Person.id' => $user['Employee']['person_id']);
                }

                $person = $this->User->Employee->Person->find('list', array('conditions' => $conditions));
                $user['Employee']['Person'] = $person;
            }

            $this->user = $user;
        }

        if (is_null($this->controllerName))
            $this->controllerName = ucfirst($this->params['controller']);

        if (is_null($this->targetImgDir))
            $this->targetImgDir = AppConstant::$FILE_BASE_DIR . AppConstant::$FILE_IMG_SUB_DIR;
    }
    
    public function initAuthRedirect() {
        $this->Auth->loginAction = array('controller' => 'administrators', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'administrators', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'patientRegistrations', 'action' => 'index');        
        
        if (empty($this->user) || !is_array($this->user)) {            
            $action = array('controller' => 'administrators', 'action' => 'login');
            $this->Auth->loginRedirect = $action;
        } else {
            $this->UserRole->Behaviors->attach('Containable');
            $this->UserRole->contain(array());
            
            $userRolePriority = $this->UserRole->find('first', array(
                'conditions' => array('UserRole.id' => $this->user['UserRole']['id']),
                'fields' => array('role_priority')
            ));

            $action = array('controller' => 'patientRegistrations', 'action' => 'index');
            switch ($userRolePriority['UserRole']['role_priority']) {
                case AppConstant::$ROLE_PRIORITY_DOCTORS_STAFF:
                    $action = array('controller' => 'doctors', 'action' => 'index');
                    break;
                case AppConstant::$ROLE_PRIORITY_PHARMACY_STAFF:
                    $action = array('controller' => 'medical_records', 'action' => 'index');
                    break;
            }
            
            $this->Auth->loginRedirect = $action;
            
        }
        
        $this->aclNotLoggedUserRedirect = $this->Auth->logoutRedirect;
    }

    public function beforeFilter() {
        $this->setPageTitle();

        $this->getFirePHPInstance();
        $this->initCommonUtil();
        $this->initUserData();
        $this->initAuthRedirect();
        
        // set page referer        
        if ((!$this->request->is('post') && !$this->request->is('put') && !$this->RequestHandler->isAjax()) || ($this->request->is('post') && $this->action == 'delete')) {
            $referer = $this->referer();
            
            if (isset($_SERVER['HTTP_REFERER']))            
                $referer = $_SERVER['HTTP_REFERER'];
            
            if (preg_match("/^http:/", $referer) == false) {
                $referer = 'http://' . $referer;
            }
            
            $this->set('referer', $referer);
            $this->Session->write(AppConstant::$SESSION_REFERER, $referer);
        }

        // we allowing full access here because the actual checking will be done by aclCheck().
        $this->Auth->allow('*');

        if (!$this->aclCheck()) {
            if (empty($this->user)) {
                $this->Session->setFlash(__('Please login'), 'custom', array('class' => 'notice'));
                $this->redirect(empty($this->aclNotLoggedUserRedirect) ? '/' : $this->aclNotLoggedUserRedirect);
            } else {
                $this->Session->setFlash(__('Access denied'), 'custom', array('class' => 'error'));
                $this->redirect($this->Auth->loginRedirect);
            }
        }
    }

    private function aclCheck() {
//        return true; // hack to disable the acl check

        /*
         * Reformat controller name.
         * input: Pu_hotels, output: PuHotels.
         * input: Dashboard, output: Dashboard.
         */
        $controllerName = $this->controllerName;
        if (strpos($this->controllerName, '_') > 0) {
            $controllerNameArr = explode('_', $this->controllerName);
            $controllerName = '';
            foreach ($controllerNameArr as $cname) {
                $controllerName .= ucfirst($cname);
            }
        }
                
        $this->ArosAcoModel->Aco->recursive = -1;
        $controllerAco = $this->ArosAcoModel->Aco->find('first', array('conditions' => array('alias' => $controllerName)));
        $actionAco = $this->ArosAcoModel->Aco->find('first', array('conditions' => array('alias' => $this->action, 'parent_id' => $controllerAco['Aco']['id'])));

        // if user not logged in
        if (empty($this->user)) {
            // find user role 'User'
            $userUserRole = $this->UserRole->findByRoleName('User');

            $conditions = array(
                'ArosAcoModel.aro_id' => $userUserRole['UserRole']['id'],
                'ArosAcoModel.aco_id' => array($actionAco['Aco']['id'], $controllerAco['Aco']['id'])
            );
            $userArosAcos = $this->ArosAcoModel->find('first', array('conditions' => $conditions));

            return $userArosAcos['ArosAcoModel']['_create'] === '1';
        } else {
            $this->UserRole->recursive = -1;
            $currentUserRole = $this->UserRole->findById($this->user['UserRole']['id']);
            $meAndRolesUnderMe = $this->UserRole->find('list', array('conditions' => array('role_priority <=' => $currentUserRole['UserRole']['role_priority'])));

            // search for superadmin
            $arosAco = $this->ArosAcoModel->find('first', array(
                'conditions' => array(
                    'Aro.foreign_key' => $this->user['UserRole']['id'],
                    'Aco.alias' => 'controllers'
                )
                    ));

            // search by the action
            if (empty($arosAco)) {
                $arosAco = $this->ArosAcoModel->find('first', array(
                    'conditions' => array(
                        'Aro.foreign_key' => $meAndRolesUnderMe,
                        'Aco.parent_id' => $controllerAco['Aco']['id'],
                        'Aco.alias' => $this->action
                    )
                        ));
            }

            // search by the controller
            if (empty($arosAco)) {
                $arosAco = $this->ArosAcoModel->find('first', array(
                    'conditions' => array(
                        'Aro.foreign_key' => $meAndRolesUnderMe,
                        'Aco.alias' => $controllerName
                    )
                        ));
            }

            if (!empty($arosAco)) {
                return $arosAco['ArosAcoModel']['_create'] === '1';
            }
        }

        return false;
    }
    
    public function backToRefererPage($params = null) {
        $referer = $this->Session->read(AppConstant::$SESSION_REFERER);
        if (!is_null($params) && strpos($referer, $params) <= 0) {
            $referer .= '/' . $params;
        }
        
        $this->redirect($referer);
    }

    public function info($label, $obj = null) {
        $this->log->info($obj, $label); // firephp
//        ChromePhp::log($label, $obj); // chromephp
    }

    public function setPageTitle($pageTitleCode = null) {
        $title = null;
        if (!is_null($pageTitleCode)) {
            $title = AppConstant::getPageTitle($pageTitleCode);
        } else {
            $title = AppConstant::getPageTitle(AppConstant::$TITLE_BASIC);
        }

        $this->set('title_for_layout', $title);
    }

    public function generateErrMsg($errMsgArr) {
        foreach ($errMsgArr as $key => $val) {
            $this->set('err_' . $key, $val[0]);
        }
    }

    protected function search() {

        $args = $this->params['url'] !== null && count($this->params['url']) > 0 ? $this->params['url'] : $this->passedArgs;

        $searchBy = !empty($args['searchBy']) ? $args['searchBy'] : '';
        $keyword = !empty($args['keyword']) ? $args['keyword'] : '';
        $groupBy = !empty($args['groupBy']) ? $args['groupBy'] : '';
        $groupByKey = !empty($args['groupByKey']) ? $args['groupByKey'] : '';
        $groupByVal = !empty($args['groupByVal']) ? urldecode($args['groupByVal']) : '';
        $additionalParams = array();

        if (!empty($searchBy)) {

            $searchByArr = explode('.', $searchBy);
            $isSpecialCase = strtolower($searchByArr[0]) === 'ref';

            if ($isSpecialCase) {
                $refVal = $this->getReferenceValue(end($searchByArr), $keyword);
                $this->paginate = array('conditions' => array('LOWER(' . implode('.', array($searchByArr[1], $searchByArr[2])) . ')' => $refVal));
            } else {
                if (!empty($keyword)) {
                    $this->paginate = array('conditions' => array('LOWER(' . $searchBy . ') LIKE' => '%' . strtolower($keyword) . '%'));
                } else {
                    $this->paginate = array('conditions' => array('LOWER(' . $searchBy . ')' => null));
                }
            }
        }

        if (!empty($groupBy)) {
            $this->paginate = array_merge($this->paginate, array('group' => array($groupBy)));
        }

        if (!empty($groupByKey) && isset($this->paginate['conditions'])) {
            $this->paginate = array_merge($this->paginate['conditions'], array($groupByKey => $groupByVal));
        } else if (!empty($groupByKey)) {
            $this->paginate = array_merge($this->paginate, array('conditions' => array($groupByKey => $groupByVal)));
        }

        $additionalParams['groupByKey'] = $groupByKey;
        $additionalParams['groupByVal'] = $groupByVal;

        $this->set(compact('searchBy', 'keyword', 'groupBy', 'args', 'additionalParams'));
    }

    public function getUserRolePriority() {
        return $this->user['UserRole']['role_priority'];
    }

}
