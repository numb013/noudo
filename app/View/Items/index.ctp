<!-- <?php echo $this->Form->create('Item', array('type' => 'file', 'url' => 'index')); ?>
<br>
<br>
<br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <tr>
    <td>ジャンル</td>
    <td>
      <?php
        echo $this->Form->input('item_genre', array(
          'options' => $item_genres,
          'label' => false,
          'div' => false,
          'empty' => '選択してください'
        ));
       ?>
    </td>
  </tr>
  <tr>
    <td>アイテム名</td>
    <td>
      <?php echo $this->Form->input('title', array('label' => false, 'div' => false)); ?>
    </td>
  </tr>
  <tr>
    <td>ジャンル</td>
    <td>
      <?php
        echo $this->Form->input('genre', array(
            'type' => 'select',
            'multiple' => 'checkbox',
            'label' => false,
            'div' => false,
            'options' => $genre,
            'legend'=>false,
            'class' => 'genre_check'
        ));
      ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php echo $this->Form->end('検索'); ;?>
    </td>
  </tr>
</table>

 -->




        <!--========== PAGE LAYOUT ==========-->
        <!-- About -->
        <div id="about">
            <div class="content-lg container">
              <div class="row" style="padding:10px;">
                  <div>
                      <h2>ONLINE SHOP</h2>
                      <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret</p>
                  </div>
              </div>


                  <div class="col-md-offset-0 text-center fh5co-heading job-box" style="clear: both;">
                    <!-- <div class="job-count">
                      <?php echo $this->Paginator->counter(array(
                        'format' => '<p>全{:count}件中/{:start}-{:end}件ヒット</p>'
                      ));?>
                    </div> -->
                    <!-- <div class="job-page">
                      <?php
                        echo $this->Paginator->first('<< ');
                        echo $this->Paginator->numbers(
                          array('separator' => '/','modulus'=>2));
                        echo $this->Paginator->last(' >>');
                      ?>
                    </div> -->
                  </div>


                <!-- Masonry Grid -->
                <div class="row">
                  <?php foreach ($datas as $key => $data): ?>

                    <div class="col-sm-3 pick_up_item sm-margin-b-50 wow animated <?php echo $key%2==0 ?'fadeInLeft':'fadeInRight'; ?> data-wow-offset="40">
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

                <div class="col-md-offset-0 text-center fh5co-heading job-box" style="clear: both; background:#000;">
<!--                   <div class="job-count">
                    <?php echo $this->Paginator->counter(array(
                      'format' => '<p>全{:count}件中/{:start}-{:end}件ヒット</p>'
                    ));?>
                  </div> -->
                  <div class="job-page">
                    <?php
                      echo $this->Paginator->first('<< ');
                      echo $this->Paginator->numbers(
                        array('separator' => '/','modulus'=>2));
                      echo $this->Paginator->last(' >>');
                    ?>
                  </div>
                </div>
                <!-- End Masonry Grid -->
            </div>
          </div>
        </div>
        <!-- End About -->



<script >// external js: masonry.pkgd.js
$('.grid').masonry({
itemSelector: '.grid-item',
columnWidth: '.grid-sizer',
percentPosition: true
});
</script>

</div>
