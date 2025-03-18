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
                                <h5 class="m-b-10">Thêm sản phẩm</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php $BASE_URL ?>View/Admin/index.php">Trang
                                        Chủ</a></li>
                                <li class="breadcrumb-item" aria-current="page">Thêm sản phẩm</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="my-4">Thêm sản phẩm</h1>
            <form action="" id="frmcarts" method="POST" class="row g-3" enctype="multipart/form-data">
                <div class="my-2">
                    <label for="user_id" class="form-label">Tên người dùng : </label>
                    <select name="user_id" id="user_id" class="form-select">
                        <option value="">Mặc định</option>
                    </select>
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
    <script src="<?= $BASE_URL ?>View/Admin/assets/js/Carts.js"></script>
</body>

</html>