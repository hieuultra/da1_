<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template" />
    <meta name="author" content="Bootlab" />

    <title>Login_Sucsess - AppStack - Admin &amp; Dashboard Template</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
</head>
<style>
    label.error {
        color: red;
    }

    .tbao {
        color: red;
    }
</style>

<body>
    <main class="main d-flex w-100 mt-5">
        <div class="container d-flex flex-column mt-5">
            <div class="row h-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-4">
                            <h1 class="h2">Login Sucsess</h1>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <!-- <img src="" alt="logo" class="img-fluid rounded-circle" width="132" height="132" /> -->
                                        <h1 class="m-0 display-5 font-weight-semi-bold">
                                            <span class="text-primary font-weight-bold border px-3 mr-1">Ultra</span>Shop
                                        </h1>
                                    </div>
                                    <?php

                                    if (isset($_SESSION['user'])) {
                                        extract($_SESSION['user']);
                                    ?>
                                        <div class="text-center mt-4 font-weight-bold border px-3 mr-1">
                                            HELLO <br />
                                            <?= $username ?>
                                        </div>
                                        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px">
                                            <?php
                                            $hinhpath = "./upload/" . $image;
                                            if (is_file($hinhpath)) {
                                                $hinh = "<img src='" . $hinhpath . "' height='170'>";
                                            } else {
                                                $hinh = "No photo";
                                            }
                                            ?>
                                            <?= $hinh ?>
                                        </div>
                                        <div class="form-group">
                                            <?php if ($id_role == 1) { ?>
                                                <li><a href="index.php?act=mybill">My order </a></li>
                                            <?php } ?>
                                            <li> <a href="?act=forgot_password">Forgot password?</a></li>
                                            <li> <a href="?act=edit_account">Edit account </a> </li>
                                            <?php if ($id_role == 2) { ?>
                                                <li> <a href="admin/index.php">Login admin </a></li>
                                            <?php } ?>
                                            <li> <a href="?act=log_out">Log out </a></li>
                                        </div>

                                    <?php
                                    } else {
                                    ?>
                                        <form action="?act=login" method="post">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your username" />
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                                                <div class="d-flex mt-2 justify-content-between">
                                                    <small>
                                                        <a href="?act=forgot_password">Forgot password?</a>
                                                    </small>
                                                    <br />
                                                    <small>
                                                        <a href="?act=sign_up">Create account?</a>
                                                    </small>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="custom-control custom-checkbox align-items-center">
                                                    <input type="checkbox" class="custom-control-input" value="remember-me" name="remember-me" checked="" />
                                                    <label class="custom-control-label text-small">Remember me next
                                                        time</label>
                                                </div>
                                            </div>
                                            <div class="text-center mt-3">
                                                <input type="submit" href="#" class="btn btn-lg btn-primary" value="Sign in" name="dangnhap">
                                                <!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
                                            </div>
                                        </form>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <h2 class="tbao">
                            <?php
                            if (isset($tbao) && ($tbao) != "") {
                                echo $tbao;
                            }
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>