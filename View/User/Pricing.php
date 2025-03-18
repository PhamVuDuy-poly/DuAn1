<?php
$BASE_URL = "./";
include $BASE_URL . "View/User/header.php";
?>
    <style>
        .border-custom{
            border-color: #c4fb6d !important;
        }
        #addon-wrapping:hover{
            background-color: orange;
            color: #fff;
        }
    </style>
    <body>
    <section class="bg-primary-custom custom-padding h-full w-100" style="z-index: 1">
        <div class="container-fluid">
            <h2 class="transition-fade-left text-white font-krona-one border-text hero-text mb-0 d-flex justify-content-center">GIỎ HÀNG</h2>
            <hr class="border border-custom border-2 opacity-75">
            <!-- Thông báo -->
            <div class=" alert">
                <strong>“Đàn Kalimba Gecko 17 Phím K17CAP (Gỗ Long Não – Tone C hoặc B tùy chọn)”</strong> đã được thêm vào giỏ hàng.
            </div>

            <!-- Giỏ hàng -->
            <div class="row justify-content-center" >
                <!-- Danh sách sản phẩm -->
                <div class="col-md-8 border-custom">
                    <h5 class="mb-4">GIỎ HÀNG</h5>
                    <table class="table table-striped text-center align-middle" >
                        <thead class="table-light align-middle">
                        <tr>
                            <th>ẢNH</th>
                            <th>SẢN PHẨM</th>
                            <th>GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>TỔNG</th>
                            <th>THAO TÁC</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="color: darkblue"><img src="./assets/image/01.jpg" alt="Sản phẩm" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td style="color: white" >Đàn Kalimba Gecko 10 Phím K10B (Gỗ Bạch Dương – Mbira Thumb Finger Piano 10 Keys)</td>
                            <td style="color: white">4.900.000₫</td>
                            <td>
                                <input type="number" class="form-control text-center" value="1" min="1" style="width: 80px;">
                            </td>
                            <td style="color: white">4.900.000₫</td>
                            <td><button class="btn btn-danger btn-sm">Xóa</button></td>
                        </tr>
                        <tr>
                            <td style="color: darkblue"><img src="./assets/image/01.jpg" alt="Sản phẩm" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td>Đàn Kalimba Gecko 17 Phím K17CAP (Gỗ Long Não – Tone C hoặc B tùy chọn)</td>
                            <td>4.000.000₫</td>
                            <td>
                                <input type="number" class="form-control text-center" value="1" min="1" style="width: 80px;">
                            </td>
                            <td>4.000.000₫</td>
                            <td><button class="btn btn-danger btn-sm">Xóa</button></td>
                        </tr>

                        <tr>
                            <td colspan="6">
                                <nav class="navbar bg-body-tertiary">
                                    <div class="container-fluid">
                                        <div>
                                            <button class="btn btn-primary">Tiếp tục mua hàng</button>
                                            <button class="btn btn-secondary">Xóa hết</button>
                                            <button class="btn btn-warning">Cập nhật</button>
                                        </div>
                                        <div class="d-flex">
                                            <span class="input-group">
                                                 <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                                <button class="btn btn-warning" type="submit">Áp dụng</button>
                                            </span>
                                        </div>

                                    </div>
                                </nav>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Tổng giỏ hàng -->
                <div class="col-md-2">
                    <h5 class="mb-4">CỘNG GIỎ HÀNG</h5>
                    <div class="card border bg-white ">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between mb-5">
                                <span>Tổng đơn:</span>
                                <strong>4.900.000₫</strong>
                            </div>
                            <button class="btn btn-warning w-100">TIẾN HÀNH THANH TOÁN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    </body>



<?php
include $BASE_URL . "View/User/footer.php"
?>