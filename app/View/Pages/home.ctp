<aside id="fh5co-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
		<ul class="slides">
			<li style="background-image: url(img/image_1.jpg);">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="col-md-10 text-center js-fullheight slider-text">
						<div class="slider-text-inner">
							<h2>Your gender?</h2>
							<div class="parameter-frame">
								<p class="parameter">
									<?php echo $this->Html->link('MAN', array('controller' => 'Jobs','action' => 'index', '1'), array('class'=>'btn btn-primary btn-lg'));?>
								</p>
								<p class="parameter">
									<?php echo $this->Html->link('WOMAN', array('controller' => 'Jobs','action' => 'index', '2'), array('class'=>'btn btn-primary btn-lg'));?>
								</p>
							</div>
					</div>
					</div>
				</div>
			</li>
			<li style="background-image: url(img/image_1.jpg);">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="col-md-10 text-center js-fullheight slider-text">
						<div class="slider-text-inner">
							<h2>DO YOU LIKE?</h2>
							<div class="parameter-frame">
								<p class="parameter">
									<?php echo $this->Html->link('MUSIC', array('controller' => 'Jobs', 'action' => 'index', '3'), array('class'=>'btn btn-primary btn-lg'));?>
								</p>
								<p class="parameter">
									<?php echo $this->Html->link('SPORT', array('controller' => 'Jobs', 'action' => 'index', '4'), array('class'=>'btn btn-primary btn-lg'));?>
								</p>
							</div>
					</div>
					</div>
				</div>
			</li>
			<li style="background-image: url(img/image_1.jpg);">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="col-md-10 text-center js-fullheight slider-text">
						<div class="slider-text-inner">
							<h2>DO YOU LIKE?</h2>
							<div class="parameter-frame">
								<p class="parameter">
									<?php echo $this->Html->link('GAME', array('controller' => 'Jobs','action' => 'index', '5'), array('class'=>'btn btn-primary btn-lg'));?>
								</p>
								<p class="parameter">
									<?php echo $this->Html->link('COOKING', array('controller' => 'Jobs','action' => 'index', '6'), array('class'=>'btn btn-primary btn-lg'));?>
								</p>
							</div>
					</div>
					</div>
				</div>
			</li>
			</ul>
		</div>
</aside>

<div class="fh5co-cta" style="background-image: url(img/image_3.jpg);">
	<div class="overlay"></div>
	<div class="container">
		<div class="col-md-12 text-center animate-box">
			<h3 style="color:#fff; font-size:26px; margin-bottom:12px;">What is FDU-24 !?</h3>
			<p style="font-size:18px;">
				まだあなたが知らないだけで、この世界には色々な職業が存在します。「FDU-24:簡単で当たる！職業診断」はコアでマイナーで珍しい職業を紹介する職業診断を個性としています、もしかしたらあなたの能力が発揮できる職業が見つかるかもしれません。まずはトップ画面の２択のうち1つを選び診断スタートして下さい。
				<!-- <?php echo $this->Html->link('Get started now!!', array('controller' => 'Pages','action' => 'content'), array('class' => 'btn btn-primary btn-outline with-arrow'));?> -->
			</p>
		</div>
	</div>
</div>


<div class="fh5co-cta" style='background: #f7f7f7;'>
  <div class="text-center container fh5co-heading">
    <h3 style="color:#323232; margin-top:0px; font-size:18px;">転職に役だつ情報をピックアップ</h3>
    <?php echo $this->Html->link('転職ニュースまとめ', array('controller' => 'Rsses', 'action' => 'index'), array('class' => 'occupation_link')); ?>
  </div>
</div>
<div class="animate-box fh5co-cta">
  <div class="text-center container fh5co-heading">
    <h3 style="color:#323232; margin-top:0px; font-size:24px;">For inquiries from here</h3>
        <!-- <?php echo $this->Html->link('お問い合わせ', array('controller' => 'Contacts', 'action' => 'index')); ?> -->
        <a href="Contacts/index" class="occupation_link">お問い合わせ</a>
  </div>
</div>