<html>
  <head>
    <title>性格</title>
    <?php echo $this->Html->script( 'jquery-2.2.3.min.js'); ?>
    <link href="jquery.rateyo.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h1>Add Pagedddddd</h1>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <tr>
          <th>職業名</th>
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
        <tr>
          <td>編集</td>
          <td><?php echo $this->Html->link('編集', array('controller' => 'Shops', 'action' => 'edit', $data['Shop']['id'])); ?></td>
        </tr>
    </table>
    <?php echo $this->Html->link('一覧へ', array('controller' => 'Shops', 'action' => 'index')); ?>
  </body>
</html>
