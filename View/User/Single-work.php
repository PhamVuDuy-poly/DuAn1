<?php
$BASE_URL = "./";
include $BASE_URL . "View/User/header.php";
?>

    <style>
        .border-custom{
            border-color: #c4fb6d !important;
        }
        #addon-wrapping:hover{
            background-color: #c4fb6d;
            color: #fff;
        }
        a{
            text-decoration: none;
            color: black;
        }
        a:hover{
            color: darkorange;
        }
    </style>
    <body>
    <section class="bg-primary-custom custom-padding h-full w-200" style="z-index: 1">
        <div class="container-fluid ">
            <h2 class="transition-fade-left text-white font-krona-one hero-text mb-0 d-flex justify-content-center">Đơn hàng</h2>
            <hr class="border border-primary-subtle border-2 opacity-75">

                <h2 class="mb-4">Danh sách đơn hàng</h2>
                <table class="table table-bordered border-custom text-striped  table-hover text-center table-success table-responsive align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Tổng tiền</th>
                        <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>#DH001</td>
                        <td>Kalimba 17 phím gỗ Mahogany</td>
                        <td>500,000 VND</td>
                        <td>1</td>
                        <td>Đang xử lý</td>
                        <td>500,000 VND</td>
                        <td><button class="btn btn-primary btn-sm">Chi tiết</button></td>
                    </tr>
                    <tr>
                        <td>#DH002</td>
                        <td>Kalimba 21 phím cao cấp</td>
                        <td>750,000 VND</td>
                        <td>2</td>
                        <td>Hoàn thành</td>
                        <td>1,500,000 VND</td>
                        <td><button class="btn btn-primary btn-sm">Chi tiết</button></td>
                    </tr>
                    <tr>
                        <td>#DH003</td>
                        <td>Kalimba Acrylic trong suốt</td>
                        <td>900,000 VND</td>
                        <td>1</td>
                        <td>Đang giao hàng</td>
                        <td>900,000 VND</td>
                        <td><button class="btn btn-primary btn-sm">Chi tiết</button></td>
                    </tr>
                    <tr>
                        <td>#DH004</td>
                        <td>Kalimba 10 phím cho người mới bắt đầu</td>
                        <td>300,000 VND</td>
                        <td>3</td>
                        <td>Hoàn thành</td>
                        <td>900,000 VND</td>
                        <td><button class="btn btn-primary btn-sm">Chi tiết</button></td>
                    </tr>
                    <tr>
                        <td>#DH005</td>
                        <td>Kalimba 17 phím khắc họa tiết</td>
                        <td>600,000 VND</td>
                        <td>2</td>
                        <td>Đã hủy</td>
                        <td>1,200,000 VND</td>
                        <td><button class="btn btn-primary btn-sm">Chi tiết</button></td>
                    </tr>
                    <tr>
                        <td>#DH006</td>
                        <td>Kalimba Gecko K17</td>
                        <td>650,000 VND</td>
                        <td>1</td>
                        <td>Đang xử lý</td>
                        <td>650,000 VND</td>
                        <td><button class="btn btn-primary btn-sm">Chi tiết</button></td>
                    </tr>
                    <tr>
                        <td>#DH007</td>
                        <td>Kalimba 17 phím gỗ tre</td>
                        <td>550,000 VND</td>
                        <td>1</td>
                        <td>Hoàn thành</td>
                        <td>550,000 VND</td>
                        <td><button class="btn btn-primary btn-sm">Chi tiết</button></td>
                    </tr>
                    <tr>
                        <td>#DH008</td>
                        <td>Kalimba 15 phím mini</td>
                        <td>400,000 VND</td>
                        <td>2</td>
                        <td>Đang giao hàng</td>
                        <td>800,000 VND</td>
                        <td><button class="btn btn-primary btn-sm">Chi tiết</button></td>
                    </tr>
                    <tr>
                        <td>#DH009</td>
                        <td>Kalimba DIY tự lắp ráp</td>
                        <td>350,000 VND</td>
                        <td>1</td>
                        <td>Đã hủy</td>
                        <td>350,000 VND</td>
                        <td><button class="btn btn-primary btn-sm">Chi tiết</button></td>
                    </tr>
                    <tr>
                        <td>#DH010</td>
                        <td>Kalimba 21 phím khắc tên</td>
                        <td>800,000 VND</td>
                        <td>1</td>
                        <td>Đang xử lý</td>
                        <td>800,000 VND</td>
                        <td><button class="btn btn-primary btn-sm">Chi tiết</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>

    </section>
    </body>

<?php
include $BASE_URL . "View/User/footer.php"
?>