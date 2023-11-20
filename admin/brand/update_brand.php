<?php
if (is_array($br)) {
    extract($br);
}
$hinhpath = "../upload/" . $img_br;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='70'>";
} else {
    $hinh = "No photo";
}
?>
<div class="container-fluid mt-4 px-4">
    <h1 class="mt-4">Update Brand</h1>
    <form action="?act=update_brand" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_brand" value="<?= $id_brand ?>">
        <div class="mb-3">
            <label class="form-label">Name_brand</label>
            <input type="text" class="form-control" name="name_brand" value="<?= $name_brand ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
            <?= $hinh ?>
<!-- 
            <div class="mb-3">
                <label class="form-label">Shows_menu</label>
                <input type="text" class="form-control" name="Shows_menu" value="<?= $shows_menu ?>">
            </div> -->
        </div>
        <input type="submit" class="btn btn-primary" value="Update" name="edit">
        <a href="?act=list_brand">
            <input type="button" class="btn btn-primary" value="LIST_Brand">
        </a>
    </form>
</div>