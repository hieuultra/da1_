<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script>
    $().ready(function() {
        $("#demoForm").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "username": {
                    required: true,
                    maxlength: 10
                },
                "password": {
                    required: true,
                    minlength: 3
                },
                "name": {
                    required: true,
                    minlength: 5
                },
                "address": {
                    required: true,
                },
                "phone": {
                    required: true,
                },
                "email": {
                    required: true,
                    email: true
                }

                
              
            },
            messages: {
                "username": {
                    required: "Bắt buộc nhập username",
                    maxlength: "Hãy nhập tối đa 10 ký tự"
                },
                "password": {
                    required: "Bắt buộc nhập password",
                    minlength: "Hãy nhập ít nhất 3 ký tự"
                },
                "name": {
                    required: "Bắt buộc nhập ho ten",
                    maxlength: "Hãy nhập ít nhất 5 ký tự"
                },
                "address": {
                    required: "Bắt buộc nhập address",
                },
                "phone": {
                    required: "Bắt buộc nhập tel",
                },
                "email": {
                    required: "Bắt buộc nhập email",
                    email: "Hãy nhập dúng định dạng email"
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
    <h1 class="mt-4">Add account</h1>
    <form action="?act=add_acc" method="post" enctype="multipart/form-data" id="demoForm">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" class="form-control" name="password">
        </div>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" name="address">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="img">
        </div>
        <input type="submit" class="btn btn-primary" value="Add" name="them">
        <a href="?act=list_account">
            <input type="button" class="btn btn-primary" value="LIST_ACC">
        </a>
    </form>
</div>