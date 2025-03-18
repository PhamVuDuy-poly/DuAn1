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
                            <h5 class="m-b-10">Thêm tin tức</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php $BASE_URL ?> View/Admin/index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Thêm tin tức</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Thêm tin tức mới</h1>
        <form action="" id="formAdd" method="POST" class="row g-3" enctype="multipart/form-data">
            <div class="col-md-6 my-2">
                <label for="title" class="form-label">Tiêu đề: </label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Mời bạn nhập tiêu đề tin tức">
            </div>
            <div class="col-md-6 my-2">
                <label for="content" class="form-label">Nội dung: </label>
                <input type="text" name="content" id="content" class="form-control" placeholder="Mời bạn nhập mô tả">
            </div>
            <div class="col-md-6 my-2">
                <label for="user_id" class="form-label">Tên người dùng: </label>
                <select name="user_id" id="user_id" class="form-select">
                    <option value="">Mặc định</option>
                </select>
            </div>
            <div class=" col-md-6 my-2">
                <label for="status" class="form-label">Trạng thái tin tức: </label>
                <select name="status" id="status" class="form-select">
                    <option value="0">Khóa</option>
                    <option value="1">Xuất bản</option>
                </select>
            </div>
            <div class="col-12 my-2">
                <label for="image_url" class="form-label">Ảnh: </label>
                <input type="file" name="image_url"  id="image_url" class="form-control" placeholder="Mời bạn nhập ảnh bài viết">
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
</div>
<?php
include $BASE_URL . "View/Admin/components/footer-block.php";
include $BASE_URL . "View/Admin/components/footer-js.php"
?>
<script src="<?= $BASE_URL ?>View/Admin/assets/js/News.js"></script>
</body>
</html>