<?php
App::uses('AppModel', 'Model');

class Collection extends AppModel {

  public $actsAs = array(
      'Search.Searchable'
  );

  public $hasMany = array(
      'Image' => array(
          'className' => 'Image',
          'conditions'=>array(
            'delete_flag'=>0,
            'partner_name'=> 'Collection',
              ),
          'order' => '',
          'foreignKey' => 'partner_id',
          'dependent' => '',
          'exclusive' => '',
          'finderQuery' => '',
          'limit' => '',
        ),
    );

    //function paginate($data = null) {
    //  $this->log($data, LOG_DEBUG);
    //  if(empty($data)) {
    //    $extra = func_get_arg(6);
    //  	//$extra['type']に生SQLが格納されている。
    //  	return $this->query($extra['type']);
    //  }
    //}


  public $validate = array(
      'title' => array(
          'between' => array(
              'allowEmpty' => true,
              'rule' => array('between', 1, 50),
              'message' => 'タイトルは50文字以内'
          )
      ),
      'text' => array(
        'between' => array(
            'allowEmpty' => true,
            'rule' => array('between', 1, 1000),
            'message' => '本文は1000文字以内'
        )
      ),
  );

  public $filterArgs = array(
    'title' => array(
      'type' => 'like'
    ),
  );



}
