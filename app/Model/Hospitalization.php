<?php

App::uses('AppModel', 'Model');

/**
 * Hospitalization Model
 *
 */
class Hospitalization extends AppModel {
    
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        
        if (!empty($this->id)) {
            unset($this->data[$this->name]['patient_registration_id']);
        }
        
    }

    protected function loadValidation() {
        $this->validate = array(
            'date_in' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Tanggal Masuk'))
                ),
            ),
            'disposition' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Cara Disposisi'))
                ),
            ),
        );
    }

}
