<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php $BASE_URL = "./"; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <?php
    include $BASE_URL . "View/Admin/components/head-page-meta.php";
    include $BASE_URL . "View/Admin/components/head-css.php"
    ?>
    <script  src="<?= $BASE_URL ?>JS/Validate.js"></script>
</head>
<body>
<?php include $BASE_URL . "View/Admin/components/layout-vertical.php" ?>
<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tài khoản</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php $BASE_URL ?> View/Admin/index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Thêm tài khoản</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Thêm tài khoản mới</h1>
        <form action="" id="formAdd" method="POST" class="row g-3" enctype="multipart/form-data">
            <div class="col-md-6 my-2">
                <label for="name" class="form-label">Họ tên: </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Mời bạn nhập họ tên tài khoản">
            </div>
            <div class=" col-md-6 my-2">
                <label for="contact_id" class="form-label">Email: </label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Mời bạn nhập email tài khoản">
            </div>
            <div class="col-md-6 my-2">
                <label for="password" class="form-label">Mật khẩu: </label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Mời bạn nhập mật khẩu">
            </div>
            <div class="col-md-6 my-2">
                <label for="phone" class="form-label">SDT: </label>
                <input type="number" name="phone" id="phone" class="form-control" placeholder="Mời bạn nhập sdt">
            </div>
            <div class="col-md-6 my-2">
                <label for="address" class="form-label">Địa chỉ: </label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Mời bạn nhập địa chỉ">
            </div>
            <div class="col-md-6 my-2">
                <label for="bio" class="form-label">Thông tin tài khoản: </label>
                <input type="text" name="bio" id="bio" class="form-control" placeholder="Mời bạn nhập thông tin cụ thể">
            </div>
            <div class=" col-md-6 my-2">
                <label for="status" class="form-label">Trạng thái tài khoản: </label>
                <select name="status" id="status" class="form-select">
                    <option value="0">Khóa</option>
                    <option value="1">Hoạt động</option>
                </select>
            </div>
            <div class="col-md-6 my-2">
                <label for="role_id" class="form-label">Vai trò: </label>
                <select name="role_id" id="role_id" class="form-select">
<!--                    <option value="">Mặc định</option>-->
                    <option value="2">Người dùng</option>
                    <option value="1">Quản trị viên</option>
                </select>
            </div>
            <div class="col-12 my-2">
                <label for="avatar" class="form-label">Avatar: </label>
                <input type="file" name="avatar"  id="avatar" class="form-control" placeholder="Mời bạn nhập ảnh cá nhân">
            </div>
            <div class="col-md-6 my-2">
                <img src="" id="img" style="max-width: 400px; max-height: 200px" alt>
            </div>
            <button type="submit" class="btn btn-outline-success mb-3">Thêm mới</button>
            <div class=" d-none my-3 alert" role="alert" id="alert">

            </div>
    </div>
    </form>
</div>
</div>d
<?php
include $BASE_URL . "View/Admin/components/footer-block.php";
include $BASE_URL . "View/Admin/components/footer-js.php"
?>
<script src="<?= $BASE_URL ?>View/Admin/assets/js/Users.js"></script>
</body>
</html>