<?php $BASE_URL = "./" ?>
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
<?php include $BASE_URL . "View/Admin/components/layout-vertical.php" ?>
<div class="pc-container pb-3">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Sản phẩm biến thể</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?role=admin&page=dashboard">Trang Chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Thêm biến thể</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Thêm sản phẩm biến thể</h1>
        <form class="row g-3" id="formAdd" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="product_id " class="form-label">Tên sản phẩm</label>
                <select name="product_id" class="form-select" id="product_id">
                    <option value="">Mặc định</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="material" class="form-label">Chất liệu</label>
                <input type="text" class="form-control" id="material" name="material" required>
            </div>
            <div class="col-md-6">
                <label for="color" class="form-label">Màu sắc</label>
                <input type="text" class="form-control" id="color" name="color" required>
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">Giá</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="col-md-6">
                <label for="price_reduced" class="form-label">Giá đã giảm</label>
                <input type="number" class="form-control" id="price_reduced" name="price_reduced" required>
            </div>
            <div class="col-md-6">
                <label for="stock_quantity" class="form-label">Số lượng hàng</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
            </div>
            <div class="col-md-6">
                <label for="start_at" class="form-label">Thời gian bắt đầu giảm giá</label>
                <input type="date" class="form-control" id="start_at" name="start_at">
            </div>
            <div class="col-md-6">
                <label for="end_at" class="form-label">Thời gian hết giảm giá</label>
                <input type="date" class="form-control" id="end_at" name="end_at">
            </div>
            <div class="col-12">
                <label for="status" class="form-label">Trạng thái</label>
                <select name="status" class="form-select" id="status">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Thêm biến thể</button>
            </div>
            <div class="col-12 d-none mx-3" id="alert" role="alert">

            </div>
        </form>
    </div>
</div>
<?php
    include $BASE_URL . "View/Admin/components/footer-block.php";
    include $BASE_URL . "View/Admin/components/footer-js.php"
?>
<script src="<?= $BASE_URL ?>View/Admin/assets/js/Productvariants.js"></script>
</body>
</html>