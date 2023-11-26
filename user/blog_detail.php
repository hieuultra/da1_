<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Search Widget -->
                <div class="widget widget-search">
                    <h3 class="widget-title">Search</h3>
                    <form action="#">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Categories Widget -->
                <div class="widget widget-categories">
                    <h3 class="widget-title">Categories</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Creative (2)</a></li>
                        <li><a href="#">Fashion (1)</a></li>
                        <li><a href="#">Image (1)</a></li>
                        <li><a href="#">Photography (1)</a></li>
                        <li><a href="#">Travel (5)</a></li>
                        <li><a href="#">Videos (2)</a></li>
                        <li><a href="#">WordPress (4)</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-12">
            <!-- Blog Content -->
            <?php foreach ($dsblog as $item) : ?>
                <article class="blog-post-wrapper mb-4">
                    <div class="post-information">
                        <h2><?= $item['news_name'] ?></h2>
                        <div class="entry-meta">
                            <span class="author-meta"><i class="fa fa-user"></i> <a href="#">admin</a></span>
                            <span><i class="fa fa-clock-o"></i> <?= $item['update_at'] ?></span>
                            <span class="tag-meta">
                                <i class="fa fa-folder-o"></i>
                                <a href="#">Fashion</a>,
                                <a href="#">WordPress</a>
                            </span>
                            <span>
                                <i class="fa fa-tags"></i>
                                <a href="#">fashion</a>,
                                <a href="#">t-shirt</a>,
                                <a href="#">white</a>
                            </span>
                            <span><i class="fa fa-comments-o"></i> <a href="#">6 comments</a></span>
                        </div>
                        <div class="entry-content">
                            <div class="post-thumbnail">
                                <img src="./upload/<?= $item['news_img'] ?>" class="img-fluid" alt="" width="500px" height="500px" />
                            </div>
                            <p><?= $item['content'] ?></p>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>

            <!-- Social Sharing -->
            <div class="social-sharing">
                <h3>Share this post</h3>
                <div class="sharing-icon">
                    <a href="#" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" data-toggle="tooltip" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                    <a href="#" data-toggle="tooltip" title="Google-plus"><i class="fa fa-google-plus"></i></a>
                    <a href="#" data-toggle="tooltip" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
            <!-- Author Info -->
            <div class="author-info mt-4">
                <div class="author-avatar">
                    <img src="./img/avatar.png" class="img-fluid" alt="" />
                </div>
                <div class="author-description">
                    <h2>About the Author: <a href="#">admin</a></h2>
                </div>
            </div>
            <!-- Comments Section -->
            <div class="single-post-comments mt-4">
                <div class="comments-area">
                    <div class="comments-heading">
                        <h3>6 comments</h3>
                    </div>
                    <div class="comments-list">
                        <!-- Comments List -->
                        <!-- Your comment structure here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>