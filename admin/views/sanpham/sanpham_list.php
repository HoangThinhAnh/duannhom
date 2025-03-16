<!doctype html>
<html lang="vi" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="UTF-8" />
    <title>Danh sách sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Quản lý sản phẩm" name="description" />
    <meta content="Your Company" name="author" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet" />

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- Additional JS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

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
                                <h4 class="mb-sm-0">Quản Lý Sản Phẩm</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sản Phẩm</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm</h4>
                                    <a href="index.php?act=add-sanpham" class="btn btn-soft-success"><i
                                            class="ri-add-circle-line align-middle me-1"></i> Thêm sản phẩm mới</a>
                                </div>

                                <div class="card-body">
                                    <div id="example1_wrapper" class="table-responsive">
                                        <table id="example1" class="table table-striped table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên Sản Phẩm</th>
                                                    <th>Danh Mục</th>
                                                    <th>Hình Ảnh</th>
                                                    <th>Giá Bán</th>
                                                    <th>Số Lượng</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Hành Động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($Sanphams) && count($Sanphams) > 0) : ?>
                                                    <?php foreach ($Sanphams as $key=> $Sanpham) : ?>
                                                        <tr>
                                                            <td><?= $key +1 ?></td>
                                                            <td><?= htmlspecialchars($Sanpham['ten_san_pham']) ?></td>
                                                            <td><?= htmlspecialchars($Sanpham['ten_danh_muc']) ?></td>
                                                            <td><img src="uploads/<?= htmlspecialchars($Sanpham['hinh_anh']) ?>"
                                                                    alt="Hình sản phẩm" width="100" height="50"></td>
                                                            <td><?= number_format($Sanpham['gia_ban']) ?></td>
                                                            <td><?= $Sanpham['so_luong'] ?></td>
                                                            <td ><?= $Sanpham['trang_thai'] ?></td>
                                                            <td>
                                                                <a href="index.php?act=chitiet-sanpham&id=<?= $Sanpham['id'] ?>"
                                                                   class="btn btn-info btn-sm me-1">Xem</a>
                                                                <a href="index.php?act=edit-sanpham&id=<?= $Sanpham['id'] ?>"
                                                                   class="btn btn-warning btn-sm me-1">Sửa</a>
                                                                <a href="index.php?act=delete-sanpham&id=<?= $Sanpham['id'] ?>"
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

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

</html>
