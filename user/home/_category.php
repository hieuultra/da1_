<style>
  #img {
    width: 100%;
    height: 300px;
  }
</style>
<!-- Categories Start -->
<div class="container-fluid pt-5">
  <div class="row px-xl-5 pb-3">
    <?php
    foreach ($dsdm as $ds) {
      extract($ds);
      $linkdm = "index.php?act=product_cat&id_cat=" . $id_cat;
      $hinh = $img_path . $img_cat;
      $countsp = loadall_pro_count($ds['id_cat']);
      // $linkdm = "index.php?act=sanpham&id_dm=" . $id_dm;
      // echo ' 
      //   <div class="col-lg-4 col-md-6 pb-1">
      //     <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px">
      //       <p class="text-right">' . $countsp . ' products</p>
      //       <a href="" class="cat-img position-relative overflow-hidden mb-3">
      //       <a href="' . $linkdm . '">  <img class="img-fluid" src="' . $hinh . '" alt="" id="img"/></a>
      //       </a>
      //       <h5 class="font-weight-semi-bold m-0">' . $name_cat . '</h5>
      //     </div>
      //   </div>';
      echo '   <div class="col-lg-2 col-md-6 pb-1">
        <a class="text-decoration-none" href="">
        <div class="cat-item d-flex align-items-center mb-4">
            <div class="overflow-hidden" style="width: 100px; height: 100px;">
            <a href="' . $linkdm . '">  <img class="img-fluid" src="' . $hinh . '" alt=""></a>
            </div>
            <div class="flex-fill pl-3">
                <h6>' . $name_cat . '</h6>
                <small class="text-body">' . $countsp . ' Products</small>
            </div>
        </div>
    </a>
    </div>';
    }
    ?>

  </div>
</div>
<!-- Categories End -->