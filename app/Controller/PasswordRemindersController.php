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
class PasswordRemindersController extends AppController {
	public $uses = array('Shop', 'PasswordReminder', 'Profession', 'Genre', 'Image', 'User');
	public $components = array('Search.Prg', 'Session', 'Master');
	public $presetVars = true;
	public $paginate = array();

  public function index() {


//項目はアカウントDI
//メールアドレス

    if ($this->request->is('post')) {
      mb_language('japanese');
      mb_internal_encoding('utf-8');
     //$this->request->data['mail_address'] = 'nakamura01008@decoo.co.jp';
       $options = array(
         'conditions' =>
         array(
          'mail_address' => $this->request->data['PasswordReminders']['email']
         ),
         'recursive'  => -1
       );
       $User_data = $this->User->find('first', $options);        
       $user = $User_data['User'];

       $key = $this->_getRandomString(32);
       $url = "http://www.oneblow.shop/PasswordReminders/reset?key=". $key;

       $data['PasswordReminders']['user_id'] = $user['id'];
       $data['PasswordReminders']['key'] = $key;
       $data['PasswordReminders']['mail_address'] = $user['mail_address'];
       $data['PasswordReminders']['limit_time'] = date('Y-m-d H:i:s' , strtotime('+15 minute'));
       $this->PasswordReminder->save($data['PasswordReminders']);

     $honbun='';
       $honbun.="いつもお世話になっております。\n";
       $honbun.="以下のURLからパスワードを再設定して下さい。\n";
       $honbun.=$url;
       $honbun.="\n";

       $honbun.="□□□□□□□□□□□□□□□□□\n";
       $honbun.="\n";
       $honbun.="『FUD-24』簡単で当たる！職業診断係";
       $honbun.="\n";
       $honbun.="メール oneblow0701@gmail.com\n";
       $honbun.="\n";
       $honbun.="□□□□□□□□□□□□□□□□□\n";

       $title= '【】パスワード再設定用リンク';
       $header = 'From:FUD-24 簡単で当たる！職業診断';
       $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
       $header = mb_encode_mimeheader($header);

      if (mb_send_mail($this->request->data['PasswordReminders']['email'], $title, $honbun, $header)) {
          mb_language('japanese');
          mb_internal_encoding('utf-8');

          $title= 'お客様からお問い合わがありました。';
          $header = 'From:'.$this->request->data['PasswordReminders']['email'];
          $message = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
          mb_send_mail('oneblow0701@gmail.com' ,$title, $message, $header);
          return true;
      } else {
        return false;
      }
    }
  }

  public static function _getRandomString($nLengthRequired = 10) {
     $charList = 'abcdefghijklmnopqrstuvwxyz0123456789';
     mt_srand();
     $randomStr = '';
     for ($i = 0; $i < $nLengthRequired; $i++) {
         $randomStr .= $charList[mt_rand(0, strlen($charList) - 1)];
     }
      return $randomStr;
  }

  public function reset() {
    $key = $_GET['key'];
    $limit_time = date('Y-m-d H:i:s');
    $options = array(
      'conditions' =>
      array(
          'key' => $key,
          'limit_time >=' => $limit_time
      ),
      'recursive'  => -1
    );

    $data = $this->PasswordReminder->find('first', $options); 
    if ($data['PasswordReminder']['auth_flag'] == 0) {
        $this->Session->write('key', $data['PasswordReminder']['key']);
        $user_id = $data['PasswordReminder']['user_id'];
        $passwordReminder_id = $data['PasswordReminder']['id'];
        return $this->redirect(
          array('controller' => 'PasswordReminders', 'action' => 'password_reset', $user_id, $passwordReminder_id)
        );
    } else {
             $this->set('error', 1);
             $this->render('/PasswordReminders/password_reset_complete');
    }
  }

  public function password_reset($user_id = null, $passwordReminder_id = null) {
    if ($this->request->is('post')) {
       $data = $this->request->data;
       $data['User']['id'] =$data['User']['id'];
       $data['User']['password'] = $data['PasswordReminders']['password'];

       if ($data['PasswordReminders']['password'] != $data['PasswordReminders']['password1']) {
           $this->set('PasswordReminders', $data);
           $this->set('error', 'aaaaa');
           $this->render('ec/PasswordReminders/password_reset');
       }

       $this->User->set($data);
       if ($this->User->validates()) {
           if ($this->User->save()) {
               $reminde['id'] = $data['passwordReminder']['id'];
               $reminde['auth_flag'] = 1; 
               $this->PasswordReminder->set($reminde);
               if ($this->PasswordReminder->save()) {     
                  return $this->redirect(
                    array('controller' => 'PasswordReminders', 'action' => 'password_reset_complete')
                  );
               }
           }
       } else {
         return false;
       }
     }

     if (empty($this->Session->read('key'))) {

           $this->set('error', 2);
           $this->render('/PasswordReminders/password_reset_complete');
     }
     $this->Session->delete('key');
     $this->set(compact( "user_id", "passwordReminder_id"));
  }

