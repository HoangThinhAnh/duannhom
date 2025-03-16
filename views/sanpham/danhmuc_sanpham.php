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
    /* Tổng quát */


    /* Sidebar */
    .sidebar {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin-bottom: 20px;
    }

    .sidebar-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 15px;
        color: #333;
    }

    .sidebar-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-list li {
        margin-bottom: 10px;
    }

    .sidebar-list li a {
        text-decoration: none;
        color: #007bff;
        font-size: 1rem;
        transition: color 0.3s ease;
    }

    .sidebar-list li a:hover {
        color: #0056b3;
    }

    /* Tiêu đề */
    .section-title {
        margin-bottom: 30px;
    }

    .section-title h2 {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
        position: relative;
        display: inline-block;
    }

    .section-title h2:after {
        content: '';
        width: 50px;
        height: 3px;
        background-color: #007bff;
        display: block;
        margin: 10px auto 0;
    }

    /* Danh sách sản phẩm */
    .product-item {
        background-color: #fff;
        border-radius: 10px;
        padding: 15px;
        margin: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .product-thumb img {
        border-radius: 5px;
    }

    .product-thumb a {
        display: block;
    }

    .product-badge .product-label {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #e63946;
        color: #fff;
        font-size: 0.9rem;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .cart-hover {
        margin-top: 10px;
    }

    .cart-hover .btn-cart {
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 15px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .cart-hover .btn-cart:hover {
        background-color: #218838;
    }

    /* Thông tin sản phẩm */
    .product-caption {
        text-align: center;
        margin-top: 15px;
    }

    .product-caption h6 {
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    .product-caption h6 a {
        text-decoration: none;
        color: inherit;
        transition: color 0.3s ease;
    }

    .product-caption h6 a:hover {
        color: #007bff;
    }

    .price-box {
        font-size: 1rem;
    }

    .price-regular {
        font-size: 1.2rem;
        font-weight: bold;
        color: #e63946;
    }

    .price-old {
        font-size: 1rem;
        color: #777;
        text-decoration: line-through;
    }

    /* Đáp ứng di động */
    @media (max-width: 768px) {
        .sidebar {
            margin-bottom: 20px;
        }

        .product-item {
            margin: 10px 0;
        }
    }
</style>

<body>

</body>

</html>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <!-- Danh mục sản phẩm -->
                    <div class="sidebar-widget" style="border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
                        <h3 class="sidebar-title" style="margin-bottom: 15px;">Danh mục sản phẩm</h3>
                        <ul class="sidebar-list">
                            <?php if (!empty($categories) && is_array($categories)): ?>
                                <?php foreach ($categories as $category): ?>
                                    <li>
                                        <a href="<?= BASE_URL . '?act=danh-muc-san-pham&id=' . $category['id'] ?>" style="color: black;">
                                            <?= htmlspecialchars($category['ten_danh_muc']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>Không có danh mục sản phẩm.</li>
                            <?php endif; ?>
                        </ul>
                    </div>


                </div>
            </div>



            <div class="col-md-9">
                <section class="feature-product section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title text-center">
                                    <h2 class="title">Sản phẩm theo danh mục</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                                    <?php
                                    // Lấy ID danh mục từ URL
                                    $categoryId = isset($_GET['id']) ? $_GET['id'] : 0;
                                    // Kiểm tra nếu dữ liệu không có, tránh lỗi
                                    $Sanphams = isset($Sanphams) ? $Sanphams : [];

                                    // Lọc sản phẩm theo danh mục
                                    $filteredProducts = array_filter($Sanphams, function ($product) use ($categoryId) {
                                        return $product['danh_muc_id'] == $categoryId;
                                    });

                                    foreach ($filteredProducts as $sp):
                                    ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sp['id'] ?>">
                                                    <img class="pri-img" src="<?= BASE_URL_IMG . $sp['hinh_anh'] ?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL_IMG . $sp['hinh_anh'] ?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php if ($sp['gia_khuyen_mai']) { ?>
                                                        <div class="product-label discount">
                                                            <span>Giảm giá</span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="cart-hover">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sp['id'] ?>" class="btn btn-cart">Xem chi tiết</a>
                                                </div>
                                            </figure>

                                            <div class="product-caption text-center">
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sp['id'] ?>"><?= $sp['ten_san_pham'] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php if ($sp['gia_khuyen_mai']) { ?>
                                                        <span class="price-regular"><?= number_format($sp['gia_khuyen_mai']) . 'đ'; ?></span>
                                                        <span class="price-old"><del><?= number_format($sp['gia_ban']) . 'đ'; ?></del></span>
                                                    <?php } else { ?>
                                                        <span class="price-regular"><?= number_format($sp['gia_ban']) . 'đ'; ?></span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php require_once 'views/layout/footer.php'; ?>