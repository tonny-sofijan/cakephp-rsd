<?php

App::uses('AppModel', 'Model');

/**
 * Medicament Model
 *
 * @property PrescriptionDetail $PrescriptionDetail
 */
class Medicament extends AppModel {

    protected function loadValidation() {
        $this->validate = array(
            'serial' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('No. Seri obat'))
                ),
            ),
            'name' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Nama obat'))
                ),
            ),
            'price_of_capital' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Harga modal'))
                ),
            ),
            'selling_price' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Harga jual'))
                ),
            ),
            'stock' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Stok obat'))
                ),
            ),
            'unit_of_measure' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Satuan / Ukuran'))
                ),
            ),
        );
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'PrescriptionDetail' => array(
            'className' => 'PrescriptionDetail',
            'foreignKey' => 'medicament_id',
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
