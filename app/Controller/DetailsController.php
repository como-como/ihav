<?php
App::uses('AppController', 'Controller');
/**
 * Details Controller
 *
 * @property Detail $Detail
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class DetailsController extends AppController {

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
		$this->Detail->recursive = 0;
		$this->set('details', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Detail->exists($id)) {
			throw new NotFoundException(__('Invalid detail'));
		}
		$options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
		$this->set('detail', $this->Detail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Detail->create();
			if ($this->Detail->save($this->request->data)) {
				$this->Flash->success(__('The detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The detail could not be saved. Please, try again.'));
			}
		}
		$cats = $this->Detail->Cat->find('list');
		$this->set(compact('cats'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Detail->exists($id)) {
			throw new NotFoundException(__('Invalid detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Detail->save($this->request->data)) {
				$this->Flash->success(__('The detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Detail.' . $this->Detail->primaryKey => $id));
			$this->request->data = $this->Detail->find('first', $options);
		}
		$cats = $this->Detail->Cat->find('list');
		$this->set(compact('cats'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Detail->id = $id;
		if (!$this->Detail->exists()) {
			throw new NotFoundException(__('Invalid detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Detail->delete()) {
			$this->Flash->success(__('The detail has been deleted.'));
		} else {
			$this->Flash->error(__('The detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
