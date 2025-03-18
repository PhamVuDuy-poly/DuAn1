
<!DOCTYPE html>
<html lang="en">
  <!-- [Head] start -->
  <head>

<?php
$BASE_URL = "./";
//include $BASE_URL . "View/User/header.php";
include $BASE_URL . "View/Admin/components/head-page-meta.php"
?>

<?php
include $BASE_URL . "View/Admin/components/head-css.php"
?>
      <script  src="<?= $BASE_URL ?>JS/Validate.js"></script>
      <script src="<?= $BASE_URL ?>JS/WebHistory.js"></script>
      <script src="<?= $BASE_URL ?>View/User/dist/js/UserRegis.js"></script>
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
              <a role="button" href="?page=Contacts" class="d-flex justify-content-center mt-3">
                <img src="<?= $BASE_URL ?>View/User/assets/image/logo1.png" style="max-height: 100px; max-width: 150px;" alt="image">
              </a>
              <div class="row">
                <div class="d-flex justify-content-center">
                  <div class="auth-header">
                    <h2 class="text-success my-2"><b>Đăng ký</b></h2>
                    <p class="f-16 mt-2">Nhập thông tin đăng nhập để tiếp tục</p>
                  </div>
                </div>
              </div>
              <button type="button" class="btn mt-2 bg-light-primary bg-light text-muted" style="width: 100%">
                <img src="<?= $BASE_URL ?>View/User/assets/image/logo1.png" style="max-height: 70px; max-width: 100px;" class="mb-2 " alt="image">Đăng ký với google
              </button>
              <div class="saprator mt-3">
                <span>or</span>
              </div>
              <h5 class="my-4 d-flex justify-content-center">Đăng ký với địa chỉ gmail</h5>
                <form id="formAdd" method="POST"  enctype="multipart/form-data" style="--bs-form-invalid-color: pink">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="First Name" >
                    <label for="name">Họ và tên:</label>
                  </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address / Username" >
                <label for="email">Địa chỉ email / Tên(biệt danh)</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                <label for="password">Mật khẩu</label>
              </div>
              <div class="form-check mt-3s">
                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="" >
                <label class="form-check-label" for="customCheckc1">
                  <span class="h5 mb-0">Tôi đồng ý <span>Điều khoản và cá nhân</span></span>
                </label>
              </div>

              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-outline-success p-2">Đăng ký</button>
              </div>
                    <div class=" d-none my-3 alert" style="color: wheat"  role="alert" id="alert">

                    </div>
                </form>
              <hr >
              <h5 class="d-flex justify-content-center"><a role="button" style="text-decoration: none;" href="?page=Login">Bạn đã có tài khoản?</a></h5>

            </div>
          </div>
        </div>
      </div>
    </div>
<?php
include $BASE_URL ."View/Admin/components/footer-js.php";
?>
    
    
  </body>
  <!-- [Body] end -->
</html>
