<!-- Services -->
<div id="services"
        <div class="content-lg container">
            <div class="row" style="padding:10px;">
                <div>
                    <h2>COLLECTION</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret</p>
                </div>
            </div>
            <!--// end row -->

            <div class="row row-space-1 margin-b-2">
                            <div class="row">


                              <?php foreach ($datas as $data): ?>
                                <div class="col-md-4 item_name">
                                  <div class="a">
                                    <a href="/noudo/collections/detail/<?php echo $data['Collection']['id']; ?>" class="open-popup-link">
                                      <?php echo $this->Html->image($data['Image'][0]['url'] ,array('width' => '100%' )); ?>
                                      <div class="img-hover hand-parts">
                                        <div class="c-table">
                                          <div class="ct-cell">
                                            <h3 class="img-title">
                                                <?php echo $data['Collection']['title'] ;?>
                                            </h3>
                                          </div>
                                        </div>
                                      </div>
                                    </a>
                                  </div>
                                </div>
                              <?php endforeach; ?>


                            </div>
                          </div>
            </div>
            <!--// end row -->
    </div>
</div>
<!-- End Service -->
