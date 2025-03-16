<!doctype html>
<html lang="vi" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8" />
    <title>Danh sách Bình luận</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Quản lý bình luận" name="description" />
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
                                <h4 class="mb-sm-0">Quản Lý Bình Luận</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Bình Luận</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Danh sách bình luận</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Sản Phẩm</th>
                                                    <th>Nội Dung</th>
                                                    <th>Ngày Đăng</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($listBinhLuan) && count($listBinhLuan) > 0) : ?>
                                                    <?php foreach ($listBinhLuan as $binhLuan) : ?>
                                                        <tr>
                                                            <td><?= $binhLuan['id'] ?></td>
                                                            <td><?= htmlspecialchars($binhLuan['ten_san_pham']) ?></td>
                                                            <td><?= htmlspecialchars($binhLuan['noi_dung']) ?></td>
                                                            <td><?= $binhLuan['ngay_dang'] ?></td>
                                                            <td>
                                                                <span class="badge <?= $binhLuan['trang_thai'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                                                    <?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a href="index.php?act=toggle-binhluan&id=<?= $binhLuan['id'] ?>"
                                                                   class="btn btn-<?= $binhLuan['trang_thai'] == 1 ? 'danger' : 'success' ?> btn-sm">
                                                                   <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Hiển Thị' ?>
                                                                </a>
                                                                <a href="index.php?act=delete-binhluan&id=<?= $binhLuan['id'] ?>"
                                                                   class="btn btn-danger btn-sm"
                                                                   onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">Không có dữ liệu</td>
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