  public function password_reset_complete() {
      $url = '/Users/mypage';
      $this->redirect($url);
  }
  
 
/**/
/*登録箇所
/*
/*
/*
/*
/*
/**/
  public function admin_add() {

    $this->layout = "default";
    if ($this->request->is(array('post', 'put'))) {
      //画像処理
        foreach ($this->request->data['Image'] as $key => $value) {
          if ($value['error'] == 4) {
            unset($this->request->data['Image'][$key]);
          }
      }
      if ($this->Session->read('image')) {
        $Image = $this->Session->read('image');
        $count = count($this->request->data['Image']);
        if ($count == 0) {
          $this->request->data['Image'] = $Image;
        } else {
          $countkey = $count - 1;
          foreach ($this->request->data['Image'] as $key => $phots) {
            if ($key == $countkey) {
              foreach ($Image as $key => $value) {
                $this->request->data['Image'][$count] = $value;
                $count++;
              }
            }
          }
        }
        $this->Session->delete('image');
      }
      // 仮アップロード
      $now = date("YmdHis");
      $finfo = finfo_open(FILEINFO_MIME_TYPE);
      foreach($this->request->data['Image'] as $key => $val){
        if(!$val["tmp_name"]) continue;
        if(!empty($val["url"])) continue;
        $files[$key]["name"] = $val["name"];
        // アップロードされたファイルが画像かどうかチェック
        list($mime,$ext) = explode("/",finfo_file($finfo, $val["tmp_name"]));
        if($mime!="image") $err[] = "ファイル{$key} は画像を選択してください";
        if($mime!="image") unset($files[$key]);
        if($mime!="image") continue;
        copy($val["tmp_name"],"files/updir/tmp/" . "{$now}_{$key}.{$ext}");
        $this->request->data['Image'][$key]["tmp_name"] = "{$now}_{$key}.{$ext}";
        $this->request->data['Image'][$key]["url"] = "/files/updir/tmp/" ."{$now}_{$key}.{$ext}";
      }

      finfo_close($finfo);
      $this->request->data['Shops']['zip'] = $this->request->data['zip'];
      $this->request->data['Shops']['address1'] = $this->request->data['address1'];

      $this->Shop->set($this->request->data);
      // 2. モデル[ModelName]のvalidatesメソッドを使ってバリデーションを行う。
      if ($this->Shop->validates()) {
        //画像削除
        if (!empty($this->request->data['Check'])) {
          foreach ($this->request->data['Check'] as $key => $Checkd) {
            if ($Checkd['photo'] != '0') {
              foreach ($this->request->data['Image'] as $key => $Images) {
                if ($Images['url'] == $Checkd['photo']) {
                    unset($this->request->data['Image'][$key]);
                }
              }
            }
          }
          if (empty($this->request->data['Image'][0]["name"])) {
            unset($this->request->data['Image'][0]);
          }
          $this->request->data['Image'] = array_merge($this->request->data['Image']);
        }
        $this->_getParameter();
        $options = array(
                'fields' => array(
                        'Shop.id','Shop.name'
                ),
                'conditions' =>
                array(
                        'delete_flag' => '0'
                ),
                'recursive'  => -1
        );
        $this->set('data',$this->request->data);
        $this->render('/Shops/admin_confirm');
      } else {
        if (!empty($this->request->data['Check'])) {
          foreach ($this->request->data['Check'] as $key => $Checkd) {
            if ($Checkd['photo'] != '0') {
              foreach ($this->request->data['Image'] as $key => $Images) {
                if ($Images['url'] == $Checkd['photo']) {
                    unset($this->request->data['Image'][$key]);
                }
              }
            }
          }
          if (empty($this->request->data['Image'][0]["name"])) {
            unset($this->request->data['Image'][0]);
          }
          $this->request->data['Image'] = array_merge($this->request->data['Image']);
        }
        //バリデーションエラーで画像/動画をセッションに保存
        $this->Session->write('image', $this->request->data['Image']);
        return false;
      }
    }
    $this->_getParameter();
    $this->Session->delete('image');
  }


