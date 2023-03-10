 <!--header-->
  <header id="site-header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg stroke">
        <h6><a class="navbar-brand" href="<?= baseURL('index/'); ?>">
            <img src="/Images/favicon.png" alt="logo" title="Logo" style="height:40px;" /> Master<span>Palace</span>
          </a></h6>
        <!-- if logo is image enable this  -->  
        <!-- <a class="navbar-brand" href="<?= baseURL('index/'); ?>">
          <img src="/Images/faviconM.png" alt="logo" title="Logo" style="height:50px;"  /> 
        </a> -->
        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= baseURL('index/'); ?>">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= baseURL('about-us/'); ?>">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= baseURL('our-services/'); ?>">Our Services</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= baseURL('hire-us/'); ?>">Hire Us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= baseURL('selling-now/'); ?>">Selling Now</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?= baseURL('login/'); ?>">Login</a>
            </li>

            <div class="search-right">
              <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
              <!-- search popup -->
              <div id="search" class="pop-overlay">
                <div class="popup">

                  <form action="<?= baseURL('search/'); ?>" method="POST" class="search-box">
                    <input type="search" placeholder="Property Search Keyword" name="search" required="required" autofocus="">
                    <button type="submit" class="btn" name="formSearch">Search Now</button>
                  </form>

                </div>
                <a class="close" href="#close">??</a>
              </div>
              <!-- /search popup -->
            </div>
          </ul>
        </div>
        <!-- toggle switch for light and dark theme -->
        <div class="mobile-position">
          <nav class="navigation">
            <div class="theme-switch-wrapper">
              <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox">
                <div class="mode-container">
                  <i class="gg-sun"></i>
                  <i class="gg-moon"></i>
                </div>
              </label>
            </div>
          </nav>
        </div>
        <!-- //toggle switch for light and dark theme -->
      </nav>
    </div>
  </header>
  <!-- //header -->