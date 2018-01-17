<?php echo $this->Form->create('Collection', array('type' => 'file', 'url' => 'index')); ?>
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
<!--
  <tr>
    <td>性格など</td>
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
    <?php echo $this->Html->link('新規作成', array('controller' => 'Collections', 'action' => 'add')); ?>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <tr>
        <th>アイテム名<?php echo $this->Paginator->sort('id');?></th>
        <th>ジャンル</th>
        <th>詳細</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
      <?php foreach ($datas as $data): ?>
      <tr>
          <td><?php echo $data['Collection']['title']; ?></td>
          <td><?php echo $data['Collection']['text']; ?></td>
          <td><?php echo $this->Html->link('詳細', array('controller' => 'Collections', 'action' => 'detail', $data['Collection']['id'])); ?></td>
          <td><?php echo $this->Html->link('編集', array('controller' => 'Collections', 'action' => 'edit', $data['Collection']['id'])); ?></td>
          <td><?php echo $this->Html->link('削除', array('controller' => 'Collections', 'action' => 'delete', $data['Collection']['id'])); ?></td>
       </tr>
      <?php endforeach; ?>
    </table>
    <div class="job-page">
      <?php
        echo $this->Paginator->first('<< ');
        echo $this->Paginator->numbers(
          array('separator' => '/','modulus'=>2));
        echo $this->Paginator->last(' >>');
      ?>
    </div>
    <div class="job-page">

        