  /**/
  /*登録DBに登録箇所
  /*
  /*
  /*
  /*
  /*
  /**/
  public function admin_regist() {
    $this->layout = "default";
    if ($this->request->is(array('post', 'put'))) {
        //戻るボタン
        if (isset($this->request->data['back'])) {
          if (!empty($this->request->data['Image'])) {
              $this->Session->write('image', $this->request->data['Image']);
          }
          $this->_getParameter();
          $options = array(
                  'fields' => array(
                          'Shop.id','Shop.name'
                  ),
                  'conditions' =>
                  array(
                          'delete_flag' => '0'
                  ),
                  'recursive'  => -1
          );
          $relatedShops = $this->Shop->find('all', $options);
          foreach ($relatedShops as $key => $relatedShop) {
                  $related[$relatedShop['Shop']['id']] = $relatedShop['Shop']['name'];
          }
          $this->set('related', $related);

          $this->render('/Shops/admin_add');
        } elseif (isset($this->request->data['regist'])) {
          $data = $this->request->data;
          if (!empty($data['Image'])) {
            $data['Shop']['image_flag'] = 1;
            foreach ($data['Image'] as $key => $value) {
              $data['Image'][$key]['partner_name'] = 'Shop';
            }
          }
          $this->Shop->set($data);
          // 2. モデル[ModelName]のvalidatesメソッドを使ってバリデーションを行う。
          if ($this->Shop->validates()) {
              $this->Shop->save($data['Shop']);
              $partner_id = $this->Shop->getLastInsertID();
              if (!empty($data['Image'])) {
                  foreach($data['Image'] as $key => $val){
                      $cut = 1;//カットしたい文字数
                      $val["url"] = substr( $val["url"] , $cut , strlen($val["url"])-$cut );
                      $file = new File(WWW_ROOT.$val["url"]);
                      $file->copy(WWW_ROOT."/files/updir/" . $val["tmp_name"],true);
                      $file = new File(WWW_ROOT.$val["url"]);
                      $file->delete();
                      $data['Image'][$key]["url"] = "/files/updir/" . $val["tmp_name"];
                      $data['Image'][$key]["partner_id"] = $partner_id;
                  }
                foreach ($data['Image'] as $key => $value) {
                  $this->Image->create(false);
                  $this->Image->save($value);
                }
              }

            return $this->redirect(
              array('controller' => 'Shops', 'action' => 'admin_index')
            );
          } else {
              $this->set('data',$data);
              $this->render('/Shops/admin_add');
          }
        }
      }
    }

/**/
/*編集箇所
/*
/*
/*
/*
/*
/**/
public function admin_edit($id = null){
	// レイアウト関係
	$this->layout = "default";
	//変更処理
  if ($this->request->is(array('post', 'put'))) {

    //画像がエラーの物削除
    foreach ($this->request->data['Image'] as $key => $value) {
        if ($value['error'] == 4) {
          unset($this->request->data['Image'][$key]);
        }
    }
    $this->request->data['Image'] = array_merge($this->request->data['Image']);
		//画像セッション読み込み
    if ($this->request->data['Shop']['BeforeImage']) {
      $count = count($this->request->data['Image']);
			//追加なければセッションの値そのまま入れる
      if ($count == 0) {
        $this->request->data['Image'] = $this->request->data['Shop']['BeforeImage'];
      } else {
        $countkey = $count - 1;
        foreach ($this->request->data['Image'] as $key => $phots) {
          if ($key == $countkey) {
            foreach ($this->request->data['Shop']['BeforeImage'] as $key => $value) {
              $this->request->data['Image'][$count] = $value;
              $count++;
            }
          }
        }
      }
			//セッション削除
      $this->Session->delete('image');
    }
    $image = $this->Session->read('image');
    //空のデータが入ってくるので削除
    $now = date("YmdHis");
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    // 仮アップロード
    foreach($this->request->data['Image'] as $key => $val){
        if(empty($val["tmp_name"])) continue;
        if(!empty($val["url"])) continue;
        $files[$key]["name"] = $val["name"];
        // アップロードされたファイルが画像かどうかチェック
        list($mime,$ext) = explode("/",finfo_file($finfo, $val["tmp_name"]));
        if($mime!="image") $err[] = "ファイル{$key} は画像を選択してください";
        if($mime!="image") unset($files[$key]);
        if($mime!="image") continue;
        // 仮ディレクトリへファイルをアップロード
        copy($val["tmp_name"],"files/updir/tmp/" . "{$now}_{$key}.{$ext}");
        $this->request->data['Image'][$key]["tmp_name"] = "{$now}_{$key}.{$ext}";
				$this->request->data['Image'][$key]["url"] = "/files/updir/tmp/" ."{$now}_{$key}.{$ext}";
      }
      finfo_close($finfo);



      $this->request->data['Shop']['zip'] = $this->request->data['zip'];
      $this->request->data['Shop']['address1'] = $this->request->data['address1'];
      $this->Shop->set($this->request->data);
      // 2. モデル[ModelName]のvalidatesメソッドを使ってバリデーションを行う。
      if ($this->Shop->validates()) {
        //画像削除チェックの入ったものを削除
        if (!empty($this->request->data['Check'])) {
          foreach ($this->request->data['Check'] as $key => $Checkd) {
            if ($Checkd['photo'] != '0') {
              foreach ($this->request->data['Image'] as $key => $Images) {
                if ($Images['url'] == $Checkd['photo']) {
                    unset($this->request->data['Image'][$key]);
                }
              }
            }
          }
          if (empty($this->request->data['Image'][0]["url"])) {
            unset($this->request->data['Image'][0]);
          }
        }
        $this->request->data['Image'] = array_merge($this->request->data['Image']);



        //最初に削除していて一回「戻るボタン」して再度「確認」押下時に必要処理
        //再度削除処理にセットしている
      if (!empty($this->request->data['photo_dele'])) {
        if (!empty($this->request->data['Check'])) {
          $checkcount = count($this->request->data['Check']);
          foreach ($this->request->data['Check'] as $key => $CheckPhoto) {
              foreach ($this->request->data['photo_dele'] as $key => $photo_dele) {
                if ($photo_dele != '0') {
                  $this->request->data['Check'][$checkcount + $key]['photo'] = $photo_dele;
                }
              }
          }
        } elseif (!empty($this->request->data['photo_dele'])) {
          foreach ($this->request->data['photo_dele'] as $key => $photo_dele) {
            $this->request->data['Check'][$key]['photo']  = $photo_dele;
          }
        }
      }

			//最初に削除していて一回「戻るボタン」して再度「確認」押下時に必要処理
			//再度削除処理にセットしている


			//array_uniqueはソートしてくれる
			//array_mergeは重複削除


      if (!empty($this->request->data['photo_dele'])) {
        $this->request->data['Check'] = array_unique($this->request->data['Check']);
        $this->request->data['Check'] = array_merge($this->request->data['Check']);
        $this->request->data['photo_dele'] = array_unique($this->request->data['photo_dele']);
        $this->request->data['photo_dele'] = array_merge($this->request->data['photo_dele']);
      }
        //画像/動画をセッションに保存
        $this->Session->write('Image', $this->request->data['Image']);
				$this->_getParameter();


				$options = array(
					'fields' => array(
						'Shop.id','Shop.name'
					),
					'conditions' => array(
						'delete_flag' => '0',
					),
					'recursive'  => -1
				);

				$relatedShops = $this->Shop->find('all', $options);
				foreach ($relatedShops as $key => $relatedShop) {
					$relatedNmae[$relatedShop['Shop']['id']] = $relatedShop['Shop']['name'];
				}
				$this->set('relatedNmae', $relatedNmae);
        $this->set('data',$this->request->data);
        $this->render('/Shops/admin_edit_confirm');

      } else {
        //バリデーションエラーで画像
        $this->Session->write('Image', $this->request->data['Image']);


        if (!empty($this->request->data['image'])) {
          $photcount = 0;
          foreach ($this->request->data['image'] as $key => $value) {
            if (empty($value['id'])) {
              $photcount++;
            }
          }
          if (!empty($this->request->data['Check'])) {
            foreach ($this->request->data['Check'] as $key => $value) {
              $this->request->data['Check'][$key + $photcount] = $value;
            }
          }
          for ($i=0 ; $i < $photcount; $i++) {
            $this->request->data['Check'][$i] = 0;
          }
					//降順
          ksort($this->request->data['Check']);
        }

        return false;
      }
    } else {
			//初期処理
      if (isset($id)) {
        $status = array(
        'conditions' =>
          array(
            'Shop.id' => $id,
          )
        );
        // 以下がデータベース関係
        $this->request->data = $this->Shop->find('first', $status);
				if (!empty($this->request->data['Image'])) {
            $this->Session->write('image', $this->request->data['Image']);
        }
				$this->_getParameter();

				$options = array(
					'fields' => array(
						'Shop.id','Shop.name'
					),
					'conditions' =>
					array(
						'delete_flag' => '0'
					),
					'recursive'  => -1
				);
				$relatedShops = $this->Shop->find('all', $options);
				foreach ($relatedShops as $key => $relatedShop) {
					$related[$relatedShop['Shop']['id']] = $relatedShop['Shop']['name'];
				}
				$this->set('related', $related);
      }

    }


  }


