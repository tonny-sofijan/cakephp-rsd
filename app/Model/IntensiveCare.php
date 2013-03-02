<?php

App::uses('AppModel', 'Model');

/**
 * IntensiveCare Model
 *
 */
class IntensiveCare extends AppModel {
    
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        
        if (!empty($this->id)) {
            unset($this->data[$this->name]['patient_registration_id']);
        }
        
    }

    protected function loadValidation() {
        $this->validate = array(
            'cause_of_accident' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Penyebab Kecelakaan'))
                ),
            ),
        );
    }

}
