<html>
<?php

//echo pr($this->request->data);

?>
  <head>
    <title>性格</title>
    <?php echo $this->Html->script( 'jquery-2.2.3.min.js'); ?>
    <link href="jquery.rateyo.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
      <h1>Add Page</h1>
    <?php echo $this->Form->create('Shops', array('type' => 'file', 'url' => 'edit')); ?>
      <?php echo $this->Form->input('Shop.id'); ?>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <tr>
        <th>店名</th>
        <td>
          <?php echo $this->Form->input('Shop.name', array('label' => false, 'div' => false)); ?>
        </td>
      </tr>
      <tr>
        <th>都道府県</th>
        <td>
          <?php echo $this->Form->input('Shop.tdfk', array('label' => false, 'div' => false)); ?>
        </td>
      </tr>
      <tr>
        <th>店舗URL</th>
        <td>
          <?php echo $this->Form->input('Shop.shop_url', array('label' => false, 'div' => false)); ?>
        </td>
      </tr>
    </table>
    <?php echo $this->Form->end('Submit'); ?>
    <?php echo $this->Html->link('一覧へ', array('controller' => 'Shops', 'action' => 'index')); ?>
  </body>
</html>
