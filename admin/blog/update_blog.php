<?php
if (is_array($sp)) {
    extract($sp);
}
$hinhpath = "../upload/" . $news_img;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='70'>";
} else {
    $hinh = "No photo";
}
?>
<div class="container-fluid mt-4 px-4">
    <h1 class="mt-4">Update blog</h1>
    <form action="?act=update_blog" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
            <label class="form-label">News_name</label>
            <input type="text" class="form-control" name="news_name" value="<?= $news_name ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
            <?= $hinh ?>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea class="form-control" style="height: 100px" name="content"><?= $content ?></textarea>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Update" name="edit">
        <a href="?act=list_blog">
            <input type="button" class="btn btn-primary" value="LIST_BLOG">
        </a>
    </form>
</div>