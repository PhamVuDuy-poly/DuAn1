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
<div class="pc-container pb-1">
    <div class="modal fade show position-fixed" id="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa biến thể</h1>
                    <button type="button" class="btn-close button-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="formEdit" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <label for="product_id" class="form-label">Tên sản phẩm</label>
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
                            <h5 class="m-b-10">Sản phẩm biến thể</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?role=admin&page=dashboard">Trang Chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Danh sách biến thể</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Danh sách sản phẩm biến thể</h1>
        <div class="table-responsive" id="view">
            <table class="table table-hover table-striped table-bordered border-light text-center">
                <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Chất liệu</th>
                    <th>Màu sắc</th>
                    <th>Giá sản phẩm hiện tại</th>
                    <th>Giá sản phẩm đã giảm</th>
                    <th>Số lượng</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
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
<script src="<?= $BASE_URL ?>View/Admin/assets/js/mainProductvariants.js"></script>
</body>
</html>