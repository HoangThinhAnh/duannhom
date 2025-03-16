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
    /* Body và nền tổng thể */

    /* Sidebar */
    .sidebar {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar-title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
    }

    .sidebar-list {
        list-style: none;
        padding: 0;
    }

    .sidebar-list li {
        margin: 10px 0;
    }

    .sidebar-list a {
        color: #007bff;
        text-decoration: none;
        font-size: 14px;
        transition: color 0.3s ease;
    }

    .sidebar-list a:hover {
        color: #0056b3;
    }

    /* Tìm theo giá */
    .filter-options li {
        margin: 8px 0;
    }

    .filter-options a {
        color: #495057;
        text-decoration: none;
        padding: 5px 10px;
        display: inline-block;
        background-color: #e9ecef;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .filter-options a:hover {
        background-color: #ced4da;
        color: #212529;
    }

    /* Danh sách sản phẩm */
    .feature-product {
        margin-top: 20px;
    }

    .section-title h2 {
        font-size: 24px;
        color: #333;
        font-weight: bold;
        margin-bottom: 20px;
        text-transform: uppercase;
    }

    .product-item {
        background-color: #ffffff;
        border: 1px solid #f0f0f0;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .product-thumb img {
        width: 100%;
        height: auto;
        border-bottom: 1px solid #f0f0f0;
    }

    .product-caption {
        padding: 15px;
        text-align: center;
    }

    .product-name a {
        font-size: 16px;
        font-weight: bold;
        color: #333;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .product-name a:hover {
        color: #007bff;
    }

    .price-box {
        margin-top: 10px;
        font-size: 16px;
        color: #28a745;
        font-weight: bold;
    }

    /* Nút "Xem chi tiết" */
    .btn-cart {
        display: inline-block;
        background-color: #007bff;
        color: #ffffff;
        padding: 8px 15px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: bold;
        text-transform: uppercase;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-cart:hover {
        background-color: #0056b3;
    }

    /* Phân trang */
    .pagination {
        margin-top: 20px;
        justify-content: center;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-link {
        color: #007bff;
        font-size: 14px;
        padding: 8px 12px;
        border: 1px solid #e9ecef;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background-color: #e9ecef;
        text-decoration: none;
    }

    .pagination .active .page-link {
        background-color: #007bff;
        color: #ffffff;
        border-color: #007bff;
    }
</style>

<body>

    <main>
        <div class="container">
            <div class="row">
                <!-- Bảng danh mục sản phẩm - bên trái -->
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

                        <!-- Tìm theo giá -->
                        <div class="sidebar-widget" style="border: 1px solid #ccc; padding: 15px; border-radius: 5px;">
                            <h3 class="sidebar-title" style="margin-bottom: 15px;">Tìm theo giá</h3>
                            <ul class="filter-options">
                                <li>
                                    <a id="filter-1" href="#" style="color: black;" onclick="toggleAndApplyFilter('filter-1', 0, 1000000, event);">
                                        Giá dưới 1.000.000đ
                                    </a>
                                </li>
                                <li>

                                    <a id="filter-2" href="#" style="color: black;" onclick="toggleAndApplyFilter('filter-2', 1000000, 1500000, event);">
                                        1.000.000đ - 1.500.000đ
                                    </a>
                                </li>
                                <li>

                                    <a id="filter-3" href="#" style="color: black;" onclick="toggleAndApplyFilter('filter-3', 1500000, 2000000, event);">
                                        1.500.000đ - 2.000.000đ
                                    </a>
                                </li>
                                <li>

                                    <a id="filter-4" href="#" style="color: black;" onclick="toggleAndApplyFilter('filter-4', 2000000, 2500000, event);">
                                        2.000.000đ - 2.500.000đ
                                    </a>
                                </li>
                                <li>

                                    <a id="filter-5" href="#" style="color: black;" onclick="toggleAndApplyFilter('filter-5', 2500000, 3000000, event);">
                                        2.500.000đ - 3.000.000đ
                                    </a>
                                </li>
                                <li>

                                    <a id="filter-6" href="#" style="color: black;" onclick="toggleAndApplyFilter('filter-6', 3000000, 10000000, event);">
                                        Giá trên 3.000.000đ
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <!-- Danh sách sản phẩm - bên phải -->
                <div class="col-md-9">
                    <section class="feature-product section-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section-title text-center">
                                        <h2 class="title">Danh sách sản phẩm</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php if (!empty($Sanphams) && is_array($Sanphams)): ?>
                                    <?php foreach ($Sanphams as $sp): ?>
                                        <div class="col-md-4 col-sm-6 mb-4">
                                            <div class="product-item">
                                                <figure class="product-thumb">
                                                    <a>
                                                        <img class="pri-img" src="<?= BASE_URL_IMG . $sp['hinh_anh'] ?>" alt="<?= htmlspecialchars($sp['ten_san_pham']) ?>">
                                                    </a>
                                                    <div class="cart-hover">
                                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sp['id'] ?>" class="btn btn-cart">Xem chi tiết</a>

                                                    </div>
                                                </figure>
                                                <div class="product-caption text-center">
                                                    <h6 class="product-name">
                                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sp['id'] ?>">
                                                            <?= htmlspecialchars($sp['ten_san_pham']) ?>
                                                        </a>
                                                    </h6>
                                                    <div class="price-box">
                                                        <span class="price-regular"><?= number_format($sp['gia_ban'], 0, ',', '.'); ?> đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>Không có sản phẩm nào trong danh mục này.</p>
                                <?php endif; ?>
                            </div>


                        </div>
                </div>
            </div>
            </section>
        </div>
        </div>
        </div>
        <?php if ($totalPages > 1): ?>
            <nav>
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                            <a class="page-link" href="<?= BASE_URL . '?act=list-sanpham&page=' . $i ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>


    </main>

</body>

</html>
<?php require_once 'views/layout/footer.php'; ?>

<script>
    function toggleAndApplyFilter(id, minPrice, maxPrice, event) {
        event.preventDefault(); // Ngăn chặn reload trang
        var checkbox = document.getElementById(id);
        checkbox.checked = !checkbox.checked;
        var url = new URL(window.location.href);
        url.searchParams.set('min_price', minPrice);
        url.searchParams.set('max_price', maxPrice);
        window.location.href = url.href; // Cập nhật URL và reload
    }
</script>