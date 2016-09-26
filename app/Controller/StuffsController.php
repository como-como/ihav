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
	public $components = array('Paginator' => array(
        //'limit' => 20,
        'order' => array('Stuff.date' => 'asc')
    ), 'Session', 'Flash');

/**
 * Authorize
 */
    public function isAuthorized($user) {
        // 登録済ユーザーは投稿できる
        if ($this->action === 'add') {
            return true;
        }

        // 投稿のオーナーは編集や削除ができる
        if (in_array($this->action, array('edit', 'delete'))) {
            $stuffId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($stuffId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

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
            if( strtotime($today)>strtotime($modified) || !$value['Stuff']['pastdates']){
                $result = $this->Stuff->pastDates($value);
                //$this->log('past: ' . $pastDates, 'debug');
                //$this->log('result: ' . $result, 'debug');
            }
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
            //ユーザ名を保存する
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
			if ($this->Stuff->save($this->request->data)) {
				$this->Flash->success(__('買ったものを登録しました。'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('買ったものを登録できませんでした。再度登録してください。'));
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

            //for compare date and edited date
            $sort = array_fill_keys(array('year', 'month', 'day'), null);
            $array = array_merge($sort, $this->request->data['Stuff']['date']);
            $newDate = implode('-', $array);

            $data = $this->Stuff->find('first', array(
                'conditions' => array('Stuff.id' => $id)
            ));

            //$this->log('(edit)thisDate: '. $data['Stuff']['date'], 'debug');
            //$this->log('(edit)newDate: '. $newDate, 'debug');

            if($newDate !== $data['Stuff']['date']) {//日付が変更された
                $data['Stuff']['date'] = $newDate;
                $result = $this->Stuff->pastDates($data);
            }

			if ($this->Stuff->save($this->request->data)) {
				$this->Flash->success(__('買ったもの を保存しました。'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('買ったもの を保存できませんでした。再度操作をお願いします。'));
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
