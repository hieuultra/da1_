<?php
// if (isset($_SESSION['mycart'])) {
//   extract($_SESSION['mycart']);
// }
global  $img_path;
$tong = 0;
$i = 0;
$ship = 100;
$tongship = 0;
// var_dump($_SESSION['mycart']);
foreach ($_SESSION['mycart'] as $cart) {
  $hinh = $img_path . $cart['image'];
  // $gia = $cart[3];
  $price =  $cart['price'] - (($cart['price'] *  $cart['discount']) / 100);
  $total = $price * $cart['quantity'];
  $tong += $total;
  $ship;
  $tongship = $tong + $ship;
}
?>
<div class="container-fluid pt-5">
  <div class="row px-xl-5">
    <div class="col-lg-8 table-responsive mb-5">
      <table class="table table-bordered text-center mb-0">
        <?php
        view_cart(1);
        ?>
      </table>
    </div>
    <div class="col-lg-4">
      <form class="mb-5" action="">
        <div class="input-group">
          <input type="text" class="form-control p-4" placeholder="Coupon Code" />
          <div class="input-group-append">
            <button class="btn btn-primary">Apply Coupon</button>
          </div>
        </div>
      </form>
      <div class="card border-secondary mb-5">
        <div class="card-header bg-secondary border-0">
          <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between mb-3 pt-1">
            <h6 class="font-weight-medium">Total cart</h6>
            <h6 class="font-weight-medium"><?= number_format($tong, 0, ",", ".") . "$"  ?></h6>
          </div>
          <div class="d-flex justify-content-between">
            <h6 class="font-weight-medium">Shipping</h6>
            <h6 class="font-weight-medium"><?= number_format($ship, 0, ",", ".") . "$"  ?></h6>
          </div>
        </div>
        <div class="card-footer border-secondary bg-transparent">
          <div class="d-flex justify-content-between mt-2">
            <h5 class="font-weight-bold">Total</h5>
            <h5 class="font-weight-bold"><?= number_format($tongship, 0, ",", ".") . "$"  ?></h5>
          </div>
          <?php
          if (isset($_SESSION['user'])) {
          ?>
            <a href="?act=checkout" class="btn btn-block btn-primary my-3 py-3">
              Proceed To Checkout
            </a>
          <?php
          } else {
          ?>
            <a href="?act=login" class="btn btn-block btn-primary my-3 py-3">
              Proceed To Checkout
            </a>
          <?php } ?>

        </div>
      </div>
    </div>
  </div>
</div>