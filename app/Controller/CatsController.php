<?php
App::uses('AppController', 'Controller');
/**
 * Cats Controller
 *
 * @property Cat $Cat
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CatsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cat->recursive = 0;
		$this->set('cats', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cat->exists($id)) {
			throw new NotFoundException(__('Invalid cat'));
		}
		$options = array('conditions' => array('Cat.' . $this->Cat->primaryKey => $id));
		$this->set('cat', $this->Cat->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cat->create();
			if ($this->Cat->save($this->request->data)) {
				$this->Flash->success(__('The cat has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The cat could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cat->exists($id)) {
			throw new NotFoundException(__('Invalid cat'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cat->save($this->request->data)) {
				$this->Flash->success(__('The cat has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The cat could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cat.' . $this->Cat->primaryKey => $id));
			$this->request->data = $this->Cat->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cat->id = $id;
		if (!$this->Cat->exists()) {
			throw new NotFoundException(__('Invalid cat'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cat->delete()) {
			$this->Flash->success(__('The cat has been deleted.'));
		} else {
			$this->Flash->error(__('The cat could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
