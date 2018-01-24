<?php
//echo $this->Html->image('../img/136507110.jpg', array('alt' => 'CakePHP'));
?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="container">
                <ol class="carousel-indicators">
<?php foreach ($datas as $key => $data): ?>
                    <li data-target="#carousel-example-generic" data-slide-to=<?php echo $key; ?>></li>
<?php endforeach; ?>
                </ol>
            </div>

            <div class="carousel-inner" role="listbox">


<?php foreach ($datas as $data): ?>
                <div class="item">
<?php echo $this->Html->image($data['Image'][0]['url'] ,array('width' => '100%' )); ?>
                    <!-- <img class="img-responsive" src="../img/136507110.jpg.jpg" alt="Slider Image"> -->
                    <div class="container">
                        <div class="carousel-centered">
                            <div class="margin-b-40">
                                <h2 class="carousel-title"><?php echo $data['Topimage']['title']; ?></h2>
                                <p class="color-white">
                                  <?php echo $data['Topimage']['text']; ?>
                                </p>
                            </div>
                            <a href=<?php echo $data['Topimage']['url']; ?> class="btn-theme btn-theme-sm btn-white-brd text-uppercase">Check</a>
                        </div>
                    </div>
                </div>
<?php endforeach; ?>
            </div>
        </div>
        <!--========== SLIDER ==========-->



      <!-- Services -->



        <div id="services">
            <div data-auto-height="true">
                <div class="top_menu_wapper content row">
                    <!--// end row -->
                          <div class="margin-b-2">
                            <div class="col-sm-4 fh5co-item">
                              <a href="single.html" class="transition animate-box">
																<?php
																echo $this->Html->image('../img/image_53.jpg', array('alt' => 'CakePHP'));
																?>
                                <img src="img/top11.jpg" alt="">
                                <div class="fh5co-item-text-wrap">
                                  <div class="fh5co-item-text">
                                    <h3>Collection</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                  </div>
                                </div>
                              </a>
                            </div>



                            <div class="col-sm-4 fh5co-item">
                              <a href="single.html" class="transition animate-box">
                                <?php
                                echo $this->Html->image('../img/image_53.jpg', array('alt' => 'CakePHP'));
                                ?>
                                <img src="img/top11.jpg" alt="">
                                <div class="fh5co-item-text-wrap">
                                  <div class="fh5co-item-text">
                                    <h3>Online Shop</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                  </div>
                                </div>
                              </a>
                            </div>



                            <div class="col-sm-4 fh5co-item">
                              <a href="single.html" class="transition animate-box">
                                <?php
                                echo $this->Html->image('../img/image_53.jpg', array('alt' => 'CakePHP'));
                                ?>
                                <img src="img/top11.jpg" alt="">
                                <div class="fh5co-item-text-wrap">
                                  <div class="fh5co-item-text">
                                    <h3>About</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                  </div>
                                </div>
                              </a>
                            </div>





                </div>
            </div>
        </div>
        <!-- End Service -->
