<?php
$BASE_URL = "./";
include $BASE_URL . "View/User/header.php";
?>
    <script src="<?php $BASE_URL ?>JS/WebHistory.js"></script>
    <script src="<?php $BASE_URL ?>View/User/dist/js/UserProducts.js"></script>

    <body>
    <section class="bg-hero h-full w-100" style="z-index: 1">
        <div class="container py-4">


            <!-- Tiêu đề -->
            <h2 class="transition-fade-left text-white font-krona-one border-text hero-text mb-0 d-flex justify-content-center">SẢN PHẨM</h2>
            <!-- Thanh tìm kiếm và bộ lọc -->
            <div class="d-flex justify-content-between mb-4 me-3">
                <!-- Tìm kiếm -->
                <nav class="navbar w-50 h-50">
                    <form class="w-75 h-75">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            <span class="input-group-text" role="button" id="basic-addon1"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></span>
                        </div>
                    </form>
                </nav>
                <!-- Bộ lọc -->
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <label class="form-label mb-0 me-2">Bộ lọc:</label>
                        <select class="form-select d-inline-block w-auto">
                            <option value="">Chọn</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label mb-0 me-2">Sắp xếp:</label>
                        <select class="form-select d-inline-block w-auto">
                            <option value="">Chọn</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Sidebar và danh sách sản phẩm -->
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="text-black p-2 mb-3 rounded" style="background-color: #c4fb6d">DANH MỤC</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#" class="text-decoration-none">Đàn Kalimba Hộp</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none">Đàn Kalimba Treels</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none">Đàn Kalimba Hluru</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none">Phụ kiện</a></li>
                    </ul>
                </div>

                <!-- Danh sách sản phẩm -->
                <div class="col-md-9">
                    <div class="row">
                        <!-- Sản phẩm 1 -->
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 1">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 001</p>
                                    <p class="card-text">Đàn Kalimba Hộp</p>
                                    <p class="card-text text-danger fw-bold">500.000đ</p>
                                </div>
                            </div>
                        </div>
                        <!-- Sản phẩm 2 -->
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 2">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 002</p>
                                    <p class="card-text">Đàn Kalimba Treels</p>
                                    <p class="card-text text-danger fw-bold">400.000đ</p>
                                </div>
                            </div>
                        </div>
                        <!-- Sản phẩm 3 -->
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 3">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 003</p>
                                    <p class="card-text">Đàn Kalimba Hluru</p>
                                    <p class="card-text text-danger fw-bold">600.000đ</p>
                                </div>
                            </div>
                        </div>
                        <!-- Sản phẩm 4 -->
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 4">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 004</p>
                                    <p class="card-text">Phụ kiện Kalimba</p>
                                    <p class="card-text text-danger fw-bold">100.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 4">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 005</p>
                                    <p class="card-text">Phụ kiện Kalimba</p>
                                    <p class="card-text text-danger fw-bold">100.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 4">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 006</p>
                                    <p class="card-text">Phụ kiện Kalimba</p>
                                    <p class="card-text text-danger fw-bold">100.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 4">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 007</p>
                                    <p class="card-text">Phụ kiện Kalimba</p>
                                    <p class="card-text text-danger fw-bold">100.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 4">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 007</p>
                                    <p class="card-text">Phụ kiện Kalimba</p>
                                    <p class="card-text text-danger fw-bold">100.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 4">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 008</p>
                                    <p class="card-text">Phụ kiện Kalimba</p>
                                    <p class="card-text text-danger fw-bold">100.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 4">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 009</p>
                                    <p class="card-text">Phụ kiện Kalimba</p>
                                    <p class="card-text text-danger fw-bold">100.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 4">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 010</p>
                                    <p class="card-text">Phụ kiện Kalimba</p>
                                    <p class="card-text text-danger fw-bold">100.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 mb-4">
                            <div class="card border border-light px-2 py-2 bg-white">
                                <img src="./assets/image/01.jpg" class="card-img-top" alt="Sản phẩm 4">
                                <div class="card-body text-center">
                                    <p class="card-text">Mã: 011</p>
                                    <p class="card-text">Phụ kiện Kalimba</p>
                                    <p class="card-text text-danger fw-bold">100.000đ</p>
                                </div>
                            </div>
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