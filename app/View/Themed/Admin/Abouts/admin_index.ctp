<?php echo $this->Form->create('About', array('type' => 'file', 'url' => 'index')); ?>
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
    <?php echo $this->Html->link('新規作成', array('controller' => 'Abouts', 'action' => 'add')); ?>

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <tr>
        <th>タイトル<?php echo $this->Paginator->sort('id');?></th>
        <th>詳細</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
      <?php foreach ($datas as $data): ?>
      <tr>
          <td><?php echo $data['About']['title']; ?></td>
          <td><?php echo $this->Html->link('詳細', array('controller' => 'Abouts', 'action' => 'detail', $data['About']['id'])); ?></td>
          <td><?php echo $this->Html->link('編集', array('controller' => 'Abouts', 'action' => 'edit', $data['About']['id'])); ?></td>
          <td><?php echo $this->Html->link('削除', array('controller' => 'Abouts', 'action' => 'delete', $data['About']['id'])); ?></td>
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
