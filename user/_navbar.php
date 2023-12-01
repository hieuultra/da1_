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
    <div class="col-lg-4 d-none d-lg-block">
      <a href="?act=home" class="text-decoration-none">
        <h1 class="m-0 display-5 font-weight-semi-bold">
          <span class="text-primary font-weight-bold border px-3 mr-1">U</span>Multishop
        </h1>
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

  </div>
</div>