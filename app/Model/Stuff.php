<?php
App::uses('AppModel', 'Model');
/**
 * Stuff Model
 *
 * @property Cat $Cat
 * @property Detail $Detail
 */
class Stuff extends AppModel {

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
		'cat_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'detail_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
		'date' => array(
			'date' => array(
				'rule' => array('date'),
			),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cat' => array(
			'className' => 'Cat',
			'foreignKey' => 'cat_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Detail' => array(
			'className' => 'Detail',
			'foreignKey' => 'detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * How many days did it pass?
 * return: past days
 */
    public function howLong($id) {

    }
}