  public function admin_edit_regist(){
      // レイアウト関係
		$this->layout = "default";
    if ($this->request->is(array('post', 'put'))) {
      //戻るボタン
        if (isset($this->request->data['back'])) {
            $Image = $this->Session->read('Image');
            $this->request->data['Image'] = $Image;
            //画像/動画をセッションに保存
            if (!empty($this->request->data['Image'])) {
              $this->Session->write('Image', $this->request->data['Image']);
            }


            $this->_getParameter();

            $options = array(
                    'fields' => array(
                            'Shop.id','Shop.name'
                    ),
                    'conditions' =>
                    array(
                            'delete_flag' => '0'
                    ),
                    'recursive'  => -1
            );

            $relatedShops = $this->Shop->find('all', $options);

            foreach ($relatedShops as $key => $relatedShop) {
                    $related[$relatedShop['Shop']['id']] = $relatedShop['Shop']['name'];
            }
            $this->set('related', $related);

            $this->render('/Shops/admin_edit');
	} elseif (isset($this->request->data['regist'])) {
        $data = $this->request->data;
        if (!empty($data['Image'])) {
          $data['Shop']['image_flag'] = 1;
          foreach ($data['Image'] as $key => $value) {
            $data['Image'][$key]['Image']['partner_name'] = 'Shop';
          }
        }

        $this->Shop->set($data);
        // 2. モデル[ModelName]のvalidatesメソッドを使ってバリデーションを行う。
        if ($this->Shop->validates()) {
            $this->Shop->save($data['Shop']);
            $partner_id = $data['Shop']['id'];

            if (!empty($data['photo_dele'])) {
              $data['photo_dele'] = array_merge($data['photo_dele']);
            }

            //画像削除
            if (!empty($data['photo_dele'])) {
              foreach ($data['photo_dele'] as $key => $photo_dele) {
                $status = array(
                  'delete_flag' => 1,
                );
                $conditions = array(
                  'url' => $photo_dele,
                );
                $this->Image->updateAll($status, $conditions);
                $this->Image->create();
              }
            }
            if (!empty($data['Image'])) {
              foreach($data['Image'] as $key => $val){
									$cut = 1;//カットしたい文字数
									$val['Image']["url"] = substr( $val['Image']["url"] , $cut , strlen($val['Image']["url"])-$cut );
									$file = new File(WWW_ROOT.$val['Image']["url"]);
							    $file->copy(WWW_ROOT."/files/updir/" . $val['Image']["tmp_name"],true);
									$file = new File(WWW_ROOT.$val['Image']["url"]);
							    $file->delete();
                  $data['Image'][$key]['Image']["url"] = "/files/updir/" . $val['Image']["tmp_name"];
                  $data['Image'][$key]['Image']["partner_id"] = $partner_id;
                }
              foreach ($data['Image'] as $key => $value) {
              $this->Image->create(false);
              $this->Image->save($value['Image']);
              }
            }

          return $this->redirect( array('controller' => 'Shops', 'action' => 'admin_index'));
        } else {
          $this->set('data',$data);
          $this->render('/Shops/admin_add');
        }
      }
    }
  }      
      
      

