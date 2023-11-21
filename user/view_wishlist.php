 <?php
// if (isset($_SESSION['mycart'])) {
//   extract($_SESSION['mycart']);
// }
global  $img_path;
$i = 0;
foreach ($_SESSION['wishlist'] as $wl) {
  $hinh = $img_path . $wl[2];
  // $gia = $cart[3];
  $price =  $wl[3] - (($wl[3] *  $wl[4]) / 100);
}
?> 
<div class="container-fluid pt-5">
  <div class="row px-xl-5">
  <div class="col-lg-12 table-responsive mb-5">
    <table class="table table-bordered text-center mb-0">
        <?php
        view_wishlist(1);
        ?>
    </table>
</div>
