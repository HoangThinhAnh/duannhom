<?php require_once 'views/layout/header.php'; ?>

<?php require_once 'views/layout/menu.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Đặt phong cách tổng quát */

/* Breadcrumb */
.breadcrumb-wrap {
    padding: 10px 20px;
    background-color: #f5f5f5;
    border-radius: 5px;
}
.breadcrumb li a {
    color: #007bff;
    text-decoration: none;
}
.breadcrumb li.active {
    font-weight: bold;
}

/* Chi tiết sản phẩm */
.product-details-inner {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.product-name {
    font-size: 1.8rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
}

.price-box {
    margin: 20px 0;
}
.price-regular {
    font-size: 1.5rem;
    font-weight: bold;
    color: #e63946;
}
.price-old {
    font-size: 1.2rem;
    color: #777;
    text-decoration: line-through;
}

.pro-desc {
    font-size: 1rem;
    margin: 20px 0;
    color: #555;
}

/* Nút thêm giỏ hàng */
.btn-cart2 {
    background-color: #28a745;
    color: #fff;
    margin: 20px;
    border-radius: 5px;
    border: none;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
}
.btn-cart2:hover {
    background-color: #218838;
}

/* Phần bình luận */
.card {
    margin-top: 20px;
    border: none;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
.card-body {
    padding: 20px;
}
.list-group-item {
    border: none;
    padding: 10px 15px;
    border-bottom: 1px solid #f1f1f1;
}
.review-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
}

/* Sản phẩm liên quan */
.related-products .product-item {
    background-color: #fff;
    border: 1px solid #f1f1f1;
    border-radius: 10px;
    padding: 10px;
    transition: all 0.3s ease;
}
.related-products .product-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}
.product-thumb a img {
    border-radius: 5px;
}
.product-caption h6 a {
    font-size: 1rem;
    color: #333;
    text-decoration: none;
}
.product-caption h6 a:hover {
    color: #007bff;
}

/* Phần liên kết và nút */
a {
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s ease;
}
a:hover {
    color: #0056b3;
}

button {
    border: none;
    outline: none;
    cursor: pointer;
}

/* Đáp ứng di động */
@media (max-width: 768px) {
    .product-details-inner {
        text-align: center;
    }
    .product-thumb img {
        margin: auto;
    }
}

