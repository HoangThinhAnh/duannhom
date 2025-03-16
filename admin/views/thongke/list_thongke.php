<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>quan ly trang thong ke</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
                                <h4 class="mb-sm-0">Quản Lý Trang Thống Kê</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Doanh Thu</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <!-- Striped Rows -->
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1"> Danh Sach Thống kê </h4>
                                        <form action="?act=search-banner" method="post">
                                            <input type="search" name="search" placeholder="Tìm Kiếm theo Tiêu Đề">
                                            <input type="submit" name="timkiem" value="Tìm Kiếm" class="btn btn-soft-success material-shadow-none" class="ri-add-circle-line align-middle me-1">
                                        </form>

                                    </div><!-- end card header -->
                                    <div class="col-xxl-12">
                                        <div class="card">
                                            <div class="card-header border-0 align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Chi Tiết Doanh Thu</h4>
                                            </div><!-- end card header -->

                                            <div class="card-header p-0 border-0 bg-light-subtle">
                                                <div class="row g-0 text-center">
                                                    <div class="col-6 col-sm-3">
                                                        <div class="p-3 border border-dashed border-start-0">
                                                            <h5 class="mb-1"><?= number_format($data['revenue'], 0, ',', '.'); ?> VNĐ</h5>
                                                            <p class="text-muted mb-0">Doanh Thu</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-sm-3">
                                                        <div class="p-3 border border-dashed border-start-0">
                                                            <h5 class="mb-1"><?= $data['orders']; ?></h5> <!-- Hiển thị số lượng đơn hàng -->
                                                            <p class="text-muted mb-0">Số Lượng Đơn</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-sm-3">
                                                        <div class="p-3 border border-dashed border-start-0">
                                                            <?php
                                                            // Kiểm tra lợi nhuận âm và thay đổi màu sắc
                                                            $profitClass = $data['profit'] < 0 ? 'text-danger' : 'text-success';
                                                            ?>
                                                            <h5 class="mb-1 <?= $profitClass; ?>"><?= number_format($data['profit'], 0, ',', '.'); ?> VNĐ</h5>
                                                            <p class="text-muted mb-0">Lợi Nhuận</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-body p-0 pb-2">
                                                <div>
                                                    <div id="daily_revenue_charts" data-colors='["#FF5733"]'></div>
                                                </div>
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        var element = document.getElementById("daily_revenue_charts");

                                                        // Lấy màu từ thuộc tính data
                                                        var colors = JSON.parse(element.getAttribute("data-colors"));

                                                        // Dữ liệu doanh thu theo ngày từ Controller
                                                        var dailyRevenue = <?php echo json_encode($dailyRevenue); ?>; // Dữ liệu truyền từ controller

                                                        // Kiểm tra và debug dữ liệu
                                                        console.log(dailyRevenue); // Xem đầu ra của dailyRevenue để chắc chắn rằng dữ liệu hợp lệ

                                                        // Lấy danh sách ngày (keys của mảng dailyRevenue)
                                                        var categories = Object.keys(dailyRevenue); // Danh sách các ngày
                                                        var revenueData = categories.map(function(date) {
                                                            return dailyRevenue[date]; // Lấy doanh thu cho mỗi ngày
                                                        });

                                                        // Cấu hình biểu đồ
                                                        var options = {
                                                            chart: {
                                                                type: "line", // Biểu đồ đường thay vì thanh
                                                                height: 350
                                                            },
                                                            series: [{
                                                                name: "Doanh thu",
                                                                data: revenueData // Dữ liệu doanh thu theo ngày
                                                            }],
                                                            colors: colors,
                                                            xaxis: {
                                                                categories: categories, // Các ngày trong tháng
                                                                title: {
                                                                    text: "Ngày trong tháng"
                                                                }
                                                            },
                                                            yaxis: {
                                                                title: {
                                                                    text: "Doanh thu (VNĐ)"
                                                                }
                                                            },
                                                            tooltip: {
                                                                y: {
                                                                    formatter: function(val) {
                                                                        return val.toLocaleString('vi-VN') + " VNĐ"; // Định dạng hiển thị tooltip
                                                                    }
                                                                }
                                                            }
                                                        };

                                                        // Tạo và hiển thị biểu đồ
                                                        var chart = new ApexCharts(element, options);
                                                        chart.render();
                                                    });
                                                </script>

                                            </div>


                                        </div><!-- end card -->

                                    </div>
                                    <!--end col-->
                                </div><!-- end card -->

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