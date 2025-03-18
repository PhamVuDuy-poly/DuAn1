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

<div class="pc-container pb-1">
    <div class="modal fade show position-fixed" id="modal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa liên hệ</h1>
                    <button type="button" class="btn-close button-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="formEdit" method="post" enctype="multipart/form-data">
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
                            <h5 class="m-b-10">liên hệ</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?role=admin&page=dashboard">Trang Chủ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Danh sách liên hệ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Danh sách liên hệ</h1>
        <div class="table-responsive" id="view">
            <table class="table table-hover table-striped table-bordered border-light text-center">
                <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề liên hệ</th>
                    <th>Tiêu đề</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Thắc mắc</th>
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
<script src="<?= $BASE_URL ?>View/Admin/assets/js/mainContacts.js"></script>
</body>
</html>