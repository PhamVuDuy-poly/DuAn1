<?php $BASE_URL = "./"; ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <?php
    include $BASE_URL . "View/Admin/components/head-page-meta.php";
    include $BASE_URL . "View/Admin/components/head-css.php"
    ?>
    <script src="<?= $BASE_URL ?>JS/Validate.js"></script>
</head>

<body>
    <?php include $BASE_URL . "/View/Admin/components/layout-vertical.php" ?>
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Khuyến mãi</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?role=admin&page=dashboard">Trang Chủ</a></li>
                                <li class="breadcrumb-item" aria-current="page">Thêm khuyến mãi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="my-4">Thêm khuyến mãi</h1>
            <form class="row g-3" id="formAdd" method="post" enctype="multipart/form-data">
                <div class="col-md-6 my-2">
                    <label for="code" class="form-label">Mã khuyến mãi</label>
                    <input type="text" class="form-control" id="code" name="code" required>
                </div>
                <div class="col-md-6 my-2">
                    <label for="discount" class="form-label">Giảm giá</label>
                    <input type="number" class="form-control" id="discount" name="discount" required>
                </div>
                <div class="col-md-6 my-2">
                    <label for="start_date" class="form-label">Ngày bắt đầu</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="col-md-6 my-2">
                    <label for="end_date" class="form-label">Ngày kết thúc</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <div class="col-md-12 my-2">
                    <label for="usage_limit" class="form-label">Giới hạn sử dụng</label>
                    <input type="number" class="form-control" id="usage_limit" name="usage_limit" required>
                </div>
                <button class="btn btn-primary" type="submit">Gửi</button>

                <div class="col-12 d-none mx-3" id="alert" role="alert">

                </div>
            </form>
        </div>
    </div>
    <?php
    include $BASE_URL . "View/Admin/components/footer-block.php";
    include $BASE_URL . "View/Admin/components/footer-js.php"
    ?>
    <script src="<?= $BASE_URL ?>View/Admin/assets/js/Promotions.js"></script>

</body>

</html>