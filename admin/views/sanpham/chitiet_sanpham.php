<!doctype html>
<html lang="vi" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8" />
    <title>Chi tiết sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Quản lý sản phẩm" name="description" />
    <meta content="Your Company" name="author" />
    <!-- CSS -->
    <?php require_once "views/layouts/libs_css.php"; ?>
    <style>
    /* Các CSS đã có của bạn */
    .star {
        font-size: 1.5em;
        color: #ccc;
        /* Màu sao không đầy (xám) */
        position: relative;
    }

    .star.full {
        color: gold;
        /* Màu vàng cho sao đầy */
    }

    .star.half {
        color: gold;
        position: absolute;
        width: 50%;
        overflow: hidden;
        left: 0;
    }

    .comment, .rating {
        margin-top: 20px;
        padding: 15px;
        border: 1px solid #f1f1f1;
        border-radius: 5px;
        background-color: #fafafa;
    }

    /* Cải tiến phần card cho đẹp hơn */
    .product-detail-container {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .product-image img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .product-info {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-info h1, .product-info h2 {
        margin: 10px 0;
    }

    .product-info .price {
        font-size: 1.5em;
        color: #ff5722;
        font-weight: bold;
    }

    .product-info .discount-price {
        font-size: 1.2em;
        text-decoration: line-through;
        color: #757575;
    }

    .info-list ul {
        padding-left: 20px;
    }

    .info-list li {
        margin-bottom: 5px;
    }

    .add-to-cart-btn {
        padding: 10px 20px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    .add-to-cart-btn:hover {
        background-color: #45a049;
    }

    /* Gộp phần đánh giá và bình luận */
    .review-comment-section {
        margin-top: 40px;
    }

    .review-comment-section h2 {
        margin-bottom: 20px;
        font-size: 1.5em;
        color: #333;
    }

    .review-comment-section .comment, .review-comment-section .rating {
        margin-bottom: 20px;
    }

    .review-comment-section .rating span {
        margin-right: 5px;
    }

    .review-comment-section p {
        font-size: 1.1em;
        color: #757575;
    }

    /* Định dạng tên người đánh giá và nội dung */
    .review-item {
        display: flex;
        flex-direction: column;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 15px;
        background-color: #f9f9f9;
    }

    .review-item .review-header {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .review-item .review-header .review-name {
        font-weight: bold;
        margin-right: 10px;
    }

    .review-item .review-header .review-date {
        font-size: 0.9em;
        color: #777;
    }

    .review-item .review-body {
        margin-top: 10px;
    }

    .review-item .review-body p {
        font-size: 1em;
        color: #333;
    }

    .review-item .review-rating {
        margin-top: 10px;
        font-size: 1.2em;
    }

    </style>
</head>

<body>
    <div id="layout-wrapper">
        <!-- HEADER -->
        <?php
            require_once "views/layouts/header.php";
            require_once "views/layouts/siderbar.php";
        ?>
        <div class="vertical-overlay"></div>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Chi tiết sản phẩm</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php if ($Sanpham) : ?>
                                    <div class="product-detail-container">
                                        <div class="product-image">
                                            <img src="uploads/<?= htmlspecialchars($Sanpham['hinh_anh']) ?>"
                                                 alt="Hình sản phẩm">
                                        </div>
                                        <div class="product-info">
                                            <h1>Tên sản phẩm: <?= htmlspecialchars($Sanpham['ten_san_pham']) ?></h1>
                                            <h2>Mô tả sản phẩm: <?= htmlspecialchars($Sanpham['mo_ta']) ?></h2>
                                            <p><strong>Danh mục:</strong> <?= htmlspecialchars($Sanpham['ten_danh_muc']) ?></p>
                                            <p class="price"><?= number_format($Sanpham['gia_khuyen_mai']) ?> VNĐ</p>
                                            <p class="discount-price"><?= number_format($Sanpham['gia_ban']) ?> VNĐ</p>
                                            <button class="add-to-cart-btn">Thêm vào giỏ hàng</button>
                                            <div class="info-list">
                                                <ul>
                                                    <li><strong>Số lượng:</strong> <?= $Sanpham['so_luong'] ?></li>
                                                    <li><strong>Trạng thái:</strong>
                                                        <span><?= $Sanpham['trang_thai'] ?></span>
                                                    </li>
                                                    <li><strong>Ngày nhập:</strong> <?= $Sanpham['ngay_nhap'] ?></li>
                                                    <li><strong>Lượt xem:</strong> <?= $Sanpham['luot_xem'] ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <p class="text-center">Không có sản phẩm nào</p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Gộp phần đánh giá và bình luận -->
                            <div class="review-comment-section">
                                <h2>ĐÁNH GIÁ </h2>

                                <!-- Đánh giá và bình luận -->
                                <?php if (!empty($danhGias)) : ?>
                                <?php foreach ($danhGias as $danhGia) : ?>
                                <div class="review-item">
                                    <div class="review-header">
                                        <span class="review-name"><?= htmlspecialchars($danhGia['nguoi_danh_gia']) ?></span>
                                        <span><?php
                                            $diemSo = $danhGia['diem_so']; 
                                            $soSao = floor($diemSo);
                                            $saoLe = $diemSo - $soSao; 
                                            for ($i = 0; $i < $soSao; $i++) {
                                                echo "⭐"; 
                                            }
                                            if ($saoLe >= 0.5) {
                                                echo "½"; 
                                            }
                                            ?>
                                        </span>
                                        <span class="review-date"><?= htmlspecialchars($danhGia['ngay_danh_gia']) ?></span>
                                    </div>

                                    
                                </div>
                                <?php endforeach; ?>
                                <?php else : ?>
                                <p>Chưa có đánh giá nào!</p>
                                <?php endif; ?>
                            </div>

                            <div class="review-comment-section">
                                <h2>BÌNH LUẬN</h2>

                                <!-- Đánh giá và bình luận -->
                                <?php if (!empty($danhGias)) : ?>
                                <?php foreach ($danhGias as $danhGia) : ?>
                                <div class="review-item">
                                    

                                    <div class="review-body">
                                    <?php if (!empty($binhLuans)) : ?>
                                                <?php foreach ($binhLuans as $binhLuan) : ?>
                                                <div class="comment">
                                                    <p><strong>Bình luận:</strong>
                                                        <?= htmlspecialchars($binhLuan['noi_dung']) ?>
                                                    </p>
                                                </div>
                                                <?php endforeach; ?>
                                                <?php else : ?>
                                                <p>Chưa có bình luận nào.</p>
                                                <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php else : ?>
                                <p>Chưa có đánh giá nào!</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
    </div>
</body>
</html>
