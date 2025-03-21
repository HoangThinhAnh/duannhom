<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/menu.php'; ?>
<style>
    /* Nút chính */
    .btn {
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 6px;
        text-align: center;
        display: inline-block;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    /* Nút "Xem Chi Tiết" */
    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: 1px solid #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    /* Nút "Hủy" */
    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: 1px solid #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        transform: scale(1.05);
    }

    /* Nút "Xác Nhận" */
    .btn-success {
        background-color: #28a745;
        color: #fff;
        border: 1px solid #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        transform: scale(1.05);
    }

    /* Cải tiến bảng */
    .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: #fff;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
    }

    .table thead {
        background-color: #f1f1f1;
        color: #333;
        text-align: center;
    }

    .table th,
    .table td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: center;
        font-size: 16px;
    }

    .table td {
        background-color: #f9f9f9;
        color: #333;
    }

    .table tr:hover {
        background-color: #f2f2f2;
        transition: background-color 0.3s;
    }

    .table th {
        font-weight: bold;
        color: #444;
    }

    .table .badge {
        padding: 8px;
        font-size: 14px;
        border-radius: 4px;
        display: inline-block;
    }

    /* Cải thiện thông báo */
    .alert {
        padding: 15px;
        font-size: 16px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Sidebar */
    #sidebar {
        background-color: #f8f9fa;
        border-right: 1px solid #ddd;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        padding-top: 20px;
        padding-bottom: 20px;
    }

    #sidebar .form-label {
        font-weight: bold;
        color: #333;
    }

    #sidebar .form-control {
        border-radius: 6px;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
    }

    #sidebar .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    /* Header và Footer */
    h1.section-title {
        font-size: 2rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 30px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        #sidebar {
            display: none;
        }

        .table th,
        .table td {
            padding: 8px;
            font-size: 14px;
        }

        .btn {
            font-size: 12px;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky">
                <form class="p-3" id="searchOrderForm" aria-label="Tìm kiếm đơn hàng">
                    <h5 class="text-primary">Tìm Kiếm Đơn Hàng</h5>
                    <div class="mb-3">
                        <label for="searchOrderCode" class="form-label">Tìm Theo Mã Đơn Hàng</label>
                        <input type="text" class="form-control" id="searchOrderCode" placeholder="Nhập mã đơn hàng"
                            oninput="searchOrderTable()">
                    </div>
                </form>
            </div>
        </nav>
        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-3">
            <section class="order-list-section py-5">
                <div class="container">
                    <h1 class="text-center mb-5 section-title">🛒 Danh Sách Đơn Hàng 📦</h1>
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error']; ?>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success']; ?>
                        </div>
                        <?php unset($_SESSION['success']); ?>
                    <?php endif; ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th><i class="bi bi-hash"></i>STT</th>
                                <th><i class="bi bi-hash"></i> Mã Đơn Hàng</th>
                                <th><i class="bi bi-person"></i> Tên Người Nhận</th>
                                <th><i class="bi bi-cash-stack"></i> Tổng Tiền</th>
                                <th><i class="bi bi-wallet"></i> Phương Thức Thanh Toán</th>
                                <th><i class="bi bi-info-circle"></i> Trạng Thái</th>
                                <th><i class="bi bi-gear"></i> Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['orders'] as $key => $order): ?>
                                <tr>
                                    <td style="font-size: 17px;"><?= $key + 1;    ?></td>

                                    <td style="font-size: 17px;"><?= htmlspecialchars($order['ma_don_hang']); ?></td>
                                    <td style="font-size: 17px;"><?= htmlspecialchars($order['ten_nguoi_nhan']); ?></td>
                                    <td style="font-size: 17px;"><?= number_format($order['tong_tien'], 0, ',', '.'); ?> VNĐ
                                    </td>
                                    <td style="font-size: 17px;">
                                        <?= $order['phuong_thuc_thanh_toan_id'] == 1 ? 'COD - Thanh toán khi nhận hàng' : 'Online'; ?>
                                    </td>
                                    <?php
                                    $statusMap = [
                                        1 => ['label' => 'Chờ Xác Nhận', 'class' => 'bg-secondary '],
                                        2 => ['label' => 'Đã Xác Nhận', 'class' => 'bg-primary mw-100 p-3'],
                                        3 => ['label' => 'Đang Giao', 'class' => 'bg-warning text-dark mw-100 p-3'],
                                        4 => ['label' => 'Đã Giao', 'class' => 'bg-info mw-100 p-3'],
                                        5 => ['label' => 'Thành Công', 'class' => 'bg-success mw-100 p-3'],
                                        6 => ['label' => 'Hoàn Hàng', 'class' => 'bg-dark mw-100 p-3'],
                                        7 => ['label' => 'Hủy Đơn', 'class' => 'bg-danger mw-100 p-3'],
                                    ];
                                    ?>
                                    <td>
                                        <span style="font-size: 15px;"
                                            class="badge <?= $statusMap[$order['trang_thai_id']]['class']; ?>">
                                            <?= $statusMap[$order['trang_thai_id']]['label']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <!-- Xem Chi Tiết -->
                                        <a href="index.php?act=chi-tiet-mua-hang&ma_don_hang=<?= $order['ma_don_hang']; ?>"
                                            class="btn btn-primary btn-sm">
                                            <i class="bi bi-eye"></i> Xem
                                        </a>

                                        <?php if ($order['trang_thai_id'] != 7 && $order['trang_thai_id'] != 5 && $order['trang_thai_id'] != 2 && $order['trang_thai_id'] != 6): ?>
                                            <!-- Hủy Đơn -->
                                            <a href="index.php?act=huy-don-hang&ma_don_hang=<?= $order['ma_don_hang'] ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn có chắc chắn muốn hủy?')">
                                                <i class="bi bi-x-circle"></i> Hủy
                                            </a>
                                            <?php if ($order['trang_thai_id'] == 4): ?>
                                                <a href="index.php?act=xac-nhan-don-hang&ma_don_hang=<?= $order['ma_don_hang'] ?>"
                                                    class="btn btn-success btn-sm"
                                                    onclick="return confirm('Bạn có chắc chắn xác nhận đơn hàng đã hoàn tất?')">
                                                    <i class="bi bi-check-circle"></i> Xác Nhận
                                                </a>
                                            <?php endif; ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div id="noResult" class="text-center text-muted" style="display: none;">
                        Không có đơn hàng nào phù hợp.
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
<?php require_once 'views/layout/footer.php'; ?>
<script>
    function searchOrderTable() {
        let inputOrderCode = document.getElementById('searchOrderCode').value.trim().toLowerCase();
        let rows = document.querySelectorAll('table tbody tr');
        let hasResult = false;

        rows.forEach(row => {
            let code = row.querySelector('td:first-child').innerText.toLowerCase();

            if (code.includes(inputOrderCode) || inputOrderCode === '') {
                row.style.display = '';
                hasResult = true;
            } else {
                row.style.display = 'none';
            }
        });

        document.getElementById('noResult').style.display = hasResult ? 'none' : 'block';
    }
</script>