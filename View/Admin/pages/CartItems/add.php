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
    <?php include $BASE_URL . "View/Admin/components/layout-vertical.php" ?>
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Thêm chi tiết sản phẩm</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php $BASE_URL ?>View/Admin/index.php">Trang
                                        Chủ</a></li>
                                <li class="breadcrumb-item" aria-current="page">Thêm chi tiết sản phẩm</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="my-4">Thêm chi tiết sản phẩm</h1>
            <form action="" id="frmcartitems" method="POST" class="row g-3" enctype="multipart/form-data">
                <div class="col-md-6 my-2">
                    <label for="cart_id" class="form-label"> Ngày tạo loại hàng: </label>
                    <select name="cart_id" id="cart_id" class="form-select">
                        <option value="">Mặc định</option>
                    </select>
                </div>
                <div class="col-md-6 my-2">
                    <label for="product_id" class="form-label">Tên sản phẩm :</label>
                    <select name="product_id" id="product_id" class="form-select">
                        <option value="">Mặc định</option>
                    </select>
                </div>
                
                <div class="col-md-6 my-2">
                    <label for="quantity" class="form-label">Số lượng :</label>
                    <input type="number" name="quantity" id="quantity" class="form-control"
                        placeholder="Nhập số lượng">
                </div>
                <div class="col-md-6 my-2">
                    <label for="price" class="form-label">Giá tiền :</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Nhập giá tiền">
                </div>

                <button type="submit" class="btn btn-outline-success">Thêm mới</button>
                <div class=" d-none my-3 alert" role="alert" id="alert"></div>
        </div>
        </form>
    </div>
    </div>
    <?php
    include $BASE_URL . "View/Admin/components/footer-block.php";
    include $BASE_URL . "View/Admin/components/footer-js.php"
        ?>
    <script src="<?= $BASE_URL ?>View/Admin/assets/js/CartItems.js"></script>
</body>

</html>