        /**/
        /*詳細箇所
        /*
        /*
        /*
        /*
        /*
        /**/

        public function admin_detail($id = null){
          // レイアウト関係
          $this->layout = "default";
          if (isset($id)) {
            $status = array(
            'conditions' =>
              array(
                'Shop.id' => $id,
                'Shop.delete_flag' => 0
              )
            );
            // 以下がデータベース関係
            $datas = $this->Shop->find('first', $status);
            if ($datas['Shop']['image_flag']) {
              $id = $datas['Shop']['id'];
              $status = array(
                'conditions' =>
                array(
                  'partner_id' => $id,
                  'partner_name' => 'Shop',
                  'delete_flag' => '0'
                )
              );
              $datas['Image'] = $this->Image->find('all', $status);
            }
              $this->_getParameter();
              $this->set('data',$datas);
          }
        }

/**/
/*削除箇所
/*
/*
/*
/*
/*
/**/
  public function admin_delete($id = null){
		$this->layout = "default";
    $status = array(
      'delete_flag' => 1,
    );
    $conditions = array(
      'Shop.id' => $id,
    );
    $this->Shop->updateAll($status, $conditions);
    return $this->redirect( array('controller' => 'Shops', 'action' => 'admin_index'));
  }
  

	public function _getParameter() {

                $business_hour = $this->Master->getBusinessHour();
		$genre = $this->Master->getGenre();
		$this->set(compact( "genre", "business_hour"));
		return;
	}
}
