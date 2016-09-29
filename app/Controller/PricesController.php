<?php
App::uses('AppController', 'Controller');
/**
 * Prices Controller
 *
 * @property Price $Price
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PricesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator' => array(
        'order' => array('Detail.id' => 'asc')
        ), 'Session', 'Flash', 'Auth');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Price->recursive = 0;

        //$this->set('prices', $this->Paginator->paginate());
        $option = array(
            'Price.user_id = ' => $this->Auth->user('id')
        );
        if($this->Auth->user('role')==='admin') {
            $this->set('prices', $this->Paginator->paginate());
        } else {
            $this->set('prices', $this->Paginator->paginate($option));
        }
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Price->exists($id)) {
			throw new NotFoundException(__('Invalid price'));
		}
		$options = array('conditions' => array('Price.' . $this->Price->primaryKey => $id));
		$this->set('price', $this->Price->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Price->create();

            //ユーザidも登録する
            $this->request->data['Price']['user_id'] = $this->Auth->user('id');

			if ($this->Price->save($this->request->data)) {
				$this->Flash->success(__('The price has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The price could not be saved. Please, try again.'));
			}
		}
		$details = $this->Price->Detail->find('list');
		$users = $this->Price->User->find('list');
		$this->set(compact('details', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Price->exists($id)) {
			throw new NotFoundException(__('Invalid price'));
		}
		if ($this->request->is(array('post', 'put'))) {

            //ユーザidも登録する
            $this->request->data['Price']['user_id'] = $this->Auth->user('id');

			if ($this->Price->save($this->request->data)) {
				$this->Flash->success(__('The price has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The price could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Price.' . $this->Price->primaryKey => $id));
			$this->request->data = $this->Price->find('first', $options);
		}
		$details = $this->Price->Detail->find('list');
		$users = $this->Price->User->find('list');
		$this->set(compact('details', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Price->id = $id;
		if (!$this->Price->exists()) {
			throw new NotFoundException(__('Invalid price'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Price->delete()) {
			$this->Flash->success(__('The price has been deleted.'));
		} else {
			$this->Flash->error(__('The price could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
