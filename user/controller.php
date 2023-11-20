  <?php
  // Navbar
  ob_start();
  session_start();

  include "./model/pdo.php";
  include "./model/cat.php";
  $dsdm = loadall_cat();
  include "./model/brand.php";
  $dsbr = loadall_brand();
  include "_navbar.php";
  include "./global.php";
  include  "./model/product.php";
  include "./model/size.php";
  include "./model/slider.php";
  include  "./model/user.php";
  include "./model/cart.php";
  include "./model/comment.php";
  include "./model/wishlist.php";


  if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
  }
  if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
  }


  $spnew = loadall_pro_home();

  $dst8 = loadall_pro_top8();
  $dssl = loadall_slider();
  // Controller
  if (isset($_GET['act']) && ($_GET['act']) != "") {
    $act = $_GET['act'];
    switch ($act) {
      case 'home':
        include_once("user/home/index.php");
        break;
      case 'search_pro':
        if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
          $kyw = $_POST['kyw'];
        } else {
          $kyw = "";
        }
        $sp = loadall_proo($kyw);
        // $name_cat = load_ten_dm($id_cat);
        include "search_pro.php";
        break;
      case 'pro_detail':
        if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
          $onesp = loadone_pro($_GET['id_pro']);
          // $dss = loadall_size();
          extract($onesp);
          $spcl = loadone_sp_cungloai($_GET['id_pro'], $id_cat);
          tangluotxem($_GET['id_pro']);
          include "detail.php";
        } else {
          include "user/home/index.php";
        }
        break;
      case 'product_cat':
        if (isset($_GET['id_cat']) && ($_GET['id_cat']) > 0) {
          $id_cat = $_GET['id_cat'];
        } else {
          $id_cat = 0;
        }
        $dssp = loadall_pro_cat($id_cat);
        $name_cat = load_ten_dm($id_cat);
        include "product_cat.php";
        break;
        //shop
      case 'shop':
        $sps = loadall_pro_shop1();
        include_once("shop.php");
        break;
      case 'shop1':
        $sps = loadall_pro_shop2();
        include_once("shop.php");
        break;
      case 'shop2':
        $sps = loadall_pro_shop3();
        include_once("shop.php");
        break;

      case 'sign_up':
        if (isset($_POST['sign_up']) && ($_POST['sign_up'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $name = $_POST['name'];
          $address = $_POST['address'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];
          $file = $_FILES['image']['name'];
          $target_dir = "./upload/";
          $target_file = $target_dir . basename($_FILES['image']["name"]);
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
            // echo "Sorry, there was an error uploading your file.";
          }
          //  $hinh=$_POST['hinh'];
          insert_tk($username, $password, $name, $address, $phone, $email, $file);
          $tbao = "Creat account sucsess!Please login to do comment or order products!";
        }
        include_once("pages-sign-up.php");
        break;
      case 'login':
        if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $check_user = check_user($username, $password);
          if (is_array($check_user)) {
            $_SESSION['user'] = $check_user;
            // header('Location:login_sucsess.php');
            include "login_sucsess.php";
            // $tbao = "Ban da dang nhap thanh cong!";
          } else {
            $tbao = "Account no have, Please check or sign_up!";
          }
        }
        include "login.php";
        break;
      case 'account':
        include 'account.php';
        break;
      case 'edit_account':
        if (isset($_POST['capnhap']) && ($_POST['capnhap'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $name = $_POST['name'];
          $address = $_POST['address'];
          $phone = $_POST['phone'];
          $email = $_POST['email'];
          $file = $_FILES['img']['name'];
          $id_user = $_POST['id_user'];
          $target_dir = "./upload/";
          $target_file = $target_dir . basename($_FILES['img']["name"]);
          if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
            // echo "Sorry, there was an error uploading your file.";
          }
          update_taikhoan($id_user, $username, $password, $name, $address, $phone, $email, $file);
          $_SESSION['user'] = check_user($username, $password); // sau khi edit xong thi edit lai $_SESSION['user'] moi
          // header("location:index.php?act=edit_taikhoan");

          $tb = "Edit account sucsess!";
        }
        include "edit_account.php";
        break;
      case 'forgot_password':
        if (isset($_POST['send_email']) && ($_POST['send_email'])) {
          $email = $_POST['email'];
          $check_email =  check_email($email);
          if (is_array($check_email)) {
            $tbao = "Your password is:" . $check_email['password'];
          } else {
            $tbao = "Email no have!";
          }
        }
        include 'forgot-password.php';
        break;
      case 'log_out':
        session_unset();
        header('Location:?act=login');
        break;

        //muahang
      case 'contact':
        include_once("contact.php");
        break;
      case 'addtocart':
        //add thong tin sp tu cai form add to cart den session
        if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
          // Kiểm tra tài khoản đang đăng nhập
          if (isset($_SESSION['user']['id_role']) && $_SESSION['user']['id_role'] == 2) {
            header('Location: index.php'); // Chuyển hướng về trang index.php
            exit(); // Dừng việc thực thi các lệnh tiếp theo
          }
          $id_pro = $_POST['id_pro'];
          $name_pro = $_POST['name_pro'];
          $image_pro = $_POST['img'];
          $price_pro = $_POST['price'];
          $discount = $_POST['discount'];
          if (isset($_POST['quantity']) && ($_POST['quantity']) > 0) {
            $quantity = $_POST['quantity'];
          } else {
            $quantity = 1;
          }
          $total = $quantity * $price_pro;
          //check trung sp
          if (checktrungsp($id_pro) >= 0) {
            // $tbao="trung sp roi";
            update_quantity(checktrungsp($id_pro));
          } else {
            $spadd = [$id_pro, $name_pro, $image_pro, $price_pro, $discount, $quantity, $total];
            array_push($_SESSION['mycart'], $spadd); //add mang con($spadd) vao mang cha $_session...
          }
        }
        include "view_cart.php";
        break;
      case "view_cart":
        include 'view_cart.php';
        break;
      case 'delcart':
        if (isset($_GET['id_cart'])) {
          array_splice($_SESSION['mycart'], $_GET['id_cart'], 1);
        } else {
          $_SESSION['mycart'] = [];
        }
        header('Location:index.php?act=view_cart');
        // include "view/cart/viewcart.php";
        break;
      case 'checkout':
        include "checkout.php";
        break;
      case 'billconfirm':
        if (isset($_POST['dydh']) && ($_POST['dydh'])) {
          if (isset($_SESSION['user'])) {
            $id_user = $_SESSION['user']['id_user'];
          } else {
            $id_user = 0;
          }
          $name_user = $_POST['username'];
          $name = $_POST['name'];
          $email_user = $_POST['email'];
          $phone_user = $_POST['phone'];
          $address_user = $_POST['address'];
          $payment_method = $_POST['payment'];
          date_default_timezone_set("Asia/Ho_Chi_Minh");
          $date_order = date("Y-m-d H:i:s", time());
          $total_price = tongdh();
          //tao bill
          $id_bill = insert_bill($name_user, $address_user, $phone_user, $email_user, $total_price, $payment_method, $date_order, $id_user);

          //insert into cart: voi $session['mycart'] $id_bill
          //neu ko login thi dung isset hay empty
          foreach ($_SESSION['mycart'] as $cart) {
            insert_cart($cart[2], $cart[1], $cart[3], $cart[6], $cart[5], $cart[0], $id_bill, $_SESSION['user']['id_user']);
          }
          //xoa session
          $_SESSION['cart'] = [];
        }
        $bill = loadone_bill($id_bill);
        $billct = loadall_cart($id_bill);
        include "billconfirm.php";
        break;
      case 'mybill':
        // if (isset($_SESSION['user'])) {
        //   if (isset($_GET['id_user']) && ($_GET['id_user']) > 0) {
        //     $listbill = loadall_bi($_GET['id_user']);
        //   } else {
        $listbill = loadall_bil($_SESSION['user']['id_user']);
        // }
        include "mybill.php";
        // } else {
        //   // Redirect or handle the case where 'user' is not set in the session.
        // }
        break;
      case 'bill_detail':
        if (isset($_GET['id_bill']) && ($_GET['id_bill']) > 0) {
          $spbill = loadall_sp_cart($_GET['id_bill']);
        }
        include "bill_detail.php";
      case 'addfb':
        if (isset($_POST['send']) && ($_POST['send'])) {
          $name_user = $_POST['name'];
          $email_user = $_POST['email'];
          $phone_user = $_POST['phone'];
          $subject_name = $_POST['subject'];
          $content = $_POST['message'];
          date_default_timezone_set("Asia/Ho_Chi_Minh");
          $created_at = date("Y-m-d H:i:s", time());
          if ($name_user != '') {
            insert_fb($name_user, $email_user, $phone_user, $subject_name, $content, $created_at);
            $tbao = "We will answerd you early.Thanks you for this about!!";
          }
        }
        include_once("contact.php");
        break;
      case 'delete_bill':
        if (isset($_GET['id_bill'])) {
          delete_bil($_GET['id_bill']);
        }
        header('Location:index.php?act=mybill');
        // include "view/cart/viewcart.php";
        break;
      default:
        include_once("user/home/index.php");
        break;
        // blog
      case 'blog':
        $dsblog = loadall_blog();
        include_once("blog.php");
        break;
      case 'blog_detail':
        $dsblog = loadall_blog();
        include_once("blog_detail.php");
        break;
        //brand
      case 'product_brand':
        if (isset($_GET['id_brand']) && ($_GET['id_brand']) > 0) {
          $id_brand = $_GET['id_brand'];
        } else {
          $id_brand = 0;
        }
        $dssp = loadall_pro_brand($id_brand);
        $name_brand = load_ten_br($id_brand);
        include "product_brand.php";
        break;
        // wishlist
        case 'wishlist':
          //add thong tin sp tu cai form add to cart den session
          if (isset($_POST['wishlist']) && ($_POST['wishlist'])) {
            // Kiểm tra tài khoản đang đăng nhập
            if (isset($_SESSION['user']['id_role']) && $_SESSION['user']['id_role'] == 2) {
              header('Location: index.php'); // Chuyển hướng về trang index.php
              exit(); // Dừng việc thực thi các lệnh tiếp theo
            }
            $id_pro = $_POST['id_pro'];
            $name_pro = $_POST['name_pro'];
            $image_pro = $_POST['img'];
            $price_pro = $_POST['price'];
            $discount = $_POST['discount'];
            //check trung sp
            if (checktrungsp($id_pro) >= 0) {
              // $tbao="trung sp roi";
            } else {
              $spwl = [$id_pro, $name_pro, $image_pro, $price_pro, $discount];
              array_push($_SESSION['wishlist'], $spwl); //add mang con($spadd) vao mang cha $_session...       
            }
          }
          include "view_wishlist.php";
          break;
        case "view_wishlist":
          include 'view_wishlist.php';
          break;
        case 'delwl':
          if (isset($_GET['id'])) {
            array_splice($_SESSION['mywishlist'], $_GET['id'], 1);
          } else {
            $_SESSION['mywishlist'] = [];
          }
          header('Location:index.php?act=view_wishlist');
          // include "view/cart/viewcart.php";
          break;
    }
  } else {
    include_once("user/home/index.php");
  }
  // Footer
  include_once("_footer.php");
  ?>

