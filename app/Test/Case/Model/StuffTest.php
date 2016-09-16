<?php
App::uses('Stuff', 'Model');

/**
 * Stuff Test Case
 */
class StuffTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.stuff',
		'app.cat',
		'app.detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Stuff = ClassRegistry::init('Stuff');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Stuff);

		parent::tearDown();
	}

}
