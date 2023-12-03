<style>
    #img {
        height: 300px;
        width: 100%;
    }
</style>
<!-- Products Start -->
<div class="container-fluid pt-5">
    <!-- Title -->
    <div class="text-center mb-4">
        <h2 class="section-title px-5">
            <span class="px-2">Selling Products </span>
        </h2>
    </div>

    <!-- Search & sort -->
    <div class="row px-xl-5 pb-3">
        <!-- Search & sort -->
        <div class="col-12 pb-1">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <!-- Search -->
                <form action="index.php?act=search_pro" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search by name" name="kyw" />
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <!-- <i class="fa fa-search"></i> -->
                                <input type="submit" class="btn btn-primary" value="SEARCH" name="search">
                            </span>
                        </div>
                    </div>
                </form>
                <!-- Sort -->
                <div class="dropdown ml-4">
                    <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort by
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                        <a class="dropdown-item" href="#">Latest</a>
                        <a class="dropdown-item" href="#">Popularity</a>
                        <a class="dropdown-item" href="#">Best Rating</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row px-xl-5 pb-3">
        <!-- Product -->
        <?php
        foreach ($dssell as $s) {
            extract($s);
            $linksp = "index.php?act=pro_detail&id_pro=" . $id_pro;
            $tt = $price - (($price * $discount) / 100);
            $hinh = $img_path . $img;
            echo '<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
     <div class="card product-item border-0 mb-4">
       <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
       <a href="' . $linksp . '">  <img class="img-fluid w-300" src="' . $hinh . '" alt="" id="img" /></a>
       </div>
       <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
       <div class="product-action">
       <form action="index.php?act=wishlist" method="post">
         <input type="hidden" name="id_pro" value="' . $id_pro . '">
         <input type="hidden" name="name_pro" value="' . $name_pro . '">
         <input type="hidden" name="img" value="' . $img . '">
         <input type="hidden" name="price" value="' . $price . '">
         <input type="hidden" name="discount" value="' . $discount . '">
         <input type="submit" class="btn btn-primary" value="Like" name="wishlist">
         <i class="fa-solid fa-cart-flatbed-suitcase fa-bounce fa-2xl"></i>' . $prosell . '
       </form>
   </div>
         <h6 class="text-truncate mb-3">' . $name_pro . '</h6>
         <div class="d-flex justify-content-center">
           <h6>' . number_format($tt, 0, ",", ".") . '$' . '</h6>
           <h6 class="text-muted ml-2"><del>' . number_format($price, 0, ",", ".") . '$' . '</del></h6>
         </div>
       </div>
       <div class="card-footer d-flex justify-content-between bg-light border">
         <a href="' . $linksp . '" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
         <form action="index.php?act=addtocart" method="post">
         <input type="hidden" name="id_pro" value="' . $id_pro . '">
         <input type="hidden" name="name_pro" value="' . $name_pro . '">
         <input type="hidden" name="img" value="' . $img . '">
         <input type="hidden" name="price" value="' . $price . '">
         <input type="hidden" name="discount" value="' . $discount . '">
         <input type="submit" value="Add To Cart" class="btn btn-sm text-dark p-0" name="addtocart"><i class="fas fa-shopping-cart text-primary mr-1"></i>
       </form>
       </div>
     </div>
   </div>';
        }
        ?>
    </div>
</div>
<!-- Products End -->