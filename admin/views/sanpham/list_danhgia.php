<!doctype html>
<html lang="vi" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8" />
    <title>Danh sách Đánh giá</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Quản lý đánh giá" name="description" />
    <meta content="Your Company" name="author" />
    <!-- CSS -->
    <?php require_once "views/layouts/libs_css.php"; ?>
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
                                <h4 class="mb-sm-0">Quản Lý Đánh Giá</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Đánh Giá</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Danh sách đánh giá</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tên Người Đánh Giá</th>
                                                    <th>Sản Phẩm</th>
                                                    <th>Chất Lượng</th>
                                                    <th>Nội Dung</th>
                                                    <th>Ngày Đăng</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($listDanhGia) && count($listDanhGia) > 0) : ?>
                                                <?php foreach ($listDanhGia as $danhGia) : ?>
                                                <tr>
                                                    <td><?= $danhGia['id'] ?></td>
                                                    <td><?= htmlspecialchars($danhGia['nguoi_danh_gia']) ?></td>
                                                    <td><?= htmlspecialchars($danhGia['ten_san_pham']) ?></td>
                                                    <td>
                                                        <?php
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
                                                    </td>
                                                    <td><?= htmlspecialchars($danhGia['noi_dung']) ?></td>
                                                    <td><?= $danhGia['ngay_danh_gia'] ?></td>
                                                    <td>
                                                        <span
                                                            class="badge <?= $danhGia['trang_thai'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                                            <?= $danhGia['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="index.php?act=toggle-danhgia&id=<?= $danhGia['id'] ?>"
                                                            class="btn btn-<?= $danhGia['trang_thai'] == 1 ? 'danger' : 'success' ?> btn-sm">
                                                            <?= $danhGia['trang_thai'] == 1 ? 'Ẩn' : 'Hiển Thị' ?>
                                                        </a>
                                                        <a href="index.php?act=delete-danhgia&id=<?= $danhGia['id'] ?>"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <?php else : ?>
                                                <tr>
                                                    <td colspan="8" class="text-center">Không có dữ liệu</td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                            document.write(new Date().getFullYear())
                            </script> © Your Company.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Your Company
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <?php require_once "views/layouts/libs_js.php"; ?>
</body>

</html>
