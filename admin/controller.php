<?php
ob_start();
session_start();
if (!isset($_SESSION['user'])) {
  header("location: ./index.php");
} else {
  if ($_SESSION['user']['id_role'] == 1) {
    header("location: ../index.php");
  }
}
include "../model/pdo.php";
include "../model/cat.php";
include "../model/product.php";
include "../model/slider.php";
include "../model/user.php";
include "../model/role.php";
include "../model/comment.php";
include "../model/cart.php";
include "../model/brand.php";
include "../model/dboard.php";

$countsp = count_sp();
$sum = sum_total_pr();
$sum_user = sum_user_b();
$sum_quantity= quantity_pro();

if (isset($_GET['act'])) {
  $act = $_GET['act'];
  switch ($act) {
    case 'dashboard':
      include("dashboard.php");
      break;
      // Category
    case 'listCategory':
      $dslh = loadall_cat();
      include "category/list-category.php";
      break;
    case 'add_cat':
      if (isset($_POST['them']) && ($_POST['them'])) {
        $name = $_POST['name_cat'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        if ($name != "") {
          insert_cat($name, $file);
          header("location:index.php?act=listCategory");
          $tbao = 'Them data thanh cong';
        }
      }
      include("category/add-category.php");
      break;
    case 'delete_cat':
      if (isset($_GET['id_cat']) && ($_GET['id_cat']) > 0) {
        delete_cat($_GET['id_cat']);
      }
      $dslh = loadall_cat();

      include "category/list-category.php";
      break;
    case 'edit_cat':
      if (isset($_GET['id_cat']) && ($_GET['id_cat']) > 0) {

        $suadm = loadone_cat($_GET['id_cat']);
      }

      include "category/update-category.php";
      break;
    case 'update_cat':
      if (isset($_POST['edit']) && ($_POST['edit'])) {
        $name_cat = $_POST['name_cat'];
        $id_cat = $_POST['id_cat'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        update_cat($name_cat, $file, $id_cat);
        $tbao = 'Sua data thanh cong';
      }
      $dslh = loadall_cat();
      include "category/list-category.php";
      break;

      //Product
    case 'list_pro':
      if (isset($_POST['listok']) && ($_POST['listok'])) {
        $id_cat = $_POST['id_cat'];
      } else {
        $id_cat = 0;
      }
      $dsbr = loadall_brand();
      $dslh = loadall_cat();
      $dssp = loadall_pro($id_cat);
      include("product/list-product.php");
      break;
    case 'add_pro':
      if (isset($_POST['them']) && ($_POST['them'])) {
        $id_cat = $_POST['id_cat'];
        $id_brand = $_POST['id_brand'];
        $name_pro = $_POST['name_pro'];
        $price = $_POST['price'];
        $dis = $_POST['discount'];
        $des = $_POST['des'];
        // $size = $_POST['size'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        $thum = $_FILES['thum']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['thum']["name"]);
        if (move_uploaded_file($_FILES["thum"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        if ($name_pro != "") {
          insert_pro($name_pro, $file, $thum, $des, $dis, $price, $id_cat, $id_brand);
          $tbao = 'Them data thanh cong';
          header("location:index.php?act=list_pro");
        }
      }
      $dsbr = loadall_brand();
      $dslh = loadall_cat();
      include("product/add-product.php");
      break;
    case 'delete_pro':
      if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
        delete_pro($_GET['id_pro']);
      }
      $dssp = loadall_pro();

      include "product/list-product.php";
      break;
    case 'edit_pro':
      if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
        $suasp = loadone_pro($_GET['id_pro']);
      }
      $dsbr = loadall_brand();
      $dslh = loadall_cat();
      include("product/update-product.php");
      break;
    case 'update_pro':
      if (isset($_POST['edit']) && ($_POST['edit'])) {
        $name_pro = $_POST['name_pro'];
        $id_pro = $_POST['id_pro'];
        $id_brand = $_POST['id_brand'];
        $description = $_POST['description'];
        $discount = $_POST['discount'];
        $price = $_POST['price'];
        // $size = $_POST['size'];
        $id_cat = $_POST['id_cat'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        update_pro($id_pro, $name_pro, $file, $description, $discount, $price, $id_cat, $id_brand);
        $tbao = 'Sua data thanh cong';
      }
      $dsbr = loadall_brand();
      $dslh = loadall_cat();
      $dssp = loadall_pro();
      include "product/list-product.php";
      break;

      // slider
    case 'list_slider':
      $dssl = loadall_slider();
      include "slider/list-slider.php";
      break;
    case 'add_slider':
      if (isset($_POST['them']) && ($_POST['them'])) {
        $name_slider = $_POST['name_slider'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        if ($name_slider != "") {
          insert_slider($file, $name_slider);
          $tbao = 'Them data thanh cong';
          header("location:index.php?act=list_slider");
        }
      }
      include("slider/add-slider.php");
      break;
    case 'delete_slider':
      if (isset($_GET['id_slider']) && ($_GET['id_slider']) > 0) {
        delete_slider($_GET['id_slider']);
      }
      $dssl = loadall_slider();

      include "slider/list-slider.php";
      break;

    case 'edit_slider':
      if (isset($_GET['id_slider']) && ($_GET['id_slider']) > 0) {
        $suasl = loadone_slider($_GET['id_slider']);
      }
      include "slider/update-slider.php";
      break;
    case 'update_slider':
      if (isset($_POST['edit']) && ($_POST['edit'])) {
        $name_slider = $_POST['name_slider'];
        $id_slider = $_POST['id_slider'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        update_slider($name_slider, $file, $id_slider);
        $tbao = 'Sua data thanh cong';
      }
      $dssl = loadall_slider();
      include "slider/list-slider.php";
      break;
      //account
    case 'list_account':
      $dstk = loadall_account();
      include "account/list_account.php";
      break;
    case 'add_acc':
      if (isset($_POST['them']) && ($_POST['them'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $file = $_FILES['img']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['img']["name"]);
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        if ($username != "") {
          insert_taikhoan($username, $password, $name, $address, $phone, $email, $file);
          $tbao = 'Them data thanh cong';
          header("location:index.php?act=list_account");
        }
      }
      $dstk = loadall_account();
      include("account/add_acc.php");
      break;
    case 'edit_acc':
      if (isset($_GET['id_user']) && ($_GET['id_user']) > 0) {
        $suaacc = loadone_acc($_GET['id_user']);
      }
      $dsrl = loadall_rl();
      include("account/update_acc.php");
      break;
    case 'update_acc':
      if (isset($_POST['edit']) && ($_POST['edit'])) {
        $username = $_POST['username'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $id_role = $_POST['id_role'];
        $id_user = $_POST['id_user'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        update_tk($id_user, $username, $name, $address, $phone, $email, $file, $id_role);
        $tbao = 'Sua data thanh cong';
      }
      // $dsrl = loadall_rl();
      $dstk = loadall_account();
      include "account/list_account.php";
      break;
    case 'delete_acc':
      if (isset($_GET['id_user']) && ($_GET['id_user']) > 0) {
        delete_acc($_GET['id_user']);
      }
      $dstk = loadall_account();
      include "account/list_account.php";
      break;

      //comment
    case 'list_com':
      $dsbl = loadall_bl();
      include "comment/list_com.php";
      break;
    case 'com_detail':
      if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
        $onebl = loadone_spbl($_GET['id_pro']);
        $ctbl = loadall_bluan($_GET['id_pro']);
      }
      include "comment/com_detail.php";
      break;
    case 'delete_com':
      if (isset($_GET['id_com']) && ($_GET['id_com']) > 0) {
        delete_com($_GET['id_com']);
      }
      // header("location:index.php?act=ctbl");
      // $dsbl = loadall_bluan(0);
      if (isset($_GET['id_pro']) && ($_GET['id_pro']) > 0) {
        $onebl = loadone_spbl($_GET['id_pro']);
        $ctbl = loadall_bluan($_GET['id_pro']);
      }
      include "comment/com_detail.php";
      break;
    case 'list_fb':
      $dsfb = loadall_fb();
      include "feedback/list-fb.php";
      break;
    case 'edit_fb':
      if (isset($_GET['id']) && ($_GET['id']) > 0) {
        $suafb = loadone_fbb($_GET['id']);
        // $suab = loadone_b_c($_GET['id_bill']);
      }
      $dsstfb = loadall_status_fb();
      include("feedback/update_fb.php");
      break;
    case 'update_fb':
      if (isset($_POST['editfb']) && ($_POST['editfb'])) {
        // $name_user = $_POST['name_user'];
        $id = $_POST['id'];
        // $phone_user = $_POST['phone_user'];
        // $address_user = $_POST['address_user'];
        // $quantity = $_POST['quantity'];
        $id_status_fb = $_POST['id_status_fb'];
        update_fb($id, $id_status_fb);
        $tbao = 'Sua data thanh cong';
      }
      $dsstfb = loadall_status_fb();
      $dsfb = loadall_fb();
      include "feedback/list-fb.php";
      break;
    case 'delete_fb':
      if (isset($_GET['id']) && ($_GET['id']) > 0) {
        delete_fb($_GET['id']);
      }
      $dsfb = loadall_fb();

      include "feedback/list-fb.php";
      break;
      //bill
    case 'list_bill':
      // if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
      //     $kyw = $_POST['kyw'];
      // } else {
      //     $kyw = "";
      // }
      $listbill = loadall_bill();
      include "bill/list_bill.php";
      break;

    case 'delete_bill':
      if (isset($_GET['id_bill']) && ($_GET['id_bill']) > 0) {
        delete_bil($_GET['id_bill']);
      }
      $listbill = loadall_bill();

      include "bill/list_bill.php";
      break;

    case 'edit_bill':
      if (isset($_GET['id_bill']) && ($_GET['id_bill']) > 0) {
        $suabi = loadall_b($_GET['id_bill']);
      }
      $bc = loadall_st($_GET['id_bill']);
      $dsst = loadall_status_bill();
      include("bill/update_bill.php");
      break;
    case 'update_bill':
      if (isset($_POST['edit']) && ($_POST['edit'])) {
        // $name_user = $_POST['name_user'];
        $id_bill = $_POST['id_bill'];
        // $phone_user = $_POST['phone_user'];
        // $address_user = $_POST['address_user'];
        // $quantity = $_POST['quantity'];
        $id_status_bill = $_POST['id_status_bill'];
        update_bill($id_bill, $id_status_bill);
        $tbao = 'Sua data thanh cong';
      }
      $bc = loadall_st($id_bill);
      $dsst = loadall_status_bill();
      $listbill = loadall_bill();
      include "bill/list_bill.php";
      break;
    case 'edit_q':
      if (isset($_POST['ss']) && ($_POST['ss'])) {
        // var_dump($_POST);die;
        $quantity = $_POST['quantity'];
        $id_cart = $_POST['id_cart'];
        $id_bill = $_POST['id_bill'];
        edit_cart($id_cart, $quantity, $id_bill);
      }
      $bc = loadall_st($id_bill);
      $suabi = loadall_b($id_bill);
      $dsst = loadall_status_bill();
      include("bill/update_bill.php");
      break;
      //blog
    case 'add_blog':
      if (isset($_POST['them']) && ($_POST['them'])) {
        $news_name = $_POST['news_name'];
        $content = $_POST['content'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $update_at = date("Y-m-d H:i:s", time());
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $create_at = date("Y-m-d H:i:s", time());
        if ($news_name != "") {
          insert_news($news_name, $content, $file, $update_at,  $create_at);
          $tbao = 'Them data thanh cong';
          header("location:index.php?act=list_blog");
        }
      }
      include("blog/add_blog.php");
      break;
    case 'list_blog':
      $dsblog = loadall_blog();
      include "blog/list_blog.php";
      break;
    case 'delete_blog':
      if (isset($_GET['id']) && ($_GET['id']) > 0) {
        delete_blog($_GET['id']);
      }
      $dsblog = loadall_blog();

      include "blog/list_blog.php";
      break;

    case 'edit_blog':
      if (isset($_GET['id']) && ($_GET['id']) > 0) {
        $sp = loadone_news($_GET['id']);
      }
      include "blog/update_blog.php";
      break;
    case 'update_blog':
      if (isset($_POST['edit']) && ($_POST['edit'])) {
        $news_name = $_POST['news_name'];
        $content = $_POST['content'];
        $id = $_POST['id'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        update_news($news_name, $content, $file, $id);
        $tbao = 'Sua data thanh cong';
      }
      $dsblog = loadall_blog();
      include "blog/list_blog.php";
      break;

      //brand
    case 'add_brand':
      if (isset($_POST['them']) && ($_POST['them'])) {
        $name_brand = $_POST['Name_brand'];
        // $shows_menu = $_POST['Shows_menu'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        if ($name_brand != "") {
          insert_brand($name_brand, $file);
          header("location:index.php?act=list_brand");
          $tbao = 'Them data thanh cong';
        }
      }
      include "brand/add-brand.php";
      break;
    case 'list_brand':
      $dsbr = loadall_brand();
      include "brand/list-brand.php";
      break;

    case 'delete_brand':
      if (isset($_GET['id_brand']) && ($_GET['id_brand']) > 0) {
        delete_brand($_GET['id_brand']);
      }
      $dsbr = loadall_brand();
      include "brand/list-brand.php";
      break;

    case 'edit_brand':
      if (isset($_GET['id_brand']) && ($_GET['id_brand']) > 0) {
        $br = loadone_brand($_GET['id_brand']);
      }
      include "brand/update_brand.php";
      break;
    case 'update_brand':
      if (isset($_POST['edit']) && ($_POST['edit'])) {
        $id_brand = $_POST['id_brand'];
        $name_brand = $_POST['name_brand'];
        // $shows_menu = $_POST['Shows_menu'];
        $file = $_FILES['image']['name'];
        $target_dir = "../upload/";
        $target_file = $target_dir . basename($_FILES['image']["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
          // echo "Sorry, there was an error uploading your file.";
        }
        update_brand($name_brand, $file, $id_brand);
        $tbao = 'Sua data thanh cong';
      }
      $dsbr = loadall_brand();
      include "brand/list-brand.php";
      break;

      //dboard
      // case 'd_b':
      //   $countsp = count_sp();
      //   include "dashboard.php";
      //   break;

      //log_out
    case 'log_out':
      session_unset();
      header('Location:../index.php');
      break;
  }
} else {
  include("dashboard.php");
}
