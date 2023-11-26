<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Search Widget -->
                <div class="widget widget-search">
                    <h3 class="widget-title">Search</h3>
                    <form action="#">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Categories Widget -->
                <div class="widget widget-categories">
                    <h3 class="widget-title">Categories</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Creative <span>(2)</span></a></li>
                        <li><a href="#">Fashion <span>(1)</span></a></li>
                        <li><a href="#">Image <span>(1)</span></a></li>
                        <li><a href="#">Photography <span>(1)</span></a></li>
                        <li><a href="#">Travel <span>(5)</span></a></li>
                        <li><a href="#">Videos <span>(2)</span></a></li>
                        <li><a href="#">WordPress <span>(4)</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8">
            <!-- Blog Posts -->
            <div class="archive-header mb-4">
                <h1 class="archive-title">Monthly Archives: <span>November 2023</span></h1>
            </div>
            <?php foreach ($dsblog as $newitem) : ?>
                <article class="blog-post-wrapper mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="post-thumbnail">
                                <a href="#"><img src="./upload/<?= $newitem['news_img'] ?>" class="img-fluid" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="post-information">
                                <h2><a href="#">Post in Video format</a></h2>
                                <div class="small-meta">
                                    <span><i class="fa fa-calendar"></i> <?= $newitem['update_at'] ?> </span>
                                    <a href="#"><i class="fa fa-comments-o"></i> 2 comments</a>
                                </div>
                                <p><?= $newitem['news_name'] ?></p>
                                <a class="readmore btn btn-outline-primary" href="?act=blog_detail&id=<?= $newitem['id'] ?>">Read more</a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>

            <!-- Pagination -->
            <div class="pagination justify-content-center">
                <ul class="pagination">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>