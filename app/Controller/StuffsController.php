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
        'order' => array('Stuff.date' => 'asc')
    ), 'Session', 'Flash', 'Auth');
/**
 * Authorize
 */
/*
    public function isAuthorized($user) {
        // 登録済ユーザーは投稿できる
        if ($this->action === 'add') {
            return true;
        }

        // 投稿のオーナーは編集や削除ができる
        if (in_array($this->action, array('edit', 'delete'))) {
            $stuffId = (int) $this->request->params['pass'][0];
            $this->log('stuffId: '.$this->request->params['pass'][0], 'debug');
            $this->log('userid: '.$user['id'], 'debug');
            if ($this->Post->isOwnedBy($stuffId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
*/

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Stuff->recursive = 0;

        //経過日数を再計算
        $data = $this->Stuff->find('all', array(
            'conditions' => array('Stuff.user_id' => $this->Auth->user('id'))
        ));
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

        $option = array(
            'user_id' => $this->Auth->user('id')
        );
        //debugger::dump($option);

        //$this->set('stuffs', $this->Paginator->paginate());
        if($this->Auth->user('role')==='admin') {
            $this->set('stuffs', $this->Paginator->paginate());
        } else {
            $this->set('stuffs', $this->Paginator->paginate($option));
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
		if (!$this->Stuff->exists($id)) {
			throw new NotFoundException(__('Invalid stuff'));
		}
		$options = array('conditions' => array('Stuff.' . $this->Stuff->primaryKey => $id));
		$this->set('stuffs', $this->Stuff->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Stuff->create();


            //ユーザidも登録する
            $this->request->data['Stuff']['user_id'] = $this->Auth->user('id');


            //Price->lowerPrice を実行
            $this->loadModel('Price');
            $result = $this->Price->lowerPrice($this->request->data);
            debugger::dump($result);

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

            //ユーザidも登録する
            $this->request->data['Stuff']['user_id'] = $this->Auth->user('id');

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
