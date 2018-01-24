
<?php
//echo pr($data);

?>

  <!-- Latest Products -->
  <div id="products">

          <div class="row margin-b-40">
<?php echo $this->Html->image($data['Image'][0]['url'] ,array('width' => '100%' )); ?>
          </div>
          <!--// end row -->
      <div class="container">
          <div class="row">
              <p>
              <?php
                echo $data['About']['text'];
              ?>
              </p>
          </div>
          <!--// end row -->
      </div>
  </div>
  <!-- End Latest Products -->
