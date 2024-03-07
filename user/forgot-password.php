<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template" />
  <meta name="author" content="Bootlab" />

  <title>Reset Password - AppStack - Admin &amp; Dashboard Template</title>

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
    <div class="container d-flex flex-column">
      <div class="row h-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">
            <div class="text-center mt-4">
              <h1 class="h2">Forgot password</h1>
              <p class="lead">Enter your email to forgot your password.</p>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="m-sm-4">
                  <form action="?act=forgot_password" method="post" >
                    <div class="form-group">
                      <label>Email</label>
                      <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
                    </div>
                    <div class="text-center mt-3">
                      <input type="submit" href="#"  class="btn btn-outline-primary" value="Send" name="send_email">
                      <input type="reset" href="#" class="btn btn-outline-warning" value="Reset">
                      <!-- <button type="submit" class="btn btn-lg btn-primary">Reset password</button> -->
                    </div>
                  </form>
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