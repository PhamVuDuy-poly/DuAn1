<!DOCTYPE html>
<html lang="en">
  <!-- [Head] start -->
  <head>
<?php
$BASE_URL  = "./";
include $BASE_URL ."View/Admin/components/head-page-meta.php";
?>

<?php
include $BASE_URL ."View/Admin/components/head-css.php"
?>

  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->
  <body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
      <div class="auth-wrapper v3">
        <div class="auth-form">
          <div class="card mt-5">
            <div class="card-body">
              <a href="#" class="d-flex justify-content-center mt-3">
                <img src="<?= $BASE_URL ?>View/Admin/assets/images/logo-dark.svg" width="230px" height="50px" alt="image">
              </a>
              <div class="row">
                <div class="d-flex justify-content-center">
                  <div class="auth-header">
                    <h2 class="text-secondary mt-5"><b>Quên mật khẩu</b></h2>
                    <p class="f-16 mt-2 ">Nhập email để lấy lại mật khẩu</p>
                  </div>
                </div>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput2" placeholder="Email Address / Username" >
                <label for="floatingInput2">Địa chỉ email</label>
              </div>
              <div class="d-grid mt-4">
                <button type="button" class="btn btn-secondary p-2"><a role="button" style="text-decoration: none;" href="#">Gửi</a></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
include $BASE_URL ."View/Admin/components/footer-js.php"
?>
    
    
  </body>
  <!-- [Body] end -->
</html>
