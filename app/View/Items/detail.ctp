<div class="row">

        <!--========== PAGE LAYOUT ==========-->
        <!-- About -->
        <div id="about">
            <div class="bg-color-sky-light">
                <div class="content-lg container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="slider-pro" id="slider2">
                                <div class="sp-slides">
                                  <?php foreach ($datas['Image'] as $data): ?>
                                    <div class="sp-slide">
                                        <?php echo $this->Html->image($data['Image']['url'] ,array('class' => 'sp-image', 'width' => '100%' )); ?>
                                    </div>
                                  <?php endforeach; ?>
                                </div>
                                <div class="sp-thumbnails">
                                  <?php foreach ($datas['Image'] as $data): ?>
                                      <?php echo $this->Html->image($data['Image']['url'] ,array('class' => 'sp-thumbnail')); ?>
                                  <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4">
                            <div class="panel-body" id>
                                <div class="kago">
                                  <ul class="item_name">
                                    <li><?php echo $datas['Item']['title']; ?></li>
                                    <li class="price">￥<?php echo $datas['Item']['price']; ?><span class="tax">(tax.￥21,600)</span></li>
                                  </ul>

                                <?php if($datas['Item']['sale_type'] == 0): ?>
                                 <?php echo $datas['Item']['ec_shop_code']; ?>
                                <?php else: ?>
                                
                                <button type="submit" class="submit_1"><a href="#">SOULD OUT</a></button>
                                <?php endif; ?>

                                </div>
                                <button type="submit" class="submit_1"><a href="../contact_input.php">このアイテムのお問い合わせ</a></button>
                                <div class="detail_text">
                                <h3>アイテム説明</h3>
                                  <p>
                                    <?php echo nl2br($datas['Item']['item_text']); ?>
                                  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest Products -->
        <div id="products">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 style="margin-top:25px;">おすすめアイテム</h2>
                    </div>
                </div>
                <!--// end row -->

                <div class="row">
                  <?php foreach ($datas['pick_up_item'] as $data): ?>
                    <div class="col-sm-3 pick_up_item sm-margin-b-50 wow animated fadeInLeft" data-wow-offset="40">
                      <a href="/noudo/items/detail/<?php echo $data['Item']['id']; ?>">
                        <div class="margin-b-5">
                            <?php echo $this->Html->image($data['Image'][0]['url'] ,array('width' => '100%' )); ?>
                        </div>
                        <p class="price">
                        <?php if($data['Item']['sale_type'] == 0): ?>
                        ￥<?php echo $data['Item']['price'] ;?>
                        <?php else: ?>
                        SOULD OUT
                        <?php endif; ?>
                        </p>
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End Latest Products -->


<style>

.sp-image {
    position: relative;
    display: block;
    border: none;
    width: 100% !important;
    height: auto !important;
    vertical-align: middle;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
}

</style>



<script>
$( document ).ready(function( $ ) {
  $('#slider2').sliderPro({
    width:736,//横幅
    height:1100,//縦幅
    buttons: false,//ナビゲーションボタン
    shuffle: false,//スライドのシャッフル
    centerImage : true,
    arrows: true,
    thumbnailWidth: 80,//サムネイルの横幅
    thumbnailHeight: 80,//サムネイルの縦幅
    slideDistance:0,//スライド同士の距離
    breakpoints: {
      480: {//表示方法を変えるサイズ
        thumbnailWidth: 70,
        thumbnailHeight: 40
      }
    }
  });
});
</script>