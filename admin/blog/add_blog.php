<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script>
    $().ready(function() {
        $("#demoForm").validate({
            onfocusout: false,
            onkeyup: false,
            onclick: false,
            rules: {
                "news_name": {
                    required: true,
                    
                },
                "content": {
                    required: true,
                    
                },
            },
            messages: {
                "news_name": {
                    required: "Bắt buộc nhập news_name",
                    
                },
                "content": {
                    required: "Bắt buộc nhập content",
                    
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
    <h1 class="mt-4">Add Blog</h1>
    <form action="?act=add_blog" method="POST" enctype="multipart/form-data" id="demoForm">
        <div class="mb-3">
            <label class="form-label">News_name</label>
            <input type="text" class="form-control" name="news_name">
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea class="form-control" placeholder="Leave a content blog here" style="height: 100px" name="content"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <input type="submit" class="btn btn-primary" name="them" value="ADD">
        <a href="?act=list_blog">
            <input type="button" class="btn btn-primary" value="LIST_SLIDER">
        </a>
    </form>
</div>