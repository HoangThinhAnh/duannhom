<?php require_once 'layout/menu.php'; ?>

<?php require_once 'layout/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Tổng quan */


/* Hero Slider */
.slider-area {
    position: relative;
    overflow: hidden;
    height: 500px;
    margin-bottom: 100px;
}
.hero-single-slide {
    position: relative;
    height: 100%;
}
.hero-slider-item {
    width: 100%;
    height: 100%;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
}
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
}
.slick-arrow-style .slick-prev, .slick-arrow-style .slick-next {
    color: #fff;
    font-size: 2rem;
    top: 50%;
    transform: translateY(-50%);
}
.slick-dot-style .slick-dots {
    bottom: 20px;
}

/* Service Policy */
.policy-item {
    text-align: center;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}
.policy-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}
.policy-icon i {
    font-size: 2.5rem;
    color: #ff7f50;
    margin-bottom: 10px;
}
.policy-content h6 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
}
.policy-content p {
    color: #777;
    font-size: 0.9rem;
}

/* Product Section */
.section-title {
    margin-bottom: 30px;
}
.section-title .title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #333;
}
.section-title .sub-title {
    font-size: 1rem;
    color: #777;
}
.product-container {
    position: relative;
}
.product-item {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
}
.product-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}
.product-thumb {
    position: relative;
}
.product-thumb .pri-img, .product-thumb .sec-img {
    width: 100%;
    transition: all 0.3s ease;
}
.product-thumb .sec-img {
    opacity: 0;
}
.product-thumb:hover .pri-img {
    opacity: 0;
}
.product-thumb:hover .sec-img {
    opacity: 1;
}
.product-badge {
    position: absolute;
    top: 10px;
    left: 10px;
}
.product-badge .product-label {
    background-color: #ff7f50;
    padding: 5px 10px;
    font-size: 0.9rem;
    color: #fff;
    border-radius: 5px;
    text-transform: uppercase;
}
.cart-hover {
    position: absolute;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    opacity: 0;
    transition: all 0.3s ease;
}
.product-item:hover .cart-hover {
    opacity: 1;
}
.btn-cart {
    background-color: #ff7f50;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-transform: uppercase;
    font-weight: 600;
    transition: background-color 0.3s ease;
}
.btn-cart:hover {
    background-color: #e76e3d;
}

/* Banner */
.product-banner img {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
}

/* Featured Product */
.feature-product .product-carousel-4_2 {
    display: flex;
    gap: 15px;
    overflow: hidden;
    padding-bottom: 30px;
}
.feature-product .product-item {
    width: calc(25% - 15px);
}
.product-item .product-caption {
    text-align: center;
    padding: 15px;
}
.product-caption h6 {
    font-size: 1.1rem;
    color: #333;
    margin-bottom: 10px;
}
.product-caption .price-box {
    font-size: 1rem;
    color: #ff7f50;
    font-weight: 600;
}

/* Responsive */
@media (max-width: 768px) {
    .hero-slider-item {
        height: 400px;
    }
    .product-item {
        width: 100%;
    }
    .product-item .product-caption {
        padding: 10px;
    }
    .product-caption h6 {
        font-size: 1rem;
    }
    .product-caption .price-box {
        font-size: 0.9rem;
    }
}

</style>
<body>
    
</body>
</html>
<main>
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slide1.jpg">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slide2.jpg">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/slide3.jpg">
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single slider item start -->

    </section>
    <!-- hero slider area end -->
    <!-- service policy area start -->
    <div class="container">
        <div class="row mtn-30">
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-plane"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Giao hàng</h6>
                        <p>Miễn phí giao hàng</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-help2"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Hỗ trợ</h6>
                        <p>Hỗ trợ 24/7</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-back"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Hoàn tiền</h6>
                        <p>Hoàn tiền trong 30 ngày</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="policy-item">
                    <div class="policy-icon">
                        <i class="pe-7s-credit"></i>
                    </div>
                    <div class="policy-content">
                        <h6>Thanh toán</h6>
                        <p>Bảo mật thanh toán</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- service policy area end -->


<!-- product area start -->
<section class="product-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Sản phẩm nổi bật</h2>
                    <p class="sub-title">Sản phẩm được cập nhật liên tục </p>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-container">


                    <!-- product tab content start -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1">
                            <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                <?php foreach ($listSanPham as $key => $sanPham): ?>
                                    <!-- product item start -->
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="pri-img" src="<?= BASE_URL_IMG . $sanPham['hinh_anh'] ?>" alt="product">
                                                <img class="sec-img" src="<?= BASE_URL_IMG . $sanPham['hinh_anh'] ?>" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <?php
                                                $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                $ngayHienTai = new DateTime();
                                                $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                                if ($tinhNgay->days <= 7) { ?>
                                                    <div class="product-label new">
                                                        <span>Mới</span>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <?php if ($sanPham['gia_khuyen_mai']) { ?>

                                                    <div class="product-label discount">
                                                        <span>Giảm giá</span>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <div class="cart-hover">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?> " class="btn btn-cart">Xem chi tiết</a>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">

                                            <h6 class="product-name">
                                                <a href="product-details.html"><?= $sanPham['ten_san_pham'] ?></a>
                                            </h6>
                                            <div class="price-box">
                                                <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                    <span class="price-regular"><?= number_format($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                                                    <span class="price-old"><del><?= number_format($sanPham['gia_ban']) . 'đ'; ?></del></span>
                                                <?php } else { ?>
                                                    <span class="price-regular"><?= number_format($sanPham['gia_ban']) . 'đ'; ?></span>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- product item end -->
                                <?php endforeach ?>
                            </div>
                        </div>

                    </div>
                    <!-- product tab content end -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product area end -->

<!-- product banner statistics area start -->



<div class="container">
    <div class="row">
        <img src="assets/img/brand/anh12345.webp" class="img-fluid" style="max-height: 200px; object-fit: cover; width: 2000px;">
    </div>
</div>



<!-- product banner statistics area end -->

<!-- featured product area start -->
<section class="feature-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- section title start -->
                <div class="section-title text-center">
                    <h2 class="title">Sản phẩm của chúng tôi</h2>
                </div>
                <!-- section title start -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                        <!-- product item start -->
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>">
                                    <img class="pri-img" src="<?= BASE_URL_IMG . $sanPham['hinh_anh'] ?>" alt="product">
                                    <img class="sec-img" src="<?= BASE_URL_IMG . $sanPham['hinh_anh'] ?>" alt="product">
                                </a>
                                <div class="product-badge">
                                    <?php
                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                    $ngayHienTai = new DateTime();
                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                    if ($tinhNgay->days <= 7) { ?>
                                        <div class="product-label new">
                                            <span>Mới</span>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>

                                        <div class="product-label discount">
                                            <span>Giảm giá</span>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="cart-hover">
                                    <!-- <button  class="btn btn-cart">Xem chi tiết</button> -->
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?> " class="btn btn-cart">Chi tiết sản phẩm</a>
                                </div>
                            </figure>

                            <div class="product-caption text-center">

                                <h6 class="product-name">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                </h6>
                                <div class="price-box">
                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                        <span class="price-regular"><?= number_format($sanPham['gia_khuyen_mai']) . 'đ'; ?></span>
                                        <span class="price-old"><del><?= number_format($sanPham['gia_ban']) . 'đ'; ?></del></span>
                                    <?php } else { ?>
                                        <span class="price-regular"><?= number_format($sanPham['gia_ban']) . 'đ'; ?></span>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <!-- product item end -->
                    <?php endforeach ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- featured product area end -->
<!-- offcanvas mini cart start -->


<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php'; ?>