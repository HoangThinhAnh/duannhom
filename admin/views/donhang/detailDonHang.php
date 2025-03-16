<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->


<head>

    <meta charset="utf-8" />
    <title>ADMIN | Shop ban hang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

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
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-10">
                                    <h1> Quản lý danh Sách Đơn Hàng -Đơn Hàng: <?= $donHang['ma_don_hang'] ?></h1>

                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </section>

                    <section class="content">


                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="callout callout-info">
                                        <div>
                                            <?php if ($donHang['trang_thai_id'] == 1) {
                                                $colerAlerts = 'primary';
                                            } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 4) {
                                                $colerAlerts = 'warning';
                                            } elseif ($donHang['trang_thai_id'] == 6) {
                                                $colerAlerts = 'success';
                                            } else {
                                                $colerAlerts = 'danger';
                                            }

                                            ?>
                                        </div>
                                        <div class="alert alert-<?= $colerAlerts; ?>" role="alert">
                                            Đơn Hàng: <?= $donHang['ten_trang_thai'] ?>
                                        </div>
                                    </div>

                                    <!-- Main content -->
                                    <div class="invoice p-3 mb-3">
                                        <!-- title row -->
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>
                                                    <i class="fas fa-globe"></i>
                                                    MTP SHOP

                                                    <small class="float-right">Ngày Đặt: <?= $donHang['ngay_dat'];  ?></small>
                                                </h4>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- info row -->
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">

                                                Thông Tin Người Đặt

                                                <address>
                                                    <strong>Họ Tên <?= $donHang['ten_nguoi_dung'] ?></strong>
                                                    <br>

                                                    Email:<?= $donHang['email'] ?>
                                                    <br>

                                                    Số điện thoại: <?= $donHang['so_dien_thoai'] ?>
                                                    <br>


                                                </address>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">

                                                Thông tin người nhận

                                                <address>
                                                    <strong>Họ Tên <?= $donHang['ten_nguoi_nhan'] ?></strong>
                                                    <br>

                                                    Email:<?= $donHang['email_nguoi_nhan'] ?>
                                                    <br>

                                                    Số điện thoại: <?= $donHang['sdt_nguoi_nhan'] ?>
                                                    <br>

                                                    Địa chỉ: <?= $donHang['dia_chi_nguoi_nhan'] ?>
                                                    <br>

                                                </address>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">

                                                Thông tin Đơn hàng

                                                <address>
                                                    <b>Mã đơn hàng <?= $donHang['ma_don_hang'] ?></b>
                                                    <br>

                                                    <b>Ghi chú: <?= $donHang['ghi_chu'] ?></b>
                                                    <br>

                                                    <b>Thanh Toán: <?= $donHang['ten_phuong_thuc'] ?></b>
                                                    <br>

                                                </address>

                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- Table row -->
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Đơn giá</th>
                                                            <th>Số lượng</th>
                                                            <th>thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $tong_tien = 0; ?>
                                                        <?php if (!empty($sanPhamDonHang)) { ?>
                                                            <?php foreach ($sanPhamDonHang as $index => $sanPham) { ?>
                                                                <tr>
                                                                    <td> <?= $index + 1 ?></td>
                                                                    <td> <?= $sanPham['ten_san_pham'] ?></td>
                                                                    <td> <?= $sanPham['don_gia'] ?></td>
                                                                    <td> <?= $sanPham['so_luong'] ?></td>
                                                                    <td> <?= $sanPham['thanh_tien'] ?></td>
                                                                </tr>
                                                                <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <tr>
                                                                <td colspan="5">Không có sản phẩm nào trong đơn hàng.</td>
                                                            </tr>
                                                        <?php } ?>



                                                    </tbody>

                                                </table>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <div class="col-6">
                                                <p class="lead"> ngày đặt hàng: <?= $donHang['ngay_dat']; ?></p>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th style="width:50%">Thành Tiền:</th>
                                                            <td> <?= $tong_tien ?> VND</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Phí vận chuyển:</th>
                                                            <td>30,000 VND</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Tổng Tiền:</th>
                                                            <td> <?= number_format($tong_tien + 30000) ?>VND </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->
                                    </div>
                                    <button onclick="window.print();" class="btn btn-primary">In Đơn Hàng</button>

                                    <!-- /.invoice -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
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