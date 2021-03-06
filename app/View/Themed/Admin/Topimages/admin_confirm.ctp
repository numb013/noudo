<html>
  <head>
    <title>Index Page</title>
  </head>
  <body>
    <h1>Edit Page</h1>
    <p>MySampleData Edit Form.</p>
    <?php echo $this->Form->create('Topimage', array('type' => 'file', 'url' => 'regist')); ?>
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <tr>
            <th>タイトル</th>
            <td><?php echo $data['Topimage']['title']; ?></td>
            <?php echo $this->Form->hidden('Topimage.title', array('value' => $data['Topimage']['title'])); ?>
          </tr>
          <tr>
            <th>テキスト</th>
            <td><?php echo $data['Topimage']['text']; ?></td>
            <?php echo $this->Form->hidden('Topimage.text', array('value' => $data['Topimage']['text'])); ?>
          </tr>
          <tr>
            <th>URL</th>
            <td><?php echo $data['Topimage']['url']; ?></td>
            <?php echo $this->Form->hidden('Topimage.url', array('value' => $data['Topimage']['url'])); ?>
          </tr>
          <tr>
            <th>画像</th>
            <td>
              <?php if(!empty($data['Image'])):?>
                <?php foreach ($data['Image'] as $key => $photo): ?>
                  <?php if(!empty($photo)):?>
                    <?php echo $this->Html->image($photo['url'] ,array('width' => '15%' )); ?>
                    <?php echo $this->Form->hidden('Image.'.$key.'.name', array('value' => $photo['name'])); ?>
                    <?php echo $this->Form->hidden('Image.'.$key.'.type', array('value' => $photo['type'])); ?>
                    <?php echo $this->Form->hidden('Image.'.$key.'.tmp_name', array('value' => $photo['tmp_name'])); ?>
                    <?php echo $this->Form->hidden('Image.'.$key.'.error', array('value' => $photo['error'])); ?>
                    <?php echo $this->Form->hidden('Image.'.$key.'.size', array('value' => $photo['size'])); ?>
                    <?php echo $this->Form->hidden('Image.'.$key.'.url', array('value' => $photo['url'])); ?>
                  <?php else: ?>
                    なし
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php else: ?>
                なし
              <?php endif; ?>
            </td>
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
    <?php echo $this->Html->link('一覧', array('controller' => 'Topimages', 'action' => 'admin_index')); ?>
  </body>
</html>
