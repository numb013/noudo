<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {
/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public $components = array('Search.Prg', 'Session', 'Master', 'Cookie');
/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
 public function beforeFilter() {
     parent::beforeFilter();
     // ユーザー自身による登録とログアウトを許可する
     $this->Auth->allow('add', 'logout');
 }

  public function login() {
     if ($this->request->is('post')) {

         if ($this->Auth->login()) {
            $this->Cookie->write('Auth.User', $this->request->data['User'], false, '+4 weeks');
            $url = $this->Auth->redirect();
            if(strpos($url,'admin') !== false) {
                $url = '/Users/mypage';
            }
            $this->redirect($url);
            exit();
         } else {
             $this->Flash->error(__('パスワードちゃいまっせ～'));
         }
     }
 }
 
  public function logout() {
		$this->Cookie->delete('Auth.User');
        $this->Session->destroy();
		$this->redirect($this->Auth->logout());
		$this->autoRender = false;
 }
 
public function add() {
    if ($this->request->is('post')) {
        $this->User->create();
        $this->request->data['User']['role'] = 'author';
        if ($this->User->save($this->request->data)) {
            $this->Flash->success(__('The user has been saved'));
            $content = $this->request->data;
            $honbun='';
            $honbun.="いつもお世話になっております。\n";
            $honbun.="中村篤史 カスタマーサポートです。\n";
            $honbun.="ただいまユーザー登録が完了いたしました。下記ユーザー名、パスワードでログインしてください。\n";
            $honbun.="ユーザー名:".$content['User']['username']."\n";
            $honbun.="パスワード:".$content['User']['password']."\n";
            $honbun.="ログインURL:http://www.oneblow.shop/users/login　\n\n";

            $honbun.="□□□□□□□□□□□□□□□□□\n";
            $honbun.="\n";
            $honbun.="『FUD-24』簡単で当たる！職業診断係";
            $honbun.="\n";
            $honbun.="メール oneblow0701@gmail.com\n";
            $honbun.="\n";
            $honbun.="□□□□□□□□□□□□□□□□□\n";

            $title= 'ユーザー登録完了のお知らせ';
            $header = 'From:FUD-24 簡単で当たる！職業診断';
            $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
            $header = mb_encode_mimeheader($header);

            if (mb_send_mail($content['User']['mail_address'], $title, $honbun, $header)) {
                mb_language('japanese');
                mb_internal_encoding('utf-8');
                $title= 'ユーザー登録がありました';
                $header = 'From:'.$content['User']['mail_address'];
                $message = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
                mb_send_mail('oneblow0701@gmail.com' ,$title, $message, $header);
                return true;
            } else {
                return false;
            }
            return $this->redirect(
                array('controller' => 'users', 'action' => 'mypage')
            );
        }
        $this->Flash->error(
        __('The user could not be saved. Please, try again.')
        );
    }
}

public function mypage() {

}


public function user_edit() {
   if ($this->request->is('post')) {
      $this->request->data['User']['zip'] = $this->request->data['zip'];
      $this->request->data['User']['address1'] = $this->request->data['address1'];
      $this->User->set($this->request->data);

      if ($this->User->validates()) {
        $this->set('data',$this->request->data);
        $this->render('/Users/user_confirm');
      } else {
        return false;
      }
    }

    $this->request->data = $this->User->find('first',
         array(
             'conditions' => array(
                 'User.id' => $this->Auth->user('id'),
                 'delete_flag' => '0'
              ),
         )
     );
     //$this->set(compact('datas'));
}


  public function user_regist() {
      $this->layout = "default";
    if ($this->request->is(array('post', 'put'))) {

        if (isset($this->request->data['back'])) {
        //バリデーションエラーで画像/動画をセッションに保存
            $this->render('/users/user_edit');
        } elseif (isset($this->request->data['regist'])) {
            $data = $this->request->data;
            $this->User->set($data);
            // 2. モデル[ModelName]のvalidatesメソッドを使ってバリデーションを行う。
            if ($this->User->validates()) {
                $this->User->save($data['User']);
                return $this->redirect(
                  array('controller' => 'users', 'action' => 'mypage')
                );
            } else {
              $this->set('data',$data);
              $this->render('/users/user_edit');
            }
        }
    }
  }

 
 public function admin_login() {
     if ($this->request->is('post')) {
         if ($this->Auth->login()) {
             echo pr($this->Auth->redirect());

            $this->redirect($this->Auth->redirect());
            
         } else {
             $this->Flash->error(__('パスワードちゃいまっせ～'));
         }
     }
 }

 public function admin_logout() {
		$this->Cookie->delete('Auth.User');
		$this->redirect($this->Auth->logout());
		$this->autoRender = false;
 }

public function admin_add() {
    if ($this->request->is('post')) {

// 同じユーザーIDがあればNG
// メールアドレスにしてほしい
// ちゃんとしたアドレスか確認するためにメールを送る
// 


        $this->User->create();
        if ($this->User->save($this->request->data)) {
            $this->Flash->success(__('The user has been saved'));
            return $this->redirect(
              array('controller' => 'Dashboards', 'action' => 'admin_index')
            );
        }
        $this->Flash->error(
            __('The user could not be saved. Please, try again.')
        );
    }
}




}
