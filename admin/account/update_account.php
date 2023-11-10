<?php
if (is_array($suatk)) {
  extract($suatk);
}
$hinhpath = "../upload/" . $image;
if (is_file($hinhpath)) {
  $hinh = "<img src='" . $hinhpath . "' height='70'>";
} else {
  $hinh = "No photo";
}
?>
<div class="container-fluid mt-4 px-4">
  <h1 class="mt-4">Update account</h1>
  <form action="?act=update_account" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_user" value="<?= $id_user ?>">
    <label for="">ROLE</label>
    <select class="form-select" name="id_role">
        <option value="0" selected>All</option>
        <?php
        foreach ($dsrl as $ds) {
          if ($ds['id_role'] == $id_role) $s = "selected";
          else $s = "";
          echo '<option value="' . $ds['id_role'] . '" ' . $s . '>' . $ds['name_role'] . '</option>';
        }
        ?>
      </select>
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" class="form-control" name="name_acc" value="<?= $username ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="text" class="form-control" name="password" value="<?= $password ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name" value="<?= $name ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Address</label>
      <input type="text" class="form-control" name="address" value="<?= $address ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Phone</label>
      <input type="text" class="form-control" name="phone" value="<?= $phone ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="text" class="form-control" name="email" value="<?= $email ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" class="form-control" name="image">
      <?= $hinh ?>
   
    <input type="submit" class="btn btn-primary" value="Update" name="edita">
    <a href="?act=list_account">
      <input type="button" class="btn btn-primary" value="LIST_CAT">
    </a>
  </form>
</div>