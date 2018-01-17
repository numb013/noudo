<div class="row">
  <?php

  // echo pr($error);
  // exit();

   ?>



  <?php echo $this->Form->create('contacts', array('type' => 'post', 'url' =>  'index')); ?>

  <div class="fh5co-contact animate-box">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="row">
            <h1 class="contact_title">お問い合わせ</h1>
            <div class="contact-btn-feeld" style="margin-bottom:20px;">
              <p>
                お問い合わせありがとうございます。<br>
                お手数ですが下記フォームにお問い合わせ内容を
                入力の上、送信くださいますようお願いいたします。
              </p>
            </div>
						<div class="col-md-6">
              <p style=color:red;>
              <?php
                if (!empty($error['name'][0])) {
                  echo $error['name'][0];
                };
              ?>
            </p>
							<div class="form-group" style="margin-right:10px;">
                <?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => "Name")); ?>
							</div>
						</div>
						<div class="col-md-6">
              <p style=color:red;>
              <?php
                if (!empty($error['email'][0])) {
                  echo $error['email'][0];
                };
              ?>
            </p>
							<div class="form-group">
                <?php echo $this->Form->input('email', array('type' => 'email', 'label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => "Email")); ?>
							</div>
						</div>
						<div class="col-md-12">
              <p style=color:red;>
              <?php
                if (!empty($error['body'][0])) {
                  echo $error['body'][0];
                };
              ?>
            </p>
							<div class="form-group">
                <?php echo $this->Form->input('body', array('type' => 'textarea', 'label' => false, 'div' => false, 'class' => 'form-control', 'placeholder' => "Message")); ?>
							</div>
						</div>
            <div class="contact-btn-feeld">
              <div class="set-btn animated fadeInUp">
                <?php echo $this->Form->button('確認する', array('type' => 'submit', 'label' => false, 'div' => false, 'class' => 'btn_submit', 'name' => 'confirm', 'value' => 'confirm')); ?>
                <?php echo $this->Form->end(); ?>
              </div>
            </div>
          </div>
				</div>
			</div>
    </div>
  </div>



	<?php echo $this->element('bottom'); ?>
