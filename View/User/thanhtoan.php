<?php
$BASE_URL = "./";
include $BASE_URL . "View/User/header.php";
?>

    <section class="thanhtoan-section custom-padding">
        <h2 style="margin-bottom:60px; margin-left:80px;">THANH TOÁN</h2>
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-lg-5 bg-dark-subtle rounded p-4">
                    <h4 class="fs-3 mb-3 text-dark">Thông tin thanh toán</h4>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" placeholder="Tên của bạn *:">
                        <label for="name" class="text-secondary">Tên của bạn*: </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="phone" placeholder="Số điện thoại">
                        <label for="phone" class="text-secondary">Số điện thoại*: </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" placeholder="Email*: ">
                        <label for="email" class="text-secondary">Email*: </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="address" placeholder="Địa chỉ*: ">
                        <label for="address" class="text-secondary">Địa chỉ*: </label>
                    </div>
                    <p class="text-dark">Thông tin bổ sung</p>
                    <p class="text-dark">Ghi chú đơn hàng (tùy chọn)</p>
                    <textarea class="form-control" id="messageContacts" placeholder="Nội dung*: ghi chú địa điểm cụ thể..." rows="2"></textarea>
                </div>

                <div class="col-lg-6 p-4 border border-light rounded">
                    <h4 class="fs-3 mb-4">Đơn hàng của bạn</h4>

                    <!-- donhang -->
                    <div class="donhang row gap-3">
                        <span class="text-white">Tên sản phẩm: Đàn Kalimba Gecko 8 Phím K8CA</span>

                        <span class="text-white">Số lượng: 01</span>

                        <span class="text-white">Phí giao hàng: 69.000₫</span>

                        <span class="text-white">Tổng tiền: 369.000₫ </span>
                        <hr class="mb-4">
                        Phương thức thanh toán:
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Thanh toán bằng tiền mặt
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Thanh toán qua tài khoản ngân hàng
                            </label>
                        </div>
                        <a role="button" href="#" class="btn btn-success mt-4">Đặt hàng</a>
                    </div>

                </div>
            </div>
        </div>

    </section>

<?php
include $BASE_URL . "View/User/footer.php"
?>