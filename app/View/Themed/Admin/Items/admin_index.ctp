<?php echo $this->Form->create('Item', array('type' => 'file', 'url' => 'index')); ?>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <tr>
    <td>ジャンル</td>
    <td>
      <?php
        echo $this->Form->input('genre', array(
          'options' => $genre,
          'label' => false,
          'div' => false,
          'empty' => '選択してください'
        ));
       ?>
    </td>
  </tr>
  <tr>
    <td>アイテム名</td>
    <td>
      <?php echo $this->Form->input('title', array('label' => false, 'div' => false)); ?>
    </td>
  </tr>

  <tr>
    <td>アイテムジャンル</td>
    <td>
      <?php
        echo $this->Form->input('Item.item_genre', array(
          'type' => 'select',
          'label' => false,
          'div' => false,
          'multiple'=> 'checkbox',
          'options' => $item_genres,
        ));
      ?>
    </td>
  </tr>
<!--
  <tr>
    <td>好きなこと</td>
    <td>
      <?php
        echo $this->Form->input('Item.genre', array(
          'type' => 'select',
          'label' => false,
          'div' => false,
          'multiple'=> 'checkbox',
          'options' => $genres,
        ));
      ?>
    </td>
  </tr>
  <tr>
    <td>コアレベル</td>
    <td>
      <?php
        echo $this->Form->input('core_status', array(
            'options' => array(0, 1, 2, 3, 4, 5),
            'label' => false,
            'div' => false,
            'empty' => '選択してください'
        ));
       ?>
    </td>
  </tr>
-->



  <tr>
  <td>
    <?php echo $this->Form->end('検索'); ;?>
  </td>
  <td>
  </td>
  </tr>
</table>
    <?php echo $this->Html->link('新規作成', array('controller' => 'Items', 'action' => 'add')); ?>
    <?php echo $this->Paginator->counter(array(
      'format' => '<p>全{:count}件中/{:start}-{:end}件ヒット</p>'
    ));?>
    <div class="job-page">
      <?php
        echo $this->Paginator->first('<< ');
        echo $this->Paginator->numbers(
          array('separator' => '/','modulus'=>2));
        echo $this->Paginator->last(' >>');
      ?>
    </div>

    <?php echo $this->Form->create('Item', array('type' => 'file', 'url' => 'index')); ?>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <tr>
        <th>アイテム名<?php echo $this->Paginator->sort('id');?></th>
        <th>ジャンル</th>
        <th>価格</th>
        <th>おすすめアイテム</th>
        <th>販売</th>
        <th>詳細</th>
        <th>編集</th>
        <th>削除</th>
      </tr>


      <?php foreach ($datas as $key => $data): ?>
      <tr>
          <td><?php echo $data['Item']['title']; ?></td>
            <?php echo $this->Form->hidden($key.'][id]', array('value' => $data['Item']['id'])); ?>
          <td><?php echo $genre[$data['Item']['genre']]; ?></td>
          <td><?php echo $data['Item']['price']; ?></td>
        <td>
            <?php
              $options = array('0' => 'しない', '1' => 'する');
              echo $this->Form->input('Item.pick_up_item', array(
                  'legend' => false,
                  'type' => 'radio',
                  'options' => $options,
                 'legend' => false,
                 'name' => 'Item['.$key.'][pick_up_item]',
                  'value' => $data['Item']['pick_up_item'],
                  'div' => false
              ));
             ?>
        </td>
        <td>
            <?php
              $options = array('0' => '販売中', '1' => 'sould out');
              echo $this->Form->input('Item.sale_type', array(
                  'legend' => false,
                  'type' => 'radio',
                  'options' => $options,
                 'legend' => false,
                 'name' => 'Item['.$key.'][sale_type]',
                  'value' => $data['Item']['sale_type'],
                  'div' => false
              ));
             ?>
        </td>

          <td><?php echo $this->Html->link('詳細', array('controller' => 'Items', 'action' => 'detail', $data['Item']['id'])); ?></td>
          <td><?php echo $this->Html->link('編集', array('controller' => 'Items', 'action' => 'edit', $data['Item']['id'])); ?></td>
          <td><?php echo $this->Html->link('削除', array('controller' => 'Items', 'action' => 'delete', $data['Item']['id'])); ?></td>
       </tr>
      <?php endforeach; ?>
    </table>



      <?php echo $this->Form->end('submit') ;?>

    <div class="job-page">
      <?php
        echo $this->Paginator->first('<< ');
        echo $this->Paginator->numbers(
          array('separator' => '/','modulus'=>2));
        echo $this->Paginator->last(' >>');
      ?>
    </div>
    <div class="job-page">

        
