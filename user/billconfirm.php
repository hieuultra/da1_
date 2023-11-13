<?php
global  $img_path;
$tong = 0;
$i = 0;
$ship = 100;
$tongship = 0;
foreach ($_SESSION['mycart'] as $cart) {
    $name_pro = $cart[1];
    $hinh = $img_path . $cart[2];
    // $gia = $cart[3];
    $price =  $cart[3] - (($cart[3] *  $cart[4]) / 100);
    $total = $price * $cart[5];
    $tong += $total;
    $ship;
    $tongship = $tong + $ship;
}
?>
<style>
    #ma {
        margin-top: 70px;
    }

    #view {
        margin-left: 200px;
    }
</style>
<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5">
            <span class="px-2">Thanks you for order products</span>
        </h2>
    </div>
    <?php
    if (isset($bill) && (is_array($bill))) {
        extract($bill);
    }
    ?>
    <div class="container px-xl-5">
        <div class="row">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <h2 class="section-title">
                        <span class="px-2">Infor bill</span>
                    </h2>
                    <div class="card mt-3">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>ID_Bill:</strong> <?= $bill['id_bill'] ?></li>
                                <li class="list-group-item"><strong>Date_order:</strong> <?= $bill['date_order'] ?></li>
                                <li class="list-group-item"><strong>Total_price:</strong> <?= number_format($tongship, 0, ",", ".") . "$" ?></li>
                                <li class="list-group-item"><strong>Payment_method:</strong> <?= $bill['payment_method'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_SESSION['user'])) {
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

            <div class="col-lg-5 mb-5" id="ma">
                <h5 class="font-weight-semi-bold mb-3">Name</h5>
                <p><?= $name ?></p>

                <div class="d-flex flex-column mb-3">
                    <h5 class="font-weight-semi-bold mb-3">Infor user</h5>
                    <p class="mb-2">
                        <i class="fa fa-map-marker-alt text-primary mr-3"></i><?= $address ?>
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-envelope text-primary mr-3"></i><?= $email ?>
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-phone-alt text-primary mr-3"></i><?= $phone ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 table-responsive mb-5" id="view">
        <table class="table table-bordered text-center mb-0">
            <?php
            view_cart(0);
            ?>
        </table>
    </div>

</div>
<!-- Contact End -->