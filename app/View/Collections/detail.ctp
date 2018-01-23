        <!--========== PAGE LAYOUT ==========-->
        <!-- About -->
        <div id="about">
            <div class="content-lg container">
              <div class="row" style="padding:10px;">
                  <div>
                      <h2><?php echo $datas['Collection']['title']; ?></h2>
                      <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret</p>
                  </div>
              </div>
                <div class="row">
                    <div class="grid">
                        <div class="grid-sizer"></div>
                        <?php foreach ($datas['Image'] as $data): ?>
                          <div class="grid-item">
                            <a href="/noudo<?php echo $data['url']; ?>" data-lightbox="image">
                              <?php echo $this->Html->image($data['url'] ,array('class' => 'sp-image', 'width' => '100%' )); ?>
                            </a>
                          </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- End Masonry Grid -->
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
