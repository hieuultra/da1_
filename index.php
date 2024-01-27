<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Ultrashop - Shop for you</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="Free HTML Templates" name="keywords" />
  <meta content="Free HTML Templates" name="description" />
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Favicon -->
  <link href="./user/img/favicon.ico" rel="icon" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="./user/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="./user/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="./user/css/popup.css">
</head>

<body>
  <!-- Controller -->
  <?php include_once("./user/controller.php") ?>
  <!-- Back to Top -->
  <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="./user/lib/easing/easing.min.js"></script>
  <script src="./user/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Javascript File -->
  <script src="./user/mail/jqBootstrapValidation.min.js"></script>
  <script src="./user/mail/contact.js"></script>

  <!-- Template Javascript -->
  <script src="./user/js/main.js"></script>
  <!-- Popup -->
  <div class="popup" id="discountPopup">
    <div class="popup-content">
      <span class="close" onclick="closePopup()">&times;</span>
      <h2 class="discount-title">Ưu đãi giảm giá!</h2>
      <p class="discount-offer">Nhập mã giảm giá "SALE20" để được giảm giá 20% cho đơn hàng của bạn.</p>
      <img src="./user/img/thiet-ke-phieu-qua-tang-gia-re-2.jpg" alt="">
    </div>
  </div>
<!-- 
  <script src="./user/js/popup.js"></script> -->
</body>

</html>