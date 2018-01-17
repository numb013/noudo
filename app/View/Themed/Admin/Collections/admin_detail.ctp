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
          <td><?php echo $data['Collection']['title']; ?></td>
          <?php echo $this->Form->hidden('Collection.title', array('value' => $data['Collection']['title'])); ?>
        </tr>
        <tr>
          <td>画像</td>
          <td>
            <?php if(!empty($data['Image'])):?>
              <?php foreach ($data['Image'] as $key => $photo): ?>
                <?php if(!empty($photo)):?>
                  <?php echo $this->Html->image($photo['Image']['url'] ,array('width' => '15%' )); ?>
                <?php else: ?>
                  なし
                <?php endif; ?>
              <?php endforeach; ?>
            <?php else: ?>
              なし
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <th>テキスト</th>
          <td><?php echo $data['Collection']['text']; ?></td>
          <?php echo $this->Form->hidden('Collection.text', array('value' => $data['Collection']['text'])); ?>
        </tr>
        <tr>
          <td>編集</td>
          <td><?php echo $this->Html->link('編集', array('controller' => 'Collections', 'action' => 'edit', $data['Collection']['id'])); ?></td>
        </tr>
    </table>
    <?php echo $this->Html->link('一覧へ', array('controller' => 'Collections', 'action' => 'index')); ?>
  </body>
</html>
