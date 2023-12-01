<div class="container-fluid shadow-sm sticky-top bg-light mb-2">
  <div class="row bg-secondary py-2 px-xl-5">
    <div class="col-lg-6 d-none d-lg-block">
      <div class="d-inline-flex align-items-center">
        <a class="text-dark" href="">FAQs</a>
        <span class="text-muted px-2">|</span>
        <a class="text-dark" href="">Help</a>
        <span class="text-muted px-2">|</span>
        <a class="text-dark" href="">Support</a>
      </div>
    </div>
    <div class="col-lg-6 text-center text-lg-right">
      <div class="d-inline-flex align-items-center">
        <a class="text-dark px-2" href="">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a class="text-dark px-2" href="">
          <i class="fab fa-twitter"></i>
        </a>
        <a class="text-dark px-2" href="">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a class="text-dark px-2" href="">
          <i class="fab fa-instagram"></i>
        </a>
        <a class="text-dark pl-2" href="">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="row align-items-center py-3 px-xl-5">
    <!-- Logo -->
    <div class="col-lg-4">
      <a href="?act=home" class="text-decoration-none">
        <span class="h1 text-uppercase text-primary bg-dark px-2">UMulti</span>
        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
      </a>
    </div>

    <!-- Nav -->
    <div class="col-lg-4 col-6 d-flex justify-content-center">
      <nav class="navbar navbar-expand-lg navbar-light py-3 0">
        <div class="navbar-nav text-center">
          <a href="?act=shop" class="nav-item nav-link">Shop</a>

          <div class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
            <div class="dropdown-menu rounded-0 m-0">
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
          </div>

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
        </div>
      </nav>
    </div>

    <!-- Cart -->
    <div class="col-lg-4 col-6 text-right">
      <a href="?act=view_wishlist" class="btn border">
        <i class="fas fa-heart text-primary"></i>
        <span class="badge">0</span>
      </a>
      <a href="?act=view_cart" class="btn border">
        <i class="fas fa-shopping-cart text-primary"></i>
        <span class="badge">0</span>
      </a>
      <?php
      if (isset($_SESSION['user'])) {
      ?>
        <a href="?act=account" class="btn border">
          <i class="far fa-user text-primary"></i>
        </a>
      <?php
      } else {
      ?>
        <a href="?act=login" class="btn border">
          <i class="far fa-user text-primary"></i>
        </a>
      <?php } ?>
      <a href="?act=mybill" class="btn border">
        <i class="fas fa-file-invoice-dollar"></i>
      </a>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-6 text-left">
          <form action="index.php?act=search_pro" method="post">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for products" name="kyw">
              <div class="input-group-append">
                <span class="input-group-text bg-transparent text-primary">
                  <i class="fa fa-search"></i>
                </span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

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
              <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
              <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
              <div class="navbar-nav mr-auto py-0">
                <a href="index.html" class="nav-item nav-link active">Home</a>
              </div>
              <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                <a href="" class="btn px-0">
                  <i class="fas fa-heart text-primary"></i>
                  <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
                <a href="" class="btn px-0 ml-3">
                  <i class="fas fa-shopping-cart text-primary"></i>
                  <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>

  </div>
</div>