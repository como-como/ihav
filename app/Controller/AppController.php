<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Flash',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'stuffs',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                //'action' => 'display',
                //'home'
                'action' => 'login'
            ),
            /*
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),*/
            //'authorize' => array('Controller')
        )
    );

    //権限による振り分け
/*    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }

        // デフォルトは拒否
        return false;
    }
*/

    public function beforeFilter() {
        //$this->Auth->allow('index', 'view');
        $this->is_login = (bool)$this->Auth->user();
        if ($this->is_login) {
            $this->uid = $this->Auth->user('id');
            $this->username = $this->Auth->user('username');
        }
        $this->set('is_login', $this->is_login);
        $this->set('uid', $this->uid);
        $this->set('username', $this->username);
        parent::beforeFilter();



        $this->set('user', $this->Auth->user());
    }
}
