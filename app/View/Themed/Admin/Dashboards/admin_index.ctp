<html>
  <head>
    <title>Index Page</title>
  </head>
  <body>
    <p>MySampleData Index View.</p>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <tr>
        <th>アイテム一覧</th>
        <td><?php echo $this->Html->link('一覧リンク', array('controller' => 'Items', 'action' => 'index')); ?></td>
      </tr>
      <tr>
        <th>コレクション一覧</th>
        <td><?php echo $this->Html->link('一覧リンク', array('controller' => 'collenctions', 'action' => 'index')); ?></td>
      </tr>
      <tr>
        <th>ジャンル</th>
        <td><?php echo $this->Html->link('一覧リンク', array('controller' => 'Genres', 'action' => 'index')); ?></td>
      </tr>
    <tr>
        <th>アイテムジャンル</th>
        <td><?php echo $this->Html->link('一覧リンク', array('controller' => 'ItemGenres', 'action' => 'index')); ?></td>
    </tr>
    <tr>
        <th>トップ画像</th>
        <td><?php echo $this->Html->link('一覧リンク', array('controller' => 'Topimages', 'action' => 'index')); ?></td>
    </tr>
    <tr>
        <th>アバウト</th>
        <td><?php echo $this->Html->link('一覧リンク', array('controller' => 'Abouts', 'action' => 'index')); ?></td>
    </tr>
    <tr>
        <th>店舗情報</th>
        <td><?php echo $this->Html->link('一覧リンク', array('controller' => 'Shops', 'action' => 'index')); ?></td>
    </tr>
    </table>
  </body>
</html>
