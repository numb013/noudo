<html>
  <head>
  </head>
  <body>
    <?php echo $this->Html->link('新規作成', array('controller' => 'Collections', 'action' => 'add')); ?>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <tr>
        <th>タイトル</th>
        <th>テキスト</th>
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
  </body>
</html>
