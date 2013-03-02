<?php

App::uses('AppModel', 'Model');

/**
 * Person Model
 *
 */
class Person extends AppModel {

    protected function loadValidation() {
        $this->validate = array(
            'person_first_name' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Nama Depan'))
                ),
            ),
        );
    }

}
