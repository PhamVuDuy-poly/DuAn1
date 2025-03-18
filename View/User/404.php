<?php
    $BASE_URL = "./";
    include $BASE_URL . "View/User/header.php";
?>
<section class="custom-section-bg text-white" style="z-index: 1">
  <div class="color-cover custom-padding">
    <div class="container">
      <h1
        data-aos="fade-up"
        class="font-krona-one font-size-404 text-uppercase text-center">
        404
      </h1>
      <p
        data-aos="fade-up"
        data-aos-delay="200"
        class="sub-text-medium font-krona-one text-center text-uppercase">
        LỖI TRANG
      </p>
      <p
        data-aos="fade-up"
        data-aos-delay="300"
        class="sub-text-medium text-center">
        Trang bạn đang cố gắng truy cập không tồn tại hoặc đã bị xóa, di chuyển hoặc chưa được tạo ra.
      </p>

      <div
        data-aos="fade-up"
        data-aos-delay="400"
        class="d-flex justify-content-center mt-4">
        <a
          href="Home1.php"
          class="btn-standar button-padding font-krona-one d-flex align-items-center border-0 text-decoration-none">
          <p class="mb-0 me-3">Trang Chủ</p>
          <i class="fa-solid fa-arrow-right" style="color: #232520"></i>
        </a>
      </div>
    </div>
  </div>
</section>
<?php
    include $BASE_URL . "View/User/footer.php"
?>