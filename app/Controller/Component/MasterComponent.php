<?php
App::uses('Component', 'Controller');
class MasterComponent extends Component {
	public $uses = array('Item', 'Image', 'Genre', 'ItemGenre');

	public $components = array('Session');

	// ===== マスタ情報取得系 =====


/**
 * 都道府県のKeyValueリスト取得
 *
 * @return array 都道府県のKeyValueリスト
 */
	public function getItemGenres() {
		$ItemGenre = ClassRegistry::init('ItemGenre');
		$item_genres = array();
		$personals = $ItemGenre->find('all',
				array(
					'fields' => array('*'),
					'conditions' => array('delete_flag' => 0),
					'order' => array('id' => 'asc'),
				)
		);
		foreach ($personals as $key => $personal) {
			$item_genres[$personal['ItemGenre']['id']] = $personal['ItemGenre']['name'];
		}
		return $item_genres;
	}


/**
 * 都道府県のKeyValueリスト取得
 *
 * @return array 都道府県のKeyValueリスト
 */
	public function getGenre() {
		$Genre = ClassRegistry::init('Genre');
		$genres = array();
		$likes = $Genre->find('all',
				array(
					'fields' => array('*'),
					'conditions' => array('delete_flag' => 0),
					'order' => array('id' => 'asc'),
				)
		);
		foreach ($likes as $key => $like) {
			$genres[$like['Genre']['id']] = $like['Genre']['name'];
		}
		return $genres;
	}



/**
 * 案件タイプリスト取得(通知メール用に短いもの)
 *
 * @return array 案件タイプリスト(短)
 */
	public function getSeason () {
		// OppKindsMaster.phpと対応させる
		return array(
                        '1' => '春',
                        '2' => '夏',
                        '3' => '秋',
                        '4' => '冬',
                        '5' => '春夏',
                        '6' => '秋冬',
                        '7' => 'オールシーズン',
                    );
	}

	public function getSize () {
		// OppKindsMaster.phpと対応させる
		return array(
                        '1' => 'S',
                        '2' => 'M',
                        '3' => 'L',
                        '4' => 'LL',
                        '5' => 'Xl',
                        '6' => 'EL',
                        '7' => '3L',
                        '8' => '4L',
                    );
	}

	public function getDiscount () {
		// OppKindsMaster.phpと対応させる
		return array(
                        '' => '選択してください' ,
                        '1' => '10%OFF' ,
                        '2' => '20%OFF' ,
                        '3' => '30%OFF' ,
                        '4' => '40%OFF' ,
                        '5' => '50%OFF' 
                    );
	}


	public function getBusinessHour () {
		// OppKindsMaster.phpと対応させる
		return array(
                        '' => '選択してください' ,
                        '1' => '7:00' ,
                        '2' => '8:00' ,
                        '3' => '9:00' ,
                        '4' => '10:00' ,
                        '5' => '11:00' ,
                        '6' => '12:00' ,
                        '7' => '13:00' ,
                        '8' => '14:00' ,
                        '9' => '15:00' ,
                        '10' => '16:00' ,
                        '11' => '17:00' ,
                        '12' => '18:00' ,
                        '13' => '19:00' ,
                        '14' => '20:00' ,
                        '15' => '21:00' ,
                        '16' => '22:00' ,
                        '17' => '23:00' ,
                        '18' => '24:00' ,
                        '19' => '01:00' ,
                        '20' => '02:00' 
                    );
	}

        
	public function getPrefecture () {
		// OppKindsMaster.phpと対応させる
		return array(
                     "" => "選択してください",
                    "1" => "北海道",
                    "2" => "青森県",
                    "3" => "岩手県",
                    "4" => "宮城県",
                    "5" => "秋田県",
                    "6" => "山形県",
                    "7" => "福島県",
                    "8" => "茨城県",
                    "9" => "栃木県",
                    "10" => "群馬県",
                    "11" => "埼玉県",
                    "12" => "千葉県",
                    "13" => "東京都",
                    "14" => "神奈川県",
                    "15" => "新潟県",
                    "16" => "富山県",
                    "17" => "石川県",
                    "18" => "福井県",
                    "19" => "山梨県",
                    "20" => "長野県",
                    "21" => "岐阜県",
                    "22" => "静岡県",
                    "23" => "愛知県",
                    "24" => "三重県",
                    "25" => "滋賀県",
                    "26" => "京都府",
                    "27" => "大阪府",
                    "28" => "兵庫県",
                    "29" => "奈良県",
                    "30" => "和歌山県",
                    "31" => "鳥取県",
                    "32" => "島根県",
                    "33" => "岡山県",
                    "34" => "広島県",
                    "35" => "山口県",
                    "36" => "徳島県",
                    "37" => "香川県",
                    "38" => "愛媛県",
                    "39" => "高知県",
                    "40" => "福岡県",
                    "41" => "佐賀県",
                    "42" => "長崎県",
                    "43" => "熊本県",
                    "44" => "大分県",
                    "45" => "宮崎県",
                    "46" => "鹿児島県",
                    "47" => "沖縄県"
                    );
	}


        
}