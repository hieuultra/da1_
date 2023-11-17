<?php
if (is_array($suab)) {
    extract($suab);
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
        <div class="mb-3">
            <label class="form-label">Name_user</label>
            <input type="text" class="form-control" name="name_user" value="<?= $name_user ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone_user</label>
            <input type="text" class="form-control" name="phone_user" value="<?= $phone_user ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Address_user</label>
            <input type="text" class="form-control" name="address_user" value="<?= $address_user ?>">
        </div>

        <!-- <div class="mb-3">
            <label class="form-label">Name_pro</label>
            <input type="text" class="form-control" name="name_pro" value="<?= $name_pro ?>">
        </div> -->

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
        </div>


        <input type="submit" class="btn btn-primary" value="Update" name="edit">
        <a href="?act=list_bill">
            <input type="button" class="btn btn-primary" value="LIST_BILL">
        </a>
    </form>
</div>