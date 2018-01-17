<html>
  <head>
    <title>性格</title>
    <?php echo $this->Html->script( 'jquery-2.2.3.min.js'); ?>
    <link href="jquery.rateyo.min.css" rel="stylesheet" type="text/css">
  </head>
  <body>

<?php

//echo pr($data);

?>
      
      <h1>Add Pagedddddd</h1>
    <?php echo $this->Form->create('Collections', array('type' => 'file', 'url' => 'regist')); ?>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <tr>
          <th>職業名</th>
          <td><?php echo $data['Collections']['title']; ?></td>
          <?php echo $this->Form->hidden('Collection.title', array('value' => $data['Collections']['title'])); ?>
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
        <tr>
          <th>テキスト</th>
          <td><?php echo $data['Collections']['text']; ?></td>
          <?php echo $this->Form->hidden('Collection.text', array('value' => $data['Collections']['text'])); ?>
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
    <?php echo $this->Html->link('一覧へ', array('controller' => 'Collections', 'action' => 'index')); ?>


    <script type="text/javascript">
      function photodelete(chkID){
        Myid=document.getElementById(chkID);
        if(Myid.checked == true){
          myRet = confirm("画像を削除してもいいですか？");
          if ( myRet == true ){
             Myid.parentNode.style.display = 'none';
          }　else {
            Myid.checked = false;
          }
        }
      }

      var todoNum = 1;
      function addPhoto(){
          var txt = '<div id="'+ 'Image' + todoNum + '">'
              + '<?php echo $this->Form->input("Image.'  + todoNum +  '", array("type" => "file", "label" => false)); ?>'
              + '<input type="button" value="削除" onclick="del(' + todoNum + ');">'
              + '</div>';
          document.getElementById('show').innerHTML
              = document.getElementById('show').innerHTML + txt;
          todoNum++;
      }
      function del(todoNum) {
        var photodel = 'Image' + todoNum;
        var dom_obj=document.getElementById(photodel);
        var dom_obj_parent=dom_obj.parentNode;
        dom_obj_parent.removeChild(dom_obj);
      }

    
    
    $('.sale_flag').click(function(){
            var value = $(this).val();
            if (value == 1) {
                $('.discount_tr').css('display', 'block');
            } else {
                $('.discount_tr').css('display', 'none');
            }
        });
    </script>


  </body>
</html>
