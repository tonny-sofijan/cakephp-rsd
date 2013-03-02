<?php

App::uses('AppModel', 'Model');

/**
 * Icd10 Model
 *
 */
class Icd10 extends AppModel {

    protected function loadValidation() {
        $this->validate = array(
            'icd' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('ICD'))
                ),
            ),
            'dtd' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('DTD'))
                ),
            ),
            'dtd_code' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Kode DTD'))
                ),
            ),
            'dtd_group' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Grup DTD'))
                ),
            ),
        );
    }

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'MedicalRecord' => array(
            'className' => 'MedicalRecord',
            'foreignKey' => 'icd10_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}
