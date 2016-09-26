<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {

    //読み込むコンポーネントの指定
    public $components = array('Session', 'Auth');

    //どのアクションが呼ばれても、最初に実行される関数
    public function beforeFilter() {
        parent::beforeFilter();

        // ユーザー自身による登録とログアウトを許可する
        //$this->Auth->allow('add', 'logout');

        //未ログイン時は、新規登録とログインを許可する
        $this->Auth->allow('add', 'login');

        //$this->log('login: ' . pr( $this->Auth->request->data['User']), 'debug');
        //$this->Auth->deny('index', 'logout'););

        $this->Auth->loginError = __('ユーザ名かパスワードが異なります。');
        $this->Auth->authError = __('管理者としてログインする必要があります');
    }

    public function index() {
        $this->User->recursive = 0;
        //$this->set('user', $this->paginate());
        $this->redirect($this->Auth->redirect());
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $id = $this->User->id;
                $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
                $this->Auth->login($this->request->data['User']);

                $this->set('user', $this->Auth->request->data['User']);

                $this->Flash->success(__('ユーザ登録しました'));
                $this->Flash->success(__('ログインしました'));
                //$this->Auth->login();
                //$this->redirect('index');
                $this->redirect($this->Auth->redirect());
            }
            $this->Flash->error(
                __('ユーザ登録できませんでした')
            );
        }
    }

    public function login() {
        if ($this->request->is('post')) {
            if(isset($this->data['User']['username']) && isset($this->data['User']['password'])){
                // ログイン成功
                if($this->Auth->login($this->data)){
                    $this->Flash->success(__('ログインしました'));

                    $this->set('user',$this->data['User']);

                    $this->redirect($this->Auth->redirect());
                    //$this->redirect('index');
                }
                else{
                    // ログイン失敗
                }
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
        //$This->Auth->logout();
        //$this->redirect('login');
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}