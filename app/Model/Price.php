<?php
App::uses('AppModel', 'Model');
/**
 * Price Model
 *
 * @property Detail $Detail
 * @property User $User
 */
class Price extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'detail_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'detail_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'price' => array(
			'money' => array(
				'rule' => array('money'),
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Detail' => array(
			'className' => 'Detail',
			'foreignKey' => 'detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Stuff' => array(
			'className' => 'Stuff',
			'foreignKey' => 'detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
        ),
	);

/**
 * hasMany associations
 *
 * @var array
 */
/*
    public $hasMany = array(
        'Stuff' => array(
            'className' => 'Stuff',
            'foreignKey' => 'detail_id',
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
    );
*/

/**
 * Is new record in stuff table have lower price than price table?
 */
    public function lowerPrice($data) {
        $detail_id = $data['Stuff']['detail_id'];
        $uid = $data['Stuff']['user_id'];

        $currentRecord = $this->find('all', array(
            'conditions' => array(
                'and' => array(
                    'Stuff.detail_id' => $detail_id,
                    'Stuff.user_id' => $uid,
                )
            )
        ));
        foreach($currentRecord['Stuff'] as $key=>$value) {
            $this->log($key . ' : ' . $value, 'debug');
        }

        //$this->log('record:'.$currentRecord,'debug');
        $this->log('record:'.count($currentRecord),'debug');
        return $currentRecord;

        /*
        $result = $this->save($data);
        if($result == false){
            return false;
        }
        return $result;*/
    }

}
