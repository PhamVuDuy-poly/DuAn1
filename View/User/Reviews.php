<?php
$BASE_URL = "./";
include $BASE_URL . "View/User/header.php";
?>

    <!-- Reviews Section -->
    <section
            class="reviews-section bg-secondary-opacity-custom"
            style="z-index: 1">
        <div class="container-fluid overflow-hidden p-0">
            <div class="row align-items-center">
                <!-- left image -->
                <div data-aos="fade-right" class="col-lg-6 pe-0">
                    <img
                            src="assets/image/26-1.webp"
                            class="img-fluid"
                            alt="Product Image" />
                </div>

                <!-- review Slider -->
                <div class="col-lg-6 pe-0 review-ps-custom" style="width: 570px">
                    <div
                            id="reviewCarousel"
                            class="carousel slide"
                            data-bs-ride="carousel"
                            data-bs-interval="3000">
                        <div class="carousel-inner">
                            <!-- Review 1 -->
                            <div class="carousel-item active">
                                <div class="review-box p-4">
                                    <h2
                                            data-aos="fade-left"
                                            class="text-uppercase text-light mb-3 font-krona-one h2-text">
                                        Reviews
                                    </h2>
                                    <div data-aos="fade-up" class="mb-2">
                                        <span class="text-warning tracking-wider">★ ★ ★ ★ ★</span>
                                    </div>
                                    <p
                                            data-aos="fade-up"
                                            class="text-light mb-4 sub-text-medium tracking-wider">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Ut elit tellus, luctus nec ullamcorper mattis, pulvinar
                                        dapibus leo.
                                    </p>
                                    <div data-aos="fade-up" class="d-flex align-items-center">
                                        <img
                                                src="assets/image/profile.webp"
                                                class="rounded-circle me-3"
                                                alt="Reviewer"
                                                width="50"
                                                height="50" />
                                        <div
                                                data-aos="fade-up"
                                                class="d-flex justify-content-between align-items-center w-100">
                                            <div>
                                                <p class="mb-0 font-krona-one fw-light">
                                                    Mike Lewis<br />
                                                </p>
                                                <p class="text-secondary-color mb-0">Twitter</p>
                                            </div>
                                            <img src="assets/icons/IconBacktik.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Review 2 -->
                            <div class="carousel-item">
                                <div class="review-box p-4">
                                    <h2
                                            data-aos="fade-left"
                                            class="text-uppercase text-light mb-3 font-krona-one h2-text">
                                        Reviews
                                    </h2>
                                    <div data-aos="fade-up" class="mb-2">
                                        <span class="text-warning tracking-wider">★ ★ ★ ★ ★</span>
                                    </div>
                                    <p
                                            data-aos="fade-up"
                                            class="text-light mb-4 sub-text-medium tracking-wider">
                                        Another review content goes here. Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit.
                                    </p>
                                    <div data-aos="fade-up" class="d-flex align-items-center">
                                        <img
                                                src="assets/image/profile.webp"
                                                class="rounded-circle me-3"
                                                alt="Reviewer"
                                                width="50"
                                                height="50" />
                                        <div
                                                data-aos="fade-up"
                                                class="d-flex justify-content-between align-items-center w-100">
                                            <div>
                                                <p class="mb-0 font-krona-one fw-light">
                                                    Jane Doe<br />
                                                </p>
                                                <p class="text-secondary-color mb-0">Twitter</p>
                                            </div>
                                            <img src="assets/icons/IconBacktik.png" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-works-section custom-padding">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-6">
                    <h2 data-aos="fade-up" class="h2-text font-krona-one">
                        WHAT THEY SAID
                    </h2>
                </div>
                <div class="col-lg-6">
                    <p data-aos="fade-up" class="text-light">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                        tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                    </p>
                    <a
                            data-aos="fade-up"
                            data-aos-delay="300"
                            href="Services.html"
                            class="text-secondary-color text-decoration-none text-uppercase font-krona-one button-text mt-3">
                        <span class="me-2 text-uppercase">all services</span>
                        <i class="fa-solid fa-arrow-right" style="color: #c4fb6d"></i>
                    </a>
                </div>
            </div>

            <div class="row justify-content-between mt-5">
                <div data-aos="fade-up" class="col-lg-custome mb-4">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                        tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                    </p>
                    <div class="d-flex align-items-center">
                        <img
                                src="assets/image/profile.webp"
                                class="rounded-circle me-3"
                                alt="Reviewer"
                                width="50"
                                height="50" />
                        <div
                                class="d-flex justify-content-between align-items-center w-100">
                            <div>
                                <p class="mb-0 font-krona-one fw-light">Mike Lewis<br /></p>
                                <p class="text-secondary-color mb-0">Twitter</p>
                            </div>
                            <!-- <img src="./assets/icons/IconBacktik.png" alt="" /> -->
                        </div>
                    </div>
                </div>
                <div
                        data-aos="fade-up"
                        data-aos-delay="200"
                        class="col-lg-custome mb-4">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                        tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                    </p>
                    <div class="d-flex align-items-center">
                        <img
                                src="assets/image/profile.webp"
                                class="rounded-circle me-3"
                                alt="Reviewer"
                                width="50"
                                height="50" />
                        <div
                                class="d-flex justify-content-between align-items-center w-100">
                            <div>
                                <p class="mb-0 font-krona-one fw-light">Mike Lewis<br /></p>
                                <p class="text-secondary-color mb-0">Twitter</p>
                            </div>
                            <!-- <img src="./assets/icons/IconBacktik.png" alt="" /> -->
                        </div>
                    </div>
                </div>
                <div
                        data-aos="fade-up"
                        data-aos-delay="300"
                        class="col-lg-custome mb-4">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                        tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                    </p>
                    <div class="d-flex align-items-center">
                        <img
                                src="assets/image/profile.webp"
                                class="rounded-circle me-3"
                                alt="Reviewer"
                                width="50"
                                height="50" />
                        <div
                                class="d-flex justify-content-between align-items-center w-100">
                            <div>
                                <p class="mb-0 font-krona-one fw-light">Mike Lewis<br /></p>
                                <p class="text-secondary-color mb-0">Twitter</p>
                            </div>
                            <!-- <img src="./assets/icons/IconBacktik.png" alt="" /> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between mt-lg-3">
                <div data-aos="fade-up" class="col-lg-custome mb-4">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                        tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                    </p>
                    <div class="d-flex align-items-center">
                        <img
                                src="assets/image/profile.webp"
                                class="rounded-circle me-3"
                                alt="Reviewer"
                                width="50"
                                height="50" />
                        <div
                                class="d-flex justify-content-between align-items-center w-100">
                            <div>
                                <p class="mb-0 font-krona-one fw-light">Mike Lewis<br /></p>
                                <p class="text-secondary-color mb-0">Twitter</p>
                            </div>
                            <!-- <img src="./assets/icons/IconBacktik.png" alt="" /> -->
                        </div>
                    </div>
                </div>
                <div
                        data-aos="fade-up"
                        data-aos-delay="200"
                        class="col-lg-custome mb-4">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                        tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                    </p>
                    <div class="d-flex align-items-center">
                        <img
                                src="assets/image/profile.webp"
                                class="rounded-circle me-3"
                                alt="Reviewer"
                                width="50"
                                height="50" />
                        <div
                                class="d-flex justify-content-between align-items-center w-100">
                            <div>
                                <p class="mb-0 font-krona-one fw-light">Mike Lewis<br /></p>
                                <p class="text-secondary-color mb-0">Twitter</p>
                            </div>
                            <!-- <img src="./assets/icons/IconBacktik.png" alt="" /> -->
                        </div>
                    </div>
                </div>
                <div
                        data-aos="fade-up"
                        data-aos-delay="300"
                        class="col-lg-custome mb-4">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                        tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                    </p>
                    <div class="d-flex align-items-center">
                        <img
                                src="assets/image/profile.webp"
                                class="rounded-circle me-3"
                                alt="Reviewer"
                                width="50"
                                height="50" />
                        <div
                                class="d-flex justify-content-between align-items-center w-100">
                            <div>
                                <p class="mb-0 font-krona-one fw-light">Mike Lewis<br /></p>
                                <p class="text-secondary-color mb-0">Twitter</p>
                            </div>
                            <!-- <img src="./assets/icons/IconBacktik.png" alt="" /> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 10 CTA -->
    <section class="container custom-padding-cta">
        <div class="bg-img-c">
            <div class="color-cover">
                <!-- Row -->
                <div class="row d-flex align-items-center py-4 py-lg-0 h-100">
                    <!-- Col 1 -->
                    <div data-aos="fade-up" class="col-lg-8 px-4 px-lg-5">
                        <h2 class="text-white text-uppercase font-krona-one cta-text">
                            Ready to get started?
                        </h2>
                    </div>
                    <!-- Col 2 -->
                    <div
                            data-aos="fade-up"
                            class="col-lg-4 px-4 px-lg-5 d-flex justify-content-lg-end mt-3 mt-lg-0">
                        <a
                                class="btn-cta font-krona-one text-uppercase button-text"
                                href="Contact.html">
                            <span class="me-2">contact</span>
                            <i class="fa-solid fa-arrow-right" style="color: #232520"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include $BASE_URL . "View/User/footer.php"
?>