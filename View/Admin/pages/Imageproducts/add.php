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
                            <h5 class="m-b-10">Ảnh sản phẩm</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?role=admin&page=dashboard">Trang Chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Thêm ảnh</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Thêm ảnh sản phẩm</h1>
        <form class="row g-3" id="formAdd" method="post" enctype="multipart/form-data">
            <div class="col-12">
                <label for="product_id " class="form-label">Sản phẩm</label>
                <select name="product_id" class="form-select" id="product_id">
                    <option value="">Mặc định</option>
                </select>
            </div>
            <div class="col-12">
                <label for="album" class="form-label">Ảnh sản phẩm</label>
                <input type="file" class="form-control" id="album" name="album[]" multiple  required>
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
            <div class="col-md-6">
                <label for="location" class="form-label">Vị trí hiển thị</label>
                <select name="location" class="form-select" id="location">
                    <option value="1">Trang sản phẩm</option>
                    <option value="0">Trang chủ</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="status" class="form-label">Trạng thái</label>
                <select name="status" class="form-select" id="status">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
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
<script src="<?= $BASE_URL ?>View/Admin/assets/js/Imageproducts.js"></script>
</body>
</html>