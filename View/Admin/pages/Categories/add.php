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
                                <h5 class="m-b-10">Thể loại</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="?role=admin&page=dashboard">Trang Chủ</a></li>
                                <li class="breadcrumb-item" aria-current="page">Thêm thể loại</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="my-4">Thêm thể loại</h1>
            <form class="row g-3" id="formAdd" method="post" enctype="multipart/form-data">
                <div class="col-md-6 my-2">
                    <label for="name" class="form-label">Tên thể loại</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-6 my-2">
                    <label for="description" class="form-label">Miêu tả</label>
                    <input type="text" class="form-control" id="description" name="description" required>
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
    <script src="<?= $BASE_URL ?>View/Admin/assets/js/Categories.js"></script>

</body>

</html>