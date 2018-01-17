<html>
  <head>
    <title>Index Page</title>
  </head>
  <body>
    <p>MySampleData Edit Form.</p>
    <?php echo $this->Form->create('Collection', array('type' => 'file', 'url' => 'edit')); ?>
    <?php echo $this->Form->input('id'); ?>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <tr>
        <th>タイトル</th>
        <td>
          <?php echo $this->Form->input('title', array('label' => false, 'div' => false)); ?>
        </td>
      </tr>

      <tr>
        <tr>
          <td>
            画像
            <input type="button" value="追加" id="btn" onclick="addPhoto();">
          </td>
          <td id="txt">
            <?php echo $this->Form->input('Image.0', array('type' => 'file', 'label' => false)); ?>
          </td>
        </tr>
        <tr>
          <td></td>
          <td id="show">
          </td>
        </tr>
        <?php if(!empty($this->request->data['Image'])):?>
          <?php foreach ($this->request->data['Image'] as $key => $phot): ?>
            <tr>
              <td> 画像</td>
              <td>
                <?php  echo $this->Html->image($phot['url'] ,array('width' => '15%' )); ?>
                <?php echo $this->Form->input('Check.'.$key.'.photo', array(
                  'id' => 'phpto'.$key,
                  'onclick'=> "photodelete('phpto".$key."')",
                  'type' => 'checkbox',
                  'label' => '削除2',
                  'div' => false,
                  'value' => $phot['url']
                  )); ?>
              </td>
            </tr>
            <?php //echo $this->Form->hidden('BeforeImage]['.$key.'][id]', array('value' => $phot['id'])); ?>
            <?php echo $this->Form->hidden('BeforeImage]['.$key.'][url]', array('value' => $phot['url'])); ?>
          <?php endforeach; ?>
        <?php endif;?>
        </tr>
      <tr>
        <th>テキスト</th>
        <td><?php echo $this->Form->textarea('Collection.text', array('type' => 'text', 'label' => false, 'div' => false, 'rows' => 5, 'style' => 'width:100%')); ?></td>
      </tr>

    </table>
    <?php
    if (!empty($this->request->data['photo_dele'])) {
      foreach ($this->request->data['photo_dele'] as $key => $PhotoDele) {
        echo $this->Form->hidden('photo_dele]['.$key, array('value' => $PhotoDele));
      }
    } elseif (!empty($this->request->data['Check'])) {
        foreach ($this->request->data['Check'] as $key => $CheckPhoto) {
          echo $this->Form->hidden('photo_dele]['.$key, array('value' => $CheckPhoto['photo']));
        }
      }
    ?>

    <div class="buttom_edit" style="float:left; margin-right:50px;">
      <?php echo $this->Form->end('submit') ;?>
    </div>

    <?php echo $this->Html->link('戻る', array('controller' => 'Collections', 'action' => 'index')); ?>

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
    </script>

  </body>
</html>
