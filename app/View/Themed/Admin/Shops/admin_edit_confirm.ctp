<html>
  <head>
    <title>性格</title>
    <?php echo $this->Html->script( 'jquery-2.2.3.min.js'); ?>
    <link href="jquery.rateyo.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
<?php
echo pr($data);

?>
    <h1>Add Pagedddddd</h1>
    <?php echo $this->Form->create('Shops', array('type' => 'file', 'url' => 'edit_regist')); ?>
    <?php echo $this->Form->input('Shop.id'); ?>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <tr>
          <th>店舗名</th>
          <td><?php echo $data['Shop']['name']; ?></td>
          <?php echo $this->Form->hidden('Shop.name', array('value' => $data['Shop']['name'])); ?>
        </tr>
        <tr>
          <th>都道府県</th>
          <td><?php echo $data['Shop']['tdfk']; ?></td>
          <?php echo $this->Form->hidden('Shop.tdfk', array('value' => $data['Shop']['tdfk'])); ?>
        </tr>
        <tr>
          <th>店舗URL</th>
          <td><?php echo $data['Shop']['shop_url']; ?></td>
          <?php echo $this->Form->hidden('Shop.shop_url', array('value' => $data['Shop']['shop_url'])); ?>
        </tr>
    </table>
    <div class="btn-area">
        <div class="btn gray-b">
                <?php echo $this->Form->submit('戻る', array('name' => 'back', 'type' => 'submit', 'label' => false, 'div' => false)); ?>
        </div>
        <div class="btn">
                <?php echo $this->Form->submit('登録', array('name' => 'regist', 'type' => 'submit', 'label' => false, 'div' => false)); ?>
        </div>
    </div>
    <?php echo $this->Html->link('一覧へ', array('controller' => 'Shops', 'action' => 'index')); ?>

  </body>
</html>
