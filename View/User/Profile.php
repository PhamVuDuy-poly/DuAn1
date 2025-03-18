<?php
$BASE_URL = "./";
include $BASE_URL . "View/User/header.php";
?>
<script  src="<?= $BASE_URL ?>JS/Validate.js"></script>
<script src="<?= $BASE_URL ?>View/User/dist/js/Profile.js"></script>
<!-- Expertise Section -->
<section class="bg-hero text-white px-2 px-lg-0">
    <div class="color-cover custom-padding">
        <h2 data-aos="fade-up" class="text-light font-krona-one border-text border-info hero-text mb-2 text-center" style="--secondary-color: #ff0077">
            Thông tin tài khoản
        </h2>
        <div class="container">
            <div class="row align-items-center justify-content-between mt-5">
                <!-- Form bên trái -->
                <div class="col-lg-6">
                    <form class="row g-3" id="formAdd" method="post" enctype="multipart/form-data">

                            <!-- Cột thứ nhất -->
                                <!--<div class="my-2 col-md-6">
                                    <label for="disabledTextInput" class="form-label">Tên đăng nhập:</label>
                                    <input disabled type="text" id="name" name="name" class="form-control">
                                </div>-->
                                <div class="my-2 col-md-6">
                                    <label for="name" class="form-label">Họ tên: </label>
                                    <input type="text" disabled name="name" id="name" class="form-control">
                                </div>
                                <div class="my-2 col-md-6">
                                    <label for="email" class="form-label">Email: </label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <!--<div class="my-2 col-md-6">
                                    <label for="password" class="form-label">Mật khẩu: </label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>-->
                                <div class="my-2 col-md-6">
                                    <label for="phone" class="form-label">SDT: </label>
                                    <input type="number" name="phone" id="phone" class="form-control">
                                </div>

                            <!-- Cột thứ hai -->
                                <div class="my-2 col-md-6">
                                    <label for="address" class="form-label">Địa chỉ: </label>
                                    <input type="text" name="address" id="address" class="form-control">
                                </div>
                                <div class="my-2 col-md-6">
                                    <label for="bio" class="form-label">Mô tả cá nhân: </label>
                                    <input type="text" name="bio" id="bio" class="form-control" >
                                </div>
                                <div class="my-2 col-md-6">
                                    <label for="avatar" class="form-label">Avatar: </label>
                                    <input type="file" name="avatar" id="avatar" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="updated_at" class="form-label">Ngày tạo TK: </label>
                                    <input disabled type="date" class="form-control" name="created_at" id="created_at">
                                </div>
                                <div class=" col-md-6">
                                    <label for="role_id" class="form-label">Vai trò: </label>
                                    <input disabled type="text" class="form-control" name="role_id" id="role_id">
                                </div>
                            <div class="justify-content-lg-center mb-4">
                                <button type="submit" class="btn btn-primary" >Cập nhật</button>
                                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                <button type="submit" class="btn btn-primary">Trang Chủ</button>
                            </div>
                        <div
                                class="alert my-3"
                                style="color: black"
                                role="alert"
                                id="alert"
                                aria-live="assertive">
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 image-position-experience">
                        <img class="rounded-circle" src="" id="img" style="height: 400px; width: 500px" alt>
                </div>

                <!-- Hình ảnh bên phải -->
                <!--<div class="col-lg-6 position-relative box-image-experience">
                    <div data-aos="fade-up" class="image-position-experience-2">
                        <img src="assets/image/28.jpg" class="img-1 w-100" alt="" />
                    </div>
                    <div data-aos="fade-right" class="image-position-experience-1">
                        <img src="assets/image/13.jpg" class="img-2 w-100" alt="" />
                    </div>
                    <div data-aos="fade-right" class="image-position-experience-3">
                        <img src="assets/image/image222.webp" class="img-3 w-100" alt="" />
                    </div>
                </div>-->
            </div>
            </div>
    </div>
</section>

<!-- Our Works -->
<!--<section class="custom-padding-half">
    <div class="container">
        <div data-aos="fade-up" class="row text-center g-4 mt-4">
            <div class="col-md-4">
                <div class="box-img">
                    <img src="assets/image/11.webp" class="w-100" alt="" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-img">
                    <img src="assets/image/6.jpg" class="w-100" alt="" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-img">
                    <img src="assets/image/20.jpg" class="w-100" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>-->

<?php
include $BASE_URL . "View/User/footer.php";
?>
