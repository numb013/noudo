<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'FDU-24 簡単で当たる！職業診断 -コアでマイナーで珍しい職業-');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
            <?php if (empty($datas)): ?>
                <?php echo $cakeDescription ?>
            <?php else: ?>
                <?php echo $this->fetch('title'); ?> :
                <?php echo $cakeDescription ?>
            <?php endif; ?>       
        </title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('animate');
		//echo $this->Html->css('icomoon');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('flexslider');
                echo $this->Html->css('slider-pro');
		echo $this->Html->css('style');
		echo $this->Html->script('jquery.min.js');
		echo $this->Html->script('main');
                echo $this->Html->script('menu');
		echo $this->Html->script('jquery.easing.1.3');
		echo $this->Html->script('jquery.waypoints.min');
		echo $this->Html->script('jquery.flexslider-min');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('modernizr-2.6.2.min');
                echo $this->Html->script('jquery.sliderPro.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        <link rel="shortcut icon" href="/img/favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="/img/180.png">
        <meta name="description" content="まだあなたが知らないだけで、この世界には色々な職業が存在します。「FDU-24:簡単で当たる！職業診断」はコアでマイナーで珍しい職業を紹介する職業診断を個性としています、もしかしたらあなたの能力が発揮できる職業が見つかるかもしれません。">
        <meta name="google-site-verification" content="x353_ujDJJV6H__kTHhDVCtuDklhAc5OQ5pHIx23fUI" />
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
        <script src="js/ajaxzip3.js" charset="UTF-8"></script>
</head>


<script type="text/javascript"src="//webfonts.sakura.ne.jp/js/sakura.js"></script>
<link href="https://fonts.googleapis.com/css?family=Denk+One" rel="stylesheet">
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<body class="landing">
<script type="text/javascript">
    window._pt_lt = new Date().getTime();
    window._pt_sp_2 = [];
    _pt_sp_2.push('setAccount,50cb4f1c');
    var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    (function() {
        var atag = document.createElement('script'); atag.type = 'text/javascript'; atag.async = true;
        atag.src = _protocol + 'js.ptengine.jp/pta.js';
        var stag = document.createElement('script'); stag.type = 'text/javascript'; stag.async = true;
        stag.src = _protocol + 'js.ptengine.jp/pts.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(atag, s); s.parentNode.insertBefore(stag, s);
    })();

$(function(){
	 $('#caption').sliderPro();
});

$(function($) {
    WindowHeight = $(window).height();
    $('.drawr').css('height', WindowHeight); //メニューをWindowの高さいっぱいにする
    $(document).ready(function() {
        $('.b_btn').click(function(){ //クリックしたら
            $('.drawr').animate({width:'toggle'}); //animateで表示・非表示
            $(this).toggleClass('peke'); //toggleでクラス追加・削除
        });
    });
});


//キャプション付き
	$( document ).ready(function( $ ) {
		$('#caption').sliderPro({
			autoScaleLayers:false,//キャプションの自動変形
			waitForLayers: true,//キャプションのアニメーションが終了してからスライドするか
			width: 600,//横幅
			autoplay:false,//自動再生
			arrows: true,//左右の矢印
			buttons: true,//ナビゲーションボタン
			slideDistance:0,//スライド同士の距離
		});
	});



</script>

	<?php echo $this->element('head'); ?>
	<?php echo $this->Flash->render(); ?>
	<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('foot'); ?>
</body>
</html>
