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
                            <h5 class="m-b-10">Sản phẩm</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?role=admin&page=dashboard">Trang Chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Thêm sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Thêm sản phẩm</h1>
        <form class="row g-3" id="formAdd" method="post" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-md-6">
                <label for="brand" class="form-label">Nhãn hàng</label>
                <input type="text" class="form-control" id="brand" name="brand" required>
            </div>
            <div class="col-md-6">
                <label for="stock_quantity" class="form-label">Tổng số lượng</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity" required>
            </div>
            <div class="col-md-6">
                <label for="status" class="form-label">Trạng thái</label>
                <select name="status" class="form-select" id="status">
                    <option value="1">Còn hàng</option>
                    <option value="0">Hết hàng</option>
                </select>
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" rows="5" id="description" name="description" required></textarea>
            </div>
            <div class="col-md-6">
                <label for="album" class="form-label">Ảnh sản phẩm</label>
                <input type="file" class="form-control" id="album" name="album[]" multiple  required>
            </div>
            <div class="col-md-6">
                <label for="statusImage" class="form-label">Trạng thái hình ảnh</label>
                <select name="statusImage" class="form-select" id="statusImage">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <div class="col-12">
                <div style="width: 400px; height: 200px" class="d-none" id="frameImageView">
                    <div id="ImageUpload" class="carousel carousel-dark slide pb-2">
                        <div class="carousel-indicators" id="frameButtonSlide">
                        </div>
                        <div class="carousel-inner rounded" id="frameImageSlide" style="width: 400px; height: 200px">
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#ImageUpload" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Trước</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#ImageUpload" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Sau</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <label for="countVariants" class="form-label">Biến thể sản phẩm</label>
                <input type="number" class="form-control" id="countVariants" name="countVariants" value="0" required>
            </div>
            <div class="col-12 row p-2 g-3" id="frameVariants">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
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
<script src="<?= $BASE_URL ?>View/Admin/assets/js/Products.js"></script>
</body>
</html>