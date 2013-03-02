<?php

App::uses('AppModel', 'Model');

/**
 * ServiceType Model
 *
 * @property CheckoutDetail $CheckoutDetail
 */
class ServiceType extends AppModel {

    protected function loadValidation() {
        $this->validate = array(
            'no' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('No. Layanan'))
                ),
            ),
            'type_of_service' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Jenis Layanan'))
                ),
            ),
            'unit' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Unit'))
                ),
            ),
            'igd_bhp_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya ICU BHP'))
                ),
            ),
            'igd_tool_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya ICU Alat'))
                ),
            ),
            'igd_service_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya ICU Layanan'))
                ),
            ),
            'igd_total_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya ICU Total'))
                ),
            ),
            'vip_bhp_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya VIP BHP'))
                ),
            ),
            'vip_tool_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya VIP Alat'))
                ),
            ),
            'vip_service_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya VIP Layanan'))
                ),
            ),
            'vip_total_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya VIP Total'))
                ),
            ),
            'top_bhp_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Utama BHP'))
                ),
            ),
            'top_tool_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Utama Alat'))
                ),
            ),
            'top_service_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Utama Layanan'))
                ),
            ),
            'top_total_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Utama Total'))
                ),
            ),
            'c1_bhp_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 1 BHP'))
                ),
            ),
            'c1_tool_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 1 Alat'))
                ),
            ),
            'c1_service_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 1 Layanan'))
                ),
            ),
            'c1_total_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 1 Total'))
                ),
            ),
            'c2_bhp_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 2 BHP'))
                ),
            ),
            'c2_tool_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 2 Alat'))
                ),
            ),
            'c2_service_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 2 Layanan'))
                ),
            ),
            'c2_total_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 2 Total'))
                ),
            ),
            'c3_bhp_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 3 BHP'))
                ),
            ),
            'c3_tool_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 3 Alat'))
                ),
            ),
            'c3_service_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 3 Layanan'))
                ),
            ),
            'c3_total_cost' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Biaya Kelas 3 Total'))
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
        'CheckoutDetail' => array(
            'className' => 'CheckoutDetail',
            'foreignKey' => 'service_type_id',
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
