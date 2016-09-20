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
        'pastdays' => array(
            'numeric' => array(
                'rule' => array('numeric'),
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
    public function pastDates($data) {
        $today = date('y-m-d');
        $gotDate = $data['Stuff']['date'];
        $this->log('today: '. $today . 'gotDate: ' .$gotDate ,'debug');

        $past = (strtotime($today)-strtotime($gotDate)) / 60 / 60 / 24;
        if($past >= 0) {
            $data['Stuff']['pastdates'] = $past;
        } else {
            $data['Stuff']['pastdates'] = '-';
        }

        $this->log('id: '. $data['Stuff']['id']. '| past: '. $past ,'debug');

        // find the date of current Record
        /*
        $currentRecord = $this->find('first', array(
            'conditions' => array('Stuff.id = ' => $data['id'])
        ));
        $currentRecord['Stuff']['pastDates'] = $past;
        */
        //$this->log('current: '.$currentRecord ,'debug');

        // save just this record
        $result = $this->save($data);
        if($result == false){
            return false;
        }
        return $result;
    }
}
