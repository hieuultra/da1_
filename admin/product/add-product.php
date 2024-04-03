<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script>
    $().ready(function() {
        // Thêm một quy tắc tùy chỉnh cho price
        $.validator.addMethod("positiveNumber", function(value, element) {
            return Number(value) > 0;
        }, "Price phải là số dương");
        $("#demoForm").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "name_pro": {
                    required: true,
                },             
                "img ": {
                    required: true,
                },
                "price": {
                    required: true,
                    positiveNumber: true
                },
                "discount": {
                    required: true,
                },
             
            },
            messages: {
                "name_pro ": {
                    required: "Bắt buộc nhập username",
                },
                
                "img ": {
                    required: "Bắt buộc nhập hình ",
                },
             
                "price": {
                    required: "Bắt buộc nhập price",
                    positiveNumber: "Price phải là số dương"
                },
                "discount ": {
                    required: "Bắt buộc nhập giảm giá ",

                },
            }
        });
    });
</script>
<style>
    label.error {
        color: red;
    }
</style>
<div class="container-fluid mt-4 px-4">
  <h1 class="mt-4">Add product</h1>
  <form action="?act=add_pro" method="post" enctype="multipart/form-data" id="demoForm">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name_pro">
    </div>

    <div class="mb-3">
      <label class="form-label">Category</label>
      <select class="form-select" name="id_cat">
        <?php
        foreach ($dslh as $ds) {
          extract($ds);
          echo '<option value="' . $id_cat . '">' . $name_cat . '</option>';
        }
        ?>

      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Brands</label>
      <select class="form-select" name="id_brand">
        <?php
        foreach ($dsbr as $ds) {
          extract($ds);
          echo '<option value="' . $id_brand . '">' . $name_brand . '</option>';
        }
        ?>

      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" class="form-control" name="image">
    </div>

    <div class="mb-3">
      <label class="form-label">Thumbnail</label>
      <input type="file" class="form-control" name="thum">
    </div>

    <div class="mb-3">
      <label class="form-label">Price</label>
      <input type="number" class="form-control" name="price">
    </div>

    <div class="mb-3">
      <label class="form-label">Discount</label>
      <input type="number" class="form-control" name="discount">
    </div>

    <!-- <div class="mb-3">
      <label class="form-label">ID_Size</label>
      <input type="number" class="form-control" name="size">
    </div> -->

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea class="form-control" placeholder="Leave a description product here" style="height: 100px" name="des"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Add" name="them">
    <a href="?act=list_pro">
      <input type="button" class="btn btn-primary" value="LIST_PRO">
    </a>
  </form>
</div>