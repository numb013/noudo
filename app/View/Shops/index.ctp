    <div id="contact">
        <!-- Contact List -->
        <div class="section-seperator">
            <div class="content-lg container">
              <div class="row" style="padding:10px;">
                  <div>
                      <h2>DEALER</h2>
                  </div>
              </div>
                <div class="row">
                  <div class="col-sm-13 col-md-13" style="text-align: center;">
                  <?php foreach ($datas as $data): ?>
                    <h3 class="lead_1"id="anchor1"><?php echo $data['Shop']['tdfk']; ?></a></h3>
                    <p>
                      <a href=<?php echo !empty($data['Shop']['shop_url'])? $data['Shop']['shop_url'] : '#'; ?> target="_blank">
                        <?php echo $data['Shop']['name']; ?>
                      </a>
                    </p>
                  <hr>
                  <?php endforeach; ?>
              </div>
          </div>
      </div>