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
    
    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
        
        if (is_null($this->controllerName))
            $this->controllerName = ucfirst($this->params['controller']);
        
        if (is_null($this->actionName))
            $this->actionName = $this->action;
    }
    
    public function isLoggedIn(){            
        $auth = new AuthComponent(new ComponentCollection());  
        $auth->Session = $this->Session;  
        $user = $auth->user();
        
        if (!empty($user)) {
            $person = new Employee();
            $result = $person->findById($user['employee_id']);
            $user['Employee'] = $result['Employee'];
            
            if (empty($this->userData))
                $this->userData = $user;            
        }        
        
        return !empty($user);  
    }  
}

?>
