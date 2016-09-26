<?php
App::uses('AppModel', 'Model');
//App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 */
class User extends AppModel {
    public $validate = array(
        'username' => array(
            'isUnique' => array(
                'rule' => 'isUnique', //重複禁止
                'message' => 'この名前は既に使用されています。'
            ),
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric', //半角英数字のみ,
                'message' => '名前は半角英数字で入力してください。'
            ),
            'required' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'ユーザ名を入力してください。'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'パスワードを入力してください。'
            ),
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric', //半角英数字のみ,
                'message' => 'パスワードは半角英数字で入力してください。'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('normal', 'admin')),
                'message' => '適切な「権限」を選択してください。',
                'allowEmpty' => false
            )
        )
    );

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        /*
        'Detail' => array(
            'className' => 'Detail',
            'foreignKey' => 'cat_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        */
        'Stuff' => array(
            'className' => 'Stuff',
            'foreignKey' => 'cat_id',
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

    //saveの前に呼び出される
    public function beforeSave($options = array()) {
        //parent::beforeSave($options);

        if (isset($this->data[$this->alias]['password'])) {
            /*
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );*/
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);

            $this->set('user', $this->Auth->request->data['User']);
            return true;
        }
    }
}