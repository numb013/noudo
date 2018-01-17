<html>
  <head>
  </head>
  <body>
    <?php echo $this->Html->link('新規作成', array('controller' => 'Shops', 'action' => 'add')); ?>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <tr>
        <th>店名</th>
        <th>都道府県</th>
        <th>詳細</th>
        <th>編集</th>
        <th>削除</th>
      </tr>
      <?php foreach ($datas as $data): ?>
        <tr>
          <td><?php echo $data['Shop']['name']; ?></td>
          <td><?php echo $data['Shop']['tdfk']; ?></td>
          <td><?php echo $this->Html->link('詳細', array('controller' => 'Shops', 'action' => 'detail', $data['Shop']['id'])); ?></td>
          <td><?php echo $this->Html->link('編集', array('controller' => 'Shops', 'action' => 'edit', $data['Shop']['id'])); ?></td>
          <td><?php echo $this->Html->link('削除', array('controller' => 'Shops', 'action' => 'delete', $data['Shop']['id'])); ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </body>
</html>
