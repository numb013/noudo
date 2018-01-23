<header class="header navbar-fixed-top">
  <nav class="navbar" role="navigation">
    <div class="container">
        <div class="menu-container js_nav-item">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="toggle-icon"></span>
          </button>
            <div class="logo">
                <?php if ($_SERVER['DOCUMENT_ROOT'] == 'C:/xampp/htdocs'): ?>
                  <a href="/noudo/">
                <?php else: ?>
                  <a href="/">
                <?php endif; ?>
                <img class="logo-img logo-img-main" src="img/logo_hedar.jpg" alt="">
                <img class="logo-img logo-img-active" src="img/logo_hedar.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="collapse navbar-collapse nav-collapse">
            <div class="menu-container">
                <ul class="nav navbar-nav navbar-nav-right">
                    <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="/noudo/">Home</a></li>
                    <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="/noudo/Abouts">About</a></li>
                    <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="/noudo/Items">Online</a></li>
                    <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="/noudo/Collections">Collection</a></li>
                    <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="/noudo/Shops">Dealer</a></li>
                    <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="/noudo/Contacts">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
  </nav>
</header>
