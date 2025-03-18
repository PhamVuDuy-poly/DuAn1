<!DOCTYPE html>
<html lang="en">
  <!-- [Head] start -->
  <head>
      <?php
      $BASE_URL = "./";
      //include $BASE_URL . "View/User/header.php";
      include $BASE_URL . "View/Admin/components/head-page-meta.php"
      ?>
      <script src="<?= $BASE_URL ?>JS/AccessToken.js"></script>
      <script src="<?= $BASE_URL ?>View/User/dist/js/main.js"></script>
      <script src="<?= $BASE_URL ?>JS/WebHistory.js"></script>
      <?php
      include $BASE_URL . "View/Admin/components/head-css.php";
      ?>

      <script  src="<?= $BASE_URL ?>JS/Validate.js"></script>
      <script src="<?= $BASE_URL ?>View/User/dist/js/UserLogin.js"></script>

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
          <div class="card my-5">
            <div class="card-body">
              <a href="?page=Contacts" class="d-flex justify-content-center">
                <img src="<?= $BASE_URL ?>View/User/assets/image/logo1.png" style="max-height: 100px; max-width: 150px;" alt="image" >
              </a>
              <div class="row">
                <div class="d-flex justify-content-center">
                  <div class="auth-header">
                    <h2 class="text-success my-3"><b>Xin chào, mừng quay trở lại</b></h2>
                    <p class="f-16 mt-2">Nhập thông tin đăng nhập để tiếp tục</p>
                  </div>
                </div>
              </div>
              <div class="d-grid">
                <button type="button" class="btn mt-2 bg-light-success bg-light text-muted">
                  <img src="<?= $BASE_URL ?>View/User/assets/image/logo1.png" width="100px" height="70px" class="mb-2" alt="image">Đăng nhập với Nhaccuviet
                </button>
              </div>
              <div class="saprator mt-3">
                <span>or</span>
              </div>
              <h5 class="my-4 d-flex justify-content-center">Đăng nhập với địa chỉ gmail</h5>
                <form id="formAdd" method="POST" enctype="multipart/form-data" style="--bs-form-invalid-color: pink">
                    <div class="form-floating mb-3">
                        <input
                                type="email"
                                class="form-control"
                                name="email"
                                id="email"
                                placeholder="Email Address / Username"
                                required />
                        <label for="email">Địa chỉ email / Tên (biệt danh)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Password"
                                required />
                        <label for="password">Mật khẩu</label>
                    </div>
                    <div class="d-flex mt-1 justify-content-between">
                        <div class="form-check">
                            <input
                                    class="form-check-input input-primary"
                                    type="checkbox"
                                    id="customCheckc1" />
                            <label class="form-check-label text-muted" for="customCheckc1">Remember me</label>
                        </div>
                        <h5 class="text-secondary">
                            <a
                                    role="button"
                                    style="text-decoration: none;"
                                    href="?page=Forgotpass"
                                    aria-label="Quên mật khẩu?">Quên mật khẩu?
                            </a>
                        </h5>
                    </div>
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-outline-success">Đăng nhập</button>
                    </div>
                    <div
                            class="alert my-3"
                            style="color: black"
                            role="alert"
                            id="alert"
                            aria-live="assertive">
                    </div>
                </form>
                <hr >
              <h5 class="d-flex justify-content-center"><a href="?page=Register">Bạn chưa có đăng nhập?</a></h5>
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
