<?php
global  $img_path;
$tong = 0;
$i = 0;
$ship = 100;
$tongship = 0;
foreach ($_SESSION['mycart'] as $cart) {
  $name_pro = $cart['name'];
  $hinh = $img_path . $cart['image'];
  // $gia = $cart[3];
  $price =  $cart['price'] - (($cart['price'] *  $cart['discount']) / 100);
  $total = $price * $cart['quantity'];
  $tong += $total;
  $ship;
  $tongship = $tong + $ship;
}
?>
<!-- Checkout Start -->
<div class="container-fluid pt-5">
  <div class="row px-xl-5">
    <div class="col-lg-8">
      <form action="index.php?act=billconfirm" method="post">
        <div class="mb-4">
          <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
          <div class="row">
            <?php
            if (isset($_SESSION['user'])) {
              $id_user = $_SESSION['user']['id_user'];
              $username = $_SESSION['user']['username'];
              $name = $_SESSION['user']['name'];
              $address = $_SESSION['user']['address'];
              $phone = $_SESSION['user']['phone'];
              $email = $_SESSION['user']['email'];
            } else {
              $username = "";
              $name = "";
              $address = '';
              $phone = "";
              $email = "";
            }
            ?>
            <div class="col-md-6 form-group">
              <!-- <input type="hidden" name="id_user" value="<?= $id_user ?>"> -->
              <label>User Name</label>
              <input class="form-control" type="text" name="username" value="<?= $username ?>" />
            </div>
            <div class="col-md-6 form-group">
              <label>Name</label>
              <input class="form-control" type="text" name="name" value="<?= $name ?>" />
            </div>
            <div class="col-md-6 form-group">
              <label>E-mail</label>
              <input class="form-control" type="text" name="email" value="<?= $email ?>" />
            </div>
            <div class="col-md-6 form-group">
              <label>Phone</label>
              <input class="form-control" type="text" name="phone" value="<?= $phone ?>" />
            </div>
            <div class="col-md-6 form-group">
              <label>Address</label>
              <input class="form-control" type="text" name="address" value="<?= $address ?>" />
            </div>
          </div>
        </div>
        <div class="card border-secondary mb-5">
          <div class="card-header bg-secondary border-0">
            <h4 class="font-weight-semi-bold m-0">Payment</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="1" checked />
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
            </div>
            <div class="form-group">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="2" />
                <label class="custom-control-label" for="directcheck">Direct Check</label>
              </div>
            </div>
            <div class="">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="payment" id="banktransfer" value="3" />
                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
              </div>
            </div>
          </div>
          <div class="card-footer border-secondary bg-transparent">
            <input type="submit" value="Place Order" name="dydh" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-4">
      <div class="card border-secondary mb-5">
        <div class="card-header bg-secondary border-0">
          <h4 class="font-weight-semi-bold m-0">Order Total</h4>
        </div>
        <div class="card-body">
          <h5 class="font-weight-medium mb-3">Products</h5>
          <?php
          $tong = 0;
          $ship = 100;
          $tongship = 0;
          foreach ($_SESSION['mycart'] as $cart) {
            $name_pro = $cart['name'];
            $hinh = $img_path . $cart['image'];
            // $gia = $cart[3];
            $price =  $cart['price'] - (($cart['price'] *  $cart['discount']) / 100);
            $total = $price * $cart['quantity'];
            $tong += $total;
            $ship;
            $tongship = $tong + $ship;
            echo '<div class="d-flex justify-content-between">
               <p>' . $name_pro . '</p>
              <p>' .  number_format($price, 0, ",", ".") . '$ </p>
              </div>';
          }
          echo '
          <hr class="mt-0" />
          <div class="d-flex justify-content-between mb-3 pt-1">
            <h6 class="font-weight-medium">Subtotal</h6>
            <h6 class="font-weight-medium">' . number_format($tong, 0, ",", ".") . "$" . '</h6>
          </div>
          <div class="d-flex justify-content-between">
            <h6 class="font-weight-medium">Shipping</h6>
            <h6 class="font-weight-medium">' . number_format($ship, 0, ",", ".") . "$" . '</h6>
          </div>
        </div>
        <div class="card-footer border-secondary bg-transparent">
          <div class="d-flex justify-content-between mt-2">
            <h5 class="font-weight-bold">Total</h5>
            <h5 class="font-weight-bold">' . number_format($tongship, 0, ",", ".") . "$" . '</h5>
          </div>
        </div>';
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Checkout End -->