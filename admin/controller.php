<?php
ob_start();
include "../model/pdo.php";
include "../model/cat.php";


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
        update_cat($name_cat,$file, $id_cat);
        $tbao = 'Sua data thanh cong';
      }
      $dslh = loadall_cat();
      include "category/list-category.php";
      break;

      //Product
    case 'listProduct':
      include("product/list-product.php");
      break;
    case 'addProduct':
      include("product/add-product.php");
      break;
    case 'updateProduct':
      include("product/update-product.php");
      break;
      case 'update_usser':
        include("product/update-product.php");
        break;
      
  }
} else {
  include("dashboard.php");
}
