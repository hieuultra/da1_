<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script>
    $().ready(function() {
        $("#demoForm").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "name_cat": {
                    required: true,
                    nameloai:true
                }

            },
            messages: {
                "name_cat": {
                    required: "Bắt buộc nhập tên danh mục ",
                    nameloai: "Không được trùng tên danh mục đã có"
                }
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
  <h1 class="mt-4">Add category</h1>
  <form action="index.php?act=add_cat" method="POST" enctype="multipart/form-data" id="demoForm">
    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" class="form-control" name="name_cat">
    </div>

    <div class="mb-3">
      <label class="form-label">Image</label>
      <input type="file" class="form-control" name="image">
    </div>
    <input type="submit" class="btn btn-primary" name="them" value="ADD">
    <a href="?act=listCategory">
    <input type="button" class="btn btn-primary" value="LIST_CAT">
      </a>
  </form>
</div>