</style>
<body>
    

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">Sản phẩm</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <?php foreach ($listSanpham as $key => $anhSanPham): ?>
                                        <div class="pro-large-img img-zoom">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $Sanpham['id'] ?>">
                                                <img class="pri-img" src="<?= BASE_URL_IMG . $Sanpham['hinh_anh'] ?>" alt="product">
                                            </a>

                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <?php foreach ($listSanpham as $key => $anhSanPham): ?>
                                        <div class="pro-nav-thumb">

                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="#"><?= $Sanpham['ten_danh_muc'] ?></a>
                                    </div>
                                    <h3 class="product-name"><?= $Sanpham['ten_san_pham'] ?></h3>
                                    <div class="ratings d-flex">
                                        <div class="pro-review">
                                            <?php $countComment = count($binhLuans); ?>
                                            <span><?= $countComment . ' bình luận' ?></span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <?php if ($Sanpham['gia_khuyen_mai']) { ?>
                                            <span class="price-regular"><?= number_format($Sanpham['gia_khuyen_mai']) . 'đ'; ?></span>
                                            <span class="price-old"><del><?= number_format($Sanpham['gia_ban']) . 'đ'; ?></del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= ($Sanpham['gia_ban']) . 'đ'; ?></span>
                                        <?php } ?>

                                    </div>

                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span><?= $Sanpham['so_luong'] . ' trong kho' ?></span>
                                    </div>
                                    <p class="pro-desc"><?= $Sanpham['mo_ta'] ?></p>
                                    <h6 class="option-title">Số lượng:</h6>
                                    <form action="<?= 'http://localhost/PH49685-DuAn1/base_du_an_1/index.php' . '?act=them-san-pham' ?>" method="POST" class="d-flex align-items-center">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="so_luong" value="1" min="1">
                                            </div>
                                        </div>
                                        <!-- Lấy id sản phẩm đúng từ $sanPham -->
                                        <input type="hidden" name="san_pham_id" value="<?= isset($Sanpham['id']) ? $Sanpham['id'] : 0 ?>"> <!-- ID sản phẩm -->
                                        <div class="action_link">
                                            <button type="submit" class="btn btn-cart2">Thêm giỏ hàng</button>
                                        </div>
                                    </form>




                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tab_three">Bình luận
                                                (<?= $countComment ?>)</a>
                                        </li>

                                    </ul>

                                    <div class="tab-content reviews-tab">
                                        <div class="card">
                                            <div class="card-body">
                                                <?php if (!empty($binhLuans)) : ?>
                                                    <ul class="list-group list-group-flush">
                                                        <?php foreach ($binhLuans as $binhLuan) : ?>
                                                            <li class="list-group-item">
                                                                <strong><?= ($binhLuan['nguoi_binh_luan']) ?>:</strong>
                                                                <?= ($binhLuan['noi_dung']) ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else : ?>
                                                    <p class="text-muted">Chưa có bình luận nào.</p>
                                                <?php endif; ?>
                                            </div>

                                            <?php if (isset($_SESSION['nguoidungs_client'])): ?>
                                                <!-- Form bình luận cho người dùng đã đăng nhập -->
                                                <form action="index.php?act=add-binhluan" method="POST" class="review-form">
                                                    <input type="hidden" name="san_pham_id" value="<?= $Sanpham['id'] ?>">
                                                    <!-- ID sản phẩm -->
                                                    <div class="form-group">
                                                        <label for="noi_dung">Nội dung bình luận:</label>
                                                        <textarea id="noi_dung" name="noi_dung" class="form-control"
                                                            required></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                                                </form>
                                            <?php else: ?>
                                                <!-- Thông báo khi chưa đăng nhập -->
                                                <p class="text-muted">Bạn cần <a href="index.php?act=login">đăng
                                                        nhập</a> để thêm bình luận.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details reviews end -->
            </div>
            <!-- product details wrapper end -->
        </div>
    </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm liên quan</h2>

                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        <?php foreach ($listSanphamCungDanhMuc as $key => $Sanpham): ?>
                            <!-- product item start -->
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $Sanpham['id'] ?>">
                                        <img class="pri-img" src="<?= BASE_URL_IMG . $Sanpham['hinh_anh'] ?>" alt="product">
                                        <img class="sec-img" src="<?= BASE_URL_IMG . $Sanpham['hinh_anh'] ?>" alt="product">
                                    </a>
                                    <div class="product-badge">
                                        <?php
                                        $ngayNhap = new DateTime($Sanpham['ngay_nhap']);
                                        $ngayHienTai = new DateTime();
                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);

                                        if ($tinhNgay->days <= 7) { ?>
                                            <div class="product-label new">
                                                <span>Mới</span>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <?php if ($Sanpham['gia_khuyen_mai']) { ?>

                                            <div class="product-label discount">
                                                <span>Giảm giá</span>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="cart-hover">
                                        <!-- <button  class="btn btn-cart">Xem chi tiết</button> -->
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $Sanpham['id'] ?> " class="btn btn-cart">Chi tiết sản phẩm</a>
                                    </div>

                                </figure>
                                <div class="product-caption text-center">

                                    <h6 class="product-name">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $Sanpham['id'] ?>"><?= $Sanpham['ten_san_pham'] ?></a>
                                    </h6>
                                    <div class="price-box">
                                        <?php if ($Sanpham['gia_khuyen_mai']) { ?>
                                            <span class="price-regular"><?= number_format($Sanpham['gia_khuyen_mai']) . 'đ'; ?></span>
                                            <span class="price-old"><del><?= number_format($Sanpham['gia_ban']) . 'đ'; ?></del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= number_format($Sanpham['gia_ban']) . 'đ'; ?></span>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <!-- product item end -->
                        <?php endforeach ?>
                        <!-- product item end -->



                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
</main>


</body>
</html>
<!-- offcanvas mini cart start -->

<!-- offcanvas mini cart end -->

<?php require_once 'views/layout/footer.php'; ?>