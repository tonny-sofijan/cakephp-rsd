<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
    
    public $log;
    public $controller;
    
/*    public function getFirePHPInstance() {
        if ($this->log == null) {
            $this->log = FirePHP::getInstance(true);
        }
    }
  */  
    function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
#        $this->getFirePHPInstance();
        
        if ($this->controller == null)
            $this->controller = $this->params['controller'];
    }
    
    public function info($label, $obj) {
        $this->log->info($obj, $label);
    }
    
}
