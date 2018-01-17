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
    <?php echo $this->Form->create('Collections', array('type' => 'file', 'url' => 'edit')); ?>
      <?php echo $this->Form->input('Collection.id'); ?>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <tr>
        <th>店名</th>
        <td>
          <?php echo $this->Form->input('Collection.title', array('label' => false, 'div' => false)); ?>
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
          <?php foreach ($this->request->data['Image'] as $key => $photo): ?>
            <tr>
              <td> 画像</td>
              <td>
                <?php  echo $this->Html->image($photo['url'] ,array('width' => '15%' )); ?>
                <?php echo $this->Form->input('Check.'.$key.'.photo', array(
                  'id' => 'phpto'.$key,
                  'onclick'=> "photodelete('phpto".$key."')",
                  'type' => 'checkbox',
                  'label' => '削除2',
                  'div' => false,
                  'value' => $photo['url']
                  )); ?>
              </td>
            </tr>
            <?php echo $this->Form->hidden('Collection.BeforeImage]['.$key.'][id]', array('value' => $photo['id'])); ?>
            <?php echo $this->Form->hidden('Collection.BeforeImage]['.$key.'][url]', array('value' => $photo['url'])); ?>
          <?php endforeach; ?>
        <?php endif;?>
        </tr>
      <tr>
        <th>テキスト</th>
        <td>
          <?php echo $this->Form->input('Collection.text', array('label' => false, 'div' => false)); ?>
        </td>
      </tr>
    </table>
    <?php echo $this->Form->end('Submit'); ?>
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

        var sale_flag = $(".sale_flag:checked").val();
        if (sale_flag == 1) {
            $('.discount_tr').css('display', 'block');
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
