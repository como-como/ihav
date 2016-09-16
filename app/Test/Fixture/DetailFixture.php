<?php
/**
 * Detail Fixture
 */
class DetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'cat_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'lowest' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'amount' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'unit' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'store' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'date' => array('type' => 'date', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'lowest' => 1,
			'amount' => 1,
			'unit' => 'Lorem ipsum dolor ',
			'store' => 'Lorem ipsum dolor sit amet',
			'date' => '2016-09-16',
			'created' => '2016-09-16 06:10:09',
			'modified' => '2016-09-16 06:10:09'
		),
	);

}
