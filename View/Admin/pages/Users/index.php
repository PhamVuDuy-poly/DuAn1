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

<div class="pc-container pb-1">
    <div class="modal fade show position-fixed" id="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa tài khoản</h1>
                    <button type="button" class="btn-close button-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="formEdit" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 my-2">
                            <label for="name" class="form-label">Họ tên: </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Mời bạn nhập họ tên tài khoản">
                        </div>
                        <div class=" col-md-6 my-2">
                            <label for="email" class="form-label">Email: </label>
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
                                <option value="2">Người dùng</option>
                                <option value="1">Quản trị viên</option>
                            </select>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="created_at" class="form-label">Ngày tạo: </label>
                            <input type="date" name="created_at" id="created_at" class="form-control" >
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="updated_at" class="form-label">Ngày chỉnh sửa: </label>
                            <input type="date" name="updated_at" id="updated_at" class="form-control" >
                        </div>
                        <div class="col-12 my-2">
                            <label for="avatar" class="form-label">Avatar: </label>
                            <input type="file" name="avatar"  id="avatar" class="form-control" placeholder="Mời bạn nhập ảnh cá nhân">
                        </div>
                        <div class="col-md-6 my-2">
                            <img src="" id="img" style="max-height: 50px; max-width: 100px" alt>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary button-close" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary" form="formEdit">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tài khoản</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?role=admin&page=dashboard">Trang Chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Danh sách tài khoản</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Danh sách tài khoản</h1>
        <div class="table-responsive" id="view">
            <table class="table table-hover table-striped table-bordered border-light text-center">
                <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>SDT</th>
                    <th>Địa chỉ</th>
                    <th>Thông tin</th>
                    <th>Ảnh</th>
                    <th>Vai trò</th>
                    <th>Ngày tạo</th>
                    <th>Ngày chỉnh sửa</th>
                    <th>Trạng thái</th>
                    <th>Công cụ</th>
                </tr>
                </thead>
                <tbody class="table-group-divider table-light">

                </tbody>
            </table>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
            <div class="btn-group" role="group" id="framePage">
            </div>
        </div>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert">
            <div class="toast-header">
                <img src="<?= $BASE_URL ?>View/User/assets/image/logo1.png" style="max-height: 70px; max-width: 100px;" class="rounded me-2" alt="Logo">
                <strong class="me-auto"></strong>
                <small>Now</small>
                <button type="button" class="btn-close button-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body" id="message">

            </div>
        </div>
    </div>
</div>
<?php
include $BASE_URL . "View/Admin/components/footer-block.php";
include $BASE_URL . "View/Admin/components/footer-js.php"
?>
<script src="<?= $BASE_URL ?>View/Admin/assets/js/mainUsers.js"></script>
</body>
</html>