<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Cập nhật người dùng | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý người dùng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Cập nhật người dùng</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Cập nhật người dùng</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="?act=sua-nguoi-dung" method="post">
                                                <input type="hidden" name="id" value="<?= $nguoiDung['id'] ?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="citynameInput" class="form-label">Tên người dùng</label>
                                                            <input type="text" class="form-control" placeholder="Nhập tên người dùng" name="ten_nguoi_dung" value="<?= $nguoiDung['ten_nguoi_dung'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['ten_nguoi_dung']) ? $_SESSION['errors']['ten_nguoi_dung'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="citynameInput" class="form-label">Email</label>
                                                            <input type="email" class="form-control" placeholder="Nhập email người dùng" name="email" value="<?= $nguoiDung['email'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="citynameInput" class="form-label">Số điện thoại</label>
                                                            <input type="number" class="form-control" placeholder="Nhập số điện thoại người dùng" name="so_dien_thoai" value="<?= $nguoiDung['so_dien_thoai'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['so_dien_thoai']) ? $_SESSION['errors']['so_dien_thoai'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Trạng thái</label>
                                                            <select class="form-select" name="trang_thai">
                                                                <option selected disabled>Chọn trạng thái</option>
                                                                <option value="1" <?= $nguoiDung['trang_thai'] == 1 ? 'selected' : '' ?>>Hiển thị </option>
                                                                <option value="2" <?= $nguoiDung['trang_thai'] == 2 ? 'selected' : '' ?>>Không hiển thị</option>
                                                            </select>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['trang_thai']) ? $_SESSION['errors']['trang_thai'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="passwordInput" class="form-label">Mật khẩu</label>
                                                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="mat_khau">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['mat_khau'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="roleInput" class="form-label">Vai trò</label>
                                                            <select class="form-select" name="vai_tro">
                                                                <option selected disabled>Chọn vai trò</option>
                                                                <option value="admin" <?= $nguoiDung['vai_tro'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                                <option value="user" <?= $nguoiDung['vai_tro'] == 'user' ? 'selected' : '' ?>>Người dùng</option>
                                                            </select>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['vai_tro']) ? $_SESSION['errors']['vai_tro'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="citynameInput" class="form-label">Địa chỉ</label>
                                                            <input type="text" class="form-control" placeholder="Nhập địa chỉ người dùng" name="dia_chi" value="<?= $nguoiDung['dia_chi'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['dia_chi']) ? $_SESSION['errors']['dia_chi'] : '' ?>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end .h-100-->

                        </div> <!-- end col -->
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>