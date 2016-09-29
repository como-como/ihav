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

        //$this->log('$detail_id:'.$detail_id . ',$uid:' . $uid, 'debug');

        $priceRecord = $this->find('all', array(
            'conditions' => array(
                'and' => array(
                    'Price.detail_id' => $detail_id,
                    'Price.user_id' => $uid,
                )
            )
        ));
        //$this->log('$priceRecordの数:'.count($priceRecord), 'debug');

        /*if(count($priceRecord) == 0){
            return false;
        }*/
        if($data['Stuff']['price']==='' || $data['Stuff']['price']===null) {
            return false;
        } else if($data['Stuff']['price']<=0) {
            return false;
        }

        //数量が2以上のときは、1つあたりの価格を出す（Stuff）
        if($data['Stuff']['amount']>1) {
            $s_price = $data['Stuff']['price'] / $data['Stuff']['amount'];
            //$this->log('1つあたりのs_price:'.$s_price, 'debug');
        } else {
            $s_price = $data['Stuff']['price'];
            //$this->log('登録したs_price:'.$s_price, 'debug');
        }

        $unedit = 0;
        for($i=0; $i<count($priceRecord); $i++) {
            //$this->log('いまここ:'.$i, 'debug');

            //数量が2以上のときは、1つあたりの価格を出す（Price）
            if($priceRecord[$i]['Price']['amount']>1) {
                $p_price = $priceRecord[$i]['Price']['price'] / $priceRecord[$i]['Price']['amount'];
                //$this->log('1つあたりのp_price:'.$p_price, 'debug');
            } else {
                $p_price = $priceRecord[$i]['Price']['price'];
                //$this->log('登録済のp_price:'.$p_price, 'debug');
            }

            //単位が同一の場合
            if($data['Stuff']['unit']===$priceRecord[$i]['Price']['unit']) {
                //登録する価格＜そこね表の価格　のとき
                if ($s_price < $p_price) {
                    $priceRecord[$i]['Price']['price'] = $data['Stuff']['price'];
                    $priceRecord[$i]['Price']['amount'] = $data['Stuff']['amount'];
                    $priceRecord[$i]['Price']['store'] = $data['Stuff']['store'];
                }
                //$this->log('単位が同じ'.$data['Stuff']['unit'].'と'.$priceRecord[$i]['Price']['unit'], 'debug');
            } else {
                $unedit += 1;
                //$this->log('単位が違う（'.$unedit.'こめi:'.$i.'）'.$data['Stuff']['unit'].'と'.$priceRecord[$i]['Price']['unit'], 'debug');
            }
        }

        //単位が同一のものが1つもなかったら新規保存する
        if($unedit===count($priceRecord)) {
            //$this->log('単位が同一のものがなかった'.$data['User']['id'], 'debug');
            $createId = $this->GetNewId();
            //$this->log('createId:'.$createId, 'debug');

            $priceRecord[$i+1]['Price']['id'] = $createId;
            $priceRecord[$i+1]['Price']['detail_id'] = $data['Stuff']['detail_id'];
            $priceRecord[$i+1]['Price']['price'] = $data['Stuff']['price'];
            $priceRecord[$i+1]['Price']['amount'] = $data['Stuff']['amount'];
            $priceRecord[$i+1]['Price']['unit'] = $data['Stuff']['unit'];
            $priceRecord[$i+1]['Price']['store'] = $data['Stuff']['store'];
            $priceRecord[$i+1]['Price']['date'] = $data['Stuff']['date'];
            $priceRecord[$i+1]['Price']['user_id'] = $uid;
            /*
            foreach($priceRecord[$i+1]['Price'] as $key=>$value) {
                $this->log('$priceRecord[i+1]:'.$key . ' : '. $value, 'debug');
            }
            */
        }

        //$this->log('data: '.$currentRecord[0]['Stuff']['id'], 'debug');
        //$this->log('count: '.count($currentRecord), 'debug');

        /*
        foreach($currentRecord as $key=>$value) {
            //$this->log('currentRecord1:'.$key . ' : ' . $value, 'debug');
            foreach($value as $key2=>$value2) {
                $this->log('currentRecord2:'.$key2 . ' : ' . $value2, 'debug');
                foreach($value2 as $key3=>$value3) {
                    //$this->log('currentRecord3:'.$key3 . ' : ' . $value3, 'debug');
                }
            }
        }
        */

        return $this->saveAll($priceRecord);

        /*
        $result = $this->save($data);
        if($result == false){
            return false;
        }
        return $result;*/
    }

/**
 * get id for CREATE new table on Price
 *
 */
    function GetNewId() {
        $sql =  "SELECT max(id)+1 as ID FROM prices";
        $ret = $this->query($sql);
        return $ret[0][0]['ID'];
    }

}
