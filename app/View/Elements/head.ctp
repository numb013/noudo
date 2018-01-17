<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
                                <h1 itemprop="name">
                                    <?php if ($_SERVER['DOCUMENT_ROOT'] == 'C:/xampp/htdocs'): ?>
                                      <a href="/ec/">
                                    <?php else: ?>
                                      <a href="/">
                                    <?php endif; ?>
                                    FDU<span>-</span>24
                                  </a>
                                </h1>
				<nav role="navigation">
                                    <ul id="menu">
                                        <li><a href="/ec/items">online shop</a></li>
                                        <li><a href="/ec/carts/index/form_menu">カート</a></li>
                                        <li><a href="/ec/shops">Store</a></li>
                                        <li><a href="/ec/Contacts">Contact</a></li>
                                        <?php if(!empty($member)): ?> 
                                            <li><a href="/ec/users/mypage">マイページ</a></li>
                                            <li><a href="/ec/users/logout">ログアウト</a></li>
                                        <?php else: ?>
                                            <li><a href="/ec/users/login">ログイン</a></li>
                                        <?php endif; ?>
                                    </ul>
				</nav>
			</div>
		</div>
	</header>
 <script>
 // アナリティクス トラッキング コード
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87126946-1', 'auto');
  ga('send', 'pageview');

</script>
