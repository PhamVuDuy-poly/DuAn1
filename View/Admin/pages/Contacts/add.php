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
                            <h5 class="m-b-10">Thêm liên hệ</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php $BASE_URL ?> View/Admin/index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Thêm liên hệ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Thêm liên hệ mới</h1>
        <form action="" id="formAdd" method="POST" class="row g-3" enctype="multipart/form-data">
            <div class="col-md-6 my-2">
                <label for="user_id" class="form-label">Tên người dùng: </label>
                <select name="user_id" id="user_id" class="form-select">
                    <option value="">Mặc định</option>
                </select>
            </div>
            <div class="col-md-6 my-2">
                <label for="name" class="form-label">Tiêu đề: </label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Mời bạn nhập tiêu đề liên hệ">
            </div>
            <div class="col-md-6 my-2">
                <label for="email" class="form-label">Email: </label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Mời bạn email liên hệ">
            </div>
            <div class="col-md-6 my-2">
                <label for="phone" class="form-label">Số điện thoại: </label>
                <input type="text" name="phone"  id="phone" class="form-control" placeholder="Mời bạn sdt liên hệ">
            </div>
            <div class="my-2">
                <label for="message" class="form-label">Thắc mắc: </label>
                <input type="text" name="message" id="message" class="form-control" placeholder="Mời bạn nhập lời nhắn">
            </div>
                <button type="submit" class="btn btn-outline-success">Thêm mới</button>
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
<script src="<?= $BASE_URL ?>View/Admin/assets/js/Contacts.js"></script>
</body>
</html>