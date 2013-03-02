<?php

App::uses('AppModel', 'Model');

/**
 * UserRole Model
 *
 * @property User $User
 */
class UserRole extends AppModel {

    public $actsAs = array('Acl' => array('type' => 'requester'));

    public function parentNode() {
        return null;
    }

    public function beforeSave($options = array()) {
        parent::beforeSave($options);

        // set priority
        $priorityList = $this->data['UserRole']['priority_list'];
        $userRoleId = $this->data['UserRole']['user_role'];
        $this->data['UserRole']['role_priority'] = ($userRoleId + $priorityList);
    }

    protected function loadValidation() {
        $this->validate = array(
            'role_name' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Name'))
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            )
        );
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_role_id',
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
