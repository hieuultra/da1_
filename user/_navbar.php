<div class="container-fluid">
  <div class="row bg-secondary py-1 px-xl-5">
    <marquee behavior="scroll" direction="left" scrollamount="5">
      <span style="font-size: 18px; color: red;">Free exchange for 30 days.</span>
    </marquee>
    <div class="col-lg-6 d-none d-lg-block">
      <div class="d-inline-flex align-items-center h-100">
        <a class="text-body mr-3" href="">About</a>
        <a class="text-body mr-3" href="">Contact</a>
        <a class="text-body mr-3" href="">Help</a>
        <a class="text-body mr-3" href="">FAQs</a>
      </div>
    </div>
    <div class="col-lg-6 text-center text-lg-right">
      <div class="d-inline-flex align-items-center">
        <div class="btn-group">
          <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="?act=login"><button type="submit" class="dropdown-item" type="button">Sign in</button></a>
            <a href="?act=sign_up"> <button type="submit" class="dropdown-item" type="button">Sign up</button></a>
          </div>
        </div>
        <div class="btn-group mx-2">
          <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">USD</button>
          <div class="dropdown-menu dropdown-menu-right">
            <button class="dropdown-item" type="button">EUR</button>
            <button class="dropdown-item" type="button">GBP</button>
            <button class="dropdown-item" type="button">CAD</button>
          </div>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
          <div class="dropdown-menu dropdown-menu-right">
            <button class="dropdown-item" type="button">FR</button>
            <button class="dropdown-item" type="button">AR</button>
            <button class="dropdown-item" type="button">RU</button>
          </div>
        </div>
      </div>
      <div class="d-inline-flex align-items-center d-block d-lg-none">
        <a href="" class="btn px-0 ml-2">
          <i class="fas fa-heart text-dark"></i>
          <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
        </a>
        <a href="" class="btn px-0 ml-2">
          <i class="fas fa-shopping-cart text-dark"></i>
          <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
        </a>
      </div>
    </div>
  </div>
  <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
    <div class="col-lg-4">
      <a href="?act=home" class="text-decoration-none">
        <span class="h1 text-uppercase text-primary bg-dark px-2">Ultra</span>
        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
      </a>
    </div>
    <div class="col-lg-4 col-6 text-left">
      <form action="index.php?act=search_pro" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for products [Enter]" name="kyw">
          <div class="input-group-append">
            <span class="input-group-text bg-transparent text-primary">
              <i class="fa fa-search"></i>
            </span>
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-4 col-6 text-right">
      <p class="m-0">Customer Service</p>
      <h5 class="m-0">+012 345 6789</h5>
    </div>
  </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid bg-dark mb-30">
  <div class="row px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
      <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
        <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
        <i class="fa fa-angle-down text-dark"></i>
      </a>
      <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
        <div class="navbar-nav w-100">
          <?php
          foreach ($dsdm as $dm) {
            extract($dm);
            $linkdm = "index.php?act=product_cat&id_cat=" . $id_cat;
            echo '
  <a href="' . $linkdm . '" class="dropdown-item">' . $name_cat . '</a>
  ';
          }
          ?>
        </div>
      </nav>
    </div>
    <div class="col-lg-9">
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
          <span class="h1 text-uppercase text-dark bg-light px-2">Ultra</span>
          <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
          <div class="navbar-nav mr-auto py-0">
            <a href="?act=home" class="nav-item nav-link active">Home</a>
            <a href="?act=shop" class="nav-item nav-link">Shop</a>

            <div class="nav-item dropdown">
              <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Brands</a>
              <div class="dropdown-menu rounded-0 m-0">
                <?php
                foreach ($dsbr as $br) {
                  extract($br);
                  $linkdm = "index.php?act=product_brand&id_brand=" . $id_brand;
                  echo '
                <a href="' . $linkdm . '" class="dropdown-item">' . $name_brand . '</a>
                ';
                }
                ?>
              </div>
            </div>
            <a href="?act=contact" class="nav-item nav-link">Contact</a>
            <a href="?act=blog" class="nav-item nav-link">Blog</a>
            <a href="?act=sell" class="nav-item nav-link">Selling Products</a>
          </div>
          <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
            <a href="?act=view_wishlist" class="btn px-0">
              <i class="fas fa-heart text-primary"></i>
              <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?= $count_wl ?></span>
            </a>
            <a href="?act=view_cart" class="btn px-0 ml-3">
              <i class="fas fa-shopping-cart text-primary"></i>
              <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?= $count_cart ?></span>
            </a>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
              <a href="?act=account" class="btn px-0">
                <i class="far fa-user text-primary"></i>
                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"></span>
              </a>
            <?php
            } else {
            ?>
              <a href="?act=login" class="btn px-0">
                <i class="far fa-user text-primary"></i>
                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"></span>
              </a>
            <?php } ?>
            <a href="?act=mybill" class="btn px-0">
              <i class="fas fa-file-invoice-dollar text-primary"></i>
              <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?= $count_b ?></span>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>
<!-- Navbar End -->
<br>
<br>