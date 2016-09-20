<?php
App::uses('AppController', 'Controller');
/**
 * Stuffs Controller
 *
 * @property Stuff $Stuff
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class StuffsController extends AppController {

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
		$this->Stuff->recursive = 0;

        $data = $this->Stuff->find('all');
        //$this->log('data: '. print_r($data) ,'debug');

        //update pastDates
        foreach($data as $key => $value){
            $today = date('y-m-d');
            $modified = substr($value['Stuff']['modified'], 0, 10);

            //if it is already modified today, do not modify any more.
            if( strtotime($today)<strtotime($modified) || !$value['Stuff']['pastdates']){
                $pastDates = $this->Stuff->pastDates($value);
                $this->log('past: ' . $pastDates, 'debug');
            } else {
                $this->log('modified.', 'debug');
            }
            //$this->log('modified: '. strtotime($modified) .'|today: '. strtotime($today), 'debug');

        }

        $this->set('stuffs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Stuff->exists($id)) {
			throw new NotFoundException(__('Invalid stuff'));
		}
		$options = array('conditions' => array('Stuff.' . $this->Stuff->primaryKey => $id));
		$this->set('stuff', $this->Stuff->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Stuff->create();
			if ($this->Stuff->save($this->request->data)) {

			    //9/16 requestの日付を取得したいよー
                $this->log('data: '. $this->request->data ,'debug');
/*
			    if(isset( $this->request->data['Stuff']['date'] )) {
                    $pastDays = $this->Stuff-> pastDays( $this->request->data['Stuff']['date'] );
                } else {
                    $pastDays = NULL;
                }*/

				$this->Flash->success(__('The stuff has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The stuff could not be saved. Please, try again.'));
			}
		}
		$cats = $this->Stuff->Cat->find('list');
		$details = $this->Stuff->Detail->find('list');
		$this->set(compact('cats', 'details'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Stuff->exists($id)) {
			throw new NotFoundException(__('Invalid stuff'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Stuff->save($this->request->data)) {
				$this->Flash->success(__('The stuff has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The stuff could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Stuff.' . $this->Stuff->primaryKey => $id));
			$this->request->data = $this->Stuff->find('first', $options);
		}
		$cats = $this->Stuff->Cat->find('list');
		$details = $this->Stuff->Detail->find('list');
		$this->set(compact('cats', 'details'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Stuff->id = $id;
		if (!$this->Stuff->exists()) {
			throw new NotFoundException(__('Invalid stuff'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Stuff->delete()) {
			$this->Flash->success(__('The stuff has been deleted.'));
		} else {
			$this->Flash->error(__('The stuff could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
