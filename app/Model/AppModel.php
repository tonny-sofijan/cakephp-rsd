<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
App::import('Component', 'Auth');
//App::import('Model', 'Employee');
class AppModel extends Model {
    
    var $helpers = array("Session");
    
    public $user;
    public $insertedIds = array();
    public $insertedData = array();
    
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        
        if (empty($this->user)) {
            $auth = new AuthComponent(new ComponentCollection());  
            $auth->Session = $this->Session;        
            $this->user = $auth->user();
        }
    }
    
    protected function loadValidation() { $this->validate = array(); }
    
    public function beforeValidate($options = array()) {
        $this->loadValidation();
        return true;
    }
    
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
                
        $createdBy = '';
        if (!empty($this->user)) {
            $personMdl = ClassRegistry::init('Employee');
            $person = $personMdl->findById($this->user['employee_id']);
#            $createdBy = $person['Employee']['name'];
            $createdBy = $this->user['id'];
        }
        
        $key = key($this->data);
        if (empty($this->data[$key]['id'])) {
            $this->data[$key]['created_by'] = $createdBy;
            $this->data[$key]['created_date'] = date('Y-m-d h:i:s', time());
        } else {
            $this->data[$key]['updated_by'] = $createdBy;
            $this->data[$key]['updated_date'] = date('Y-m-d h:i:s', time());
        }
    }
    
    public function afterSave($created) {
        if ($created) {            
            $this->insertedIds[] = $this->getInsertID();
            $this->insertedData[] = $this->data;
        }
        
        return true;
    }
    
    public function saveAttachments($photos, $moduleCode) {
        $attachmentMdl = ClassRegistry::init('AttachmentFile');
        $photosArr = explode('^', $photos);
        foreach ($photosArr as $photo) {
            $data['AttachmentFile']['atf_owner_code'] = $moduleCode;
            $data['AttachmentFile']['atf_owner_pk'] = $this->getInsertID();
            $data['AttachmentFile']['atf_filename'] = $photo;
            $data['AttachmentFile']['atf_location'] = AppConstant::$FILE_IMG_SUB_DIR . strtolower($moduleCode);

            $attachmentMdl->create();
            $attachmentMdl->save($data);
        }
    }
    
    //====== CUSTOM VALIDATION ======//
    public function findCurrencyId($check) {
        $key = key($this->data);
        
        $currencyMdl = ClassRegistry::init('Currency');
        $currency = $currencyMdl->find('first', array('conditions' => $check));
        if (!empty($currency)) {
            $this->data[$key]['currency_id'] = $currency['Currency']['id'];
        }
        
        return true;
    }
    
    public function notExists($check) {
        $existingRecord = $this->find('count', array('conditions' => $check, 'recursive' => -1));
        
        if ($existingRecord > 0)
            $this->data = array();
        
        return true;
    }
    
}
