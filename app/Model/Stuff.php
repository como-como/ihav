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
 * Who is own this stuff?
 *
 * return: $stuff, $user
 */
    public function isOwnedBy($stuff, $user) {
        return $this->field('id', array('id' => $stuff, 'user_id' => $user)) !== false;
        //
    }

/**
 * How many days did it pass?
 *
 * if it was 'modified' before 'today', then update DB.
 * return: result
 */
    public function pastDates($data) {
        $today = date('y-m-d');
        $gotDate = $data['Stuff']['date'];

        //$this->log('(pastDates) today: '. $today . 'gotDate: ' .$gotDate ,'debug');

        $past = (strtotime($today)-strtotime($gotDate)) / 60 / 60 / 24;
        if($past >= 0) {
            $data['Stuff']['pastdates'] = $past;
        } else {
            $data['Stuff']['pastdates'] = '';
        }
        $data['Stuff']['modified'] = date('y-m-d H:i:s');

        //$this->log('(pastDates) id: '. $data['Stuff']['id']. '| past: '. $past ,'debug');

        // save just this record
        $result = $this->save($data);
        if($result == false){
            return false;
        }
        return $result;
    }

}
