<?php
/**
 * Stuff Fixture
 */
class StuffFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'cat_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'detail_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'amount' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => '量'),
		'unit' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'comment' => '単位', 'charset' => 'utf8'),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'store' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'cat_id' => 1,
			'detail_id' => 1,
			'amount' => 1,
			'unit' => 'Lorem ipsum dolor ',
			'date' => '2016-09-16',
			'price' => 1,
			'store' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-09-16 05:38:05',
			'modified' => '2016-09-16 05:38:05'
		),
	);

}
