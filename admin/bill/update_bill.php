<?php
if (is_array($suabi)) {
    extract($suabi);
}
?>
<div class="container-fluid mt-4 px-4">
    <h1 class="mt-4">Update bill</h1>
    <form action="?act=update_bill" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_bill" value="<?= $id_bill ?>">
        <div class="mb-3">
            <label class="form-label">Status_bill</label>
            <select class="form-select" name="id_status_bill">
                <option value="0" selected>All</option>
                <?php
                foreach ($dsst as $ds) {
                    if ($ds['id_status_bill'] == $id_status_bill) $s = "selected";
                    else $s = "";
                    echo '<option value="' . $ds['id_status_bill'] . '" ' . $s . '>' . $ds['name_status'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Infor_user</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $name_user ?></h6>
                    <p class="card-text"><?= $phone_user ?></p>
                    <p class="card-text"><?= $address_user ?></p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total_price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suabi as $s) {
                        $suasp = "index.php?act=edit_pro&id_pro=" . $id_pro;
                        $xoasp = "index.php?act=delete_pro&id_pro=" . $id_pro;
                        $hinhpath = "../upload/" . $image_pro;
                        if (is_file($hinhpath)) {
                            $hinh = "<img src='" . $hinhpath . "' height='70'>";
                        } else {
                            $hinh = "No photo";
                        }

                        echo '  <tr>
                  <td>' . $name_pro . '</td>
                  <td>' . $hinh . '</td>
                  <td>' .  number_format($price_pro, 0, ",", ".") . '$' . '</td>
                  <td><input value="' . $quantity . '" id="x"></td>
                  <td>' .  number_format($total_price, 0, ",", ".") . '$' . '</td>
                  <td>
                  <a href="' . $suasp . '" class="btn btn-warning"><input type="button" value="UPDATE" /></a>
                  <a href="' . $xoasp . '" class="btn btn-danger"><input type="button" value="DELETE" onclick ="return confirm(\'ban co chac chan muon xoa?\')" /></a>
                  </td>
                </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- <a href="?act=add_pro">
          <input type="submit" class="btn btn-primary" name="them" value="ADD">
        </a>
        <div class="mb-3">
            <label class="form-label">Price_pro</label>
            <input type="number" class="form-control" name="price_pro" disabled value="<?= $price_pro ?>">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" name="quantity" value="<?= $quantity ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Total_price</label>
            <input type="number" class="form-control" name="total_price" disabled value="<?= $total_price ?>">
        </div> -->

        <input type="submit" class="btn btn-primary" value="Update" name="edit">
        <a href="?act=list_bill">
            <input type="button" class="btn btn-primary" value="LIST_BILL">
        </a>
    </form>
</div>