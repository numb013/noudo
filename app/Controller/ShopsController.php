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
class ShopsController extends AppController {
	public $uses = array('Shop', 'Shop', 'Profession', 'Genre', 'Image');
	public $components = array('Search.Prg', 'Session', 'Master');
	public $presetVars = true;
	public $paginate = array();

        
        public function index() {
            $this->layout = "default";
            $datas = $this->Shop->find('all',array(
                'conditions' => array(
                  'Shop.delete_flag' => '0'
                ),
            ));
            $this->_getParameter();
            $this->set('datas',$datas);
        }        
        
        
        public function admin_index() {
            $this->layout = "default";
            $datas = $this->Shop->find('all',array(
                'conditions' => array(
                  'Shop.delete_flag' => '0'
                ),
            ));
            $this->_getParameter();
            $this->set('datas',$datas);
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

      $this->Shop->set($this->request->data);
      // 2. モデル[ModelName]のvalidatesメソッドを使ってバリデーションを行う。

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
      }
      $this->_getParameter();
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

            // $this->_getParameter();
            // $options = array(
            //         'fields' => array(
            //                 'Shop.id','Shop.name'
            //         ),
            //         'conditions' =>
            //         array(
            //                 'delete_flag' => '0'
            //         ),
            //         'recursive'  => -1
            // );
            // $relatedShops = $this->Shop->find('all', $options);
            // foreach ($relatedShops as $key => $relatedShop) {
            //         $related[$relatedShop['Shop']['id']] = $relatedShop['Shop']['name'];
            // }


            // $this->set('data', $this->request->data);
            $this->_getParameter();
            $this->render('/Shops/admin_add');
        } elseif (isset($this->request->data['regist'])) {
            $data = $this->request->data;
            $this->Shop->set($data);
            // 2. モデル[ModelName]のvalidatesメソッドを使ってバリデーションを行う。
            if ($this->Shop->validates()) {
                $this->Shop->save($data['Shop']);
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

      $this->Shop->set($this->request->data);
      // 2. モデル[ModelName]のvalidatesメソッドを使ってバリデーションを行う。
      if ($this->Shop->validates()) {


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

        $this->Shop->set($data);
        // 2. モデル[ModelName]のvalidatesメソッドを使ってバリデーションを行う。
        if ($this->Shop->validates()) {
            $this->Shop->save($data['Shop']);
            $partner_id = $data['Shop']['id'];
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
