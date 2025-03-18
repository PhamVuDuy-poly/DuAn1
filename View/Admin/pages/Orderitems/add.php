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
                            <h5 class="m-b-10">Thêm Đơn hàng</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php $BASE_URL ?> View/Admin/index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Thêm chi tiết đơn hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Thêm đơn chi tiết hàng mới</h1>
        <form action="" id="formAdd" method="POST" class="row g-3" enctype="multipart/form-data">
            <div class="col-md-6 my-2">
                <label for="order_id" class="form-label">Trạng thái đơn hàng: </label>
                <select name="order_id" id="order_id" class="form-select">
                    <option value="">Mặc định</option>
                </select>
            </div>
            <div class="col-md-6 my-2">
                <label for="product_id" class="form-label">Tên sản phẩm: </label>
                <select name="product_id" id="product_id" class="form-select">
                    <option value="">Mặc định</option>
                </select>
            </div>

<!--            Rút ngắn văn bản = '...' với fix độ dài mặc định-->
<!--            <div class="text-truncate" style="width: 200px;">-->
<!--                Đây là một đoạn văn bản rất dài sẽ bị cắt ngắn và hiển thị bằng dấu ba chấm nếu nó vượt quá chiều rộng của khối này.-->
<!--            </div>-->

            <div class="my-2">
                <label for="quantity" class="form-label">Số lượng: </label>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Mời bạn tổng số lương:">
            </div>
            <div class="my-2">
                <label for="price" class="form-label">Giá: </label>
                <input type="number" name="price" id="price" class="form-control" placeholder="Mời bạn tổng giá:">
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
<script src="<?= $BASE_URL ?>View/Admin/assets/js/Orderitems.js"></script>
</body>
</html>