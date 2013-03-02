<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Employee $Employee
 * @property UserRole $UserRole
 * @property MailIn $MailIn
 * @property MailLog $MailLog
 */
class User extends AppModel {
    
    public $name = 'User';
    public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));

    public function parentNode() {
        return null;
    }

    public function beforeSave($options = array()) {
        parent::beforeSave($options);

        if (!empty($this->data['User']['user_new_password'])) {
            $this->data['User']['user_password'] = $this->data['User']['user_new_password'];
        }

        if (!empty($this->data['User']['user_password'])) {
            $this->data['User']['user_password'] = AuthComponent::password($this->data['User']['user_password']);
        }

        return true;
    }
    
    protected function loadValidation() {
        $this->validate = array(
            'user_username' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Username')),
                    'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'user_password' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => sprintf(AppConstant::getMessage(AppConstant::$ERR_EMPTY), __('Password')),
                    'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            )
        );
    }

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Employee' => array(
            'className' => 'Employee',
            'foreignKey' => 'employee_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'UserRole' => array(
            'className' => 'UserRole',
            'foreignKey' => 'user_role_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
//        'MailIn' => array(
//            'className' => 'MailIn',
//            'foreignKey' => 'employee_id',
//            'dependent' => false,
//            'conditions' => '',
//            'fields' => '',
//            'order' => '',
//            'limit' => '',
//            'offset' => '',
//            'exclusive' => '',
//            'finderQuery' => '',
//            'counterQuery' => ''
//        ),
//        'MailLog' => array(
//            'className' => 'MailLog',
//            'foreignKey' => 'user_id',
//            'dependent' => false,
//            'conditions' => '',
//            'fields' => '',
//            'order' => '',
//            'limit' => '',
//            'offset' => '',
//            'exclusive' => '',
//            'finderQuery' => '',
//            'counterQuery' => ''
//        )
    );

}
