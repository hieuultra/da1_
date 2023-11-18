<div class="container-fluid mt-4 px-4">
    <h1 class="mt-4">Add Blog</h1>
    <form action="?act=add_blog" method="POST" enctype="multipart/form-data">
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