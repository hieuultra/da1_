<div class="container-fluid mt-4 px-4">
    <h1 class="mt-4">Add Brand</h1>
    <form action="index.php?act=add_brand" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Name_brand</label>
            <input type="text" class="form-control" name="Name_brand">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <!-- <div class="mb-3">
            <label class="form-label">Shows_menu</label>
            <input type="text" class="form-control" name="Shows_menu">
        </div> -->
       
        <input type="submit" class="btn btn-primary" name="them" value="ADD">
        <a href="?act=list_brand">
            <input type="button" class="btn btn-primary" value="LIST_Brand">
        </a>
    </form>
</div>