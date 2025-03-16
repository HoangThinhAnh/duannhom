<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/menu.php'; ?>
<style>


</style>
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="shop.html">Đơn hàng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->
<div class="cart-main-wrapper section-padding">
    <div class="container">
        <div class="section-bg-color">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-7">
                    <!-- Thông tin sản phẩm của đơn hàng -->
                    <div class="cart-table table-responsive">
                        <?php if (!empty($sanPhamTrongDon)) : ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sanPhamTrongDon as $item) : ?>
                                <tr>
                                    <td>
                                        <img src="<?= BASE_URL_IMG . $item['hinh_anh'] ?>" alt="Hình ảnh sản phẩm"
                                            width="100">
                                    </td>
                                    <td><?= htmlspecialchars($item['ten_san_pham']) ?></td>
                                    <td><?= number_format($item['gia_ban'], 0, ',', '.') ?> đ</td>
                                    <td><?= $item['so_luong'] ?></td>
                                    <td><?= number_format($item['gia_ban'] * $item['so_luong'], 0, ',', '.') ?> đ</td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else : ?>
                        <p>Không có sản phẩm nào trong đơn hàng này.</p>
                        <?php endif; ?>

                    </div>
                </div>


                <div class="col-lg-5">
                    <!-- Thông tin sản phẩm của đơn hàng -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        Thông tin đơn hàng
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Mã đơn hàng:</th>
                                    <td><?= $donHang['ma_don_hang'] ?></td>
                                </tr>
                                <tr>
                                    <th>Người nhận:</th>
                                    <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?= $donHang['email_nguoi_nhan'] ?></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại</th>
                                    <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ:</th>
                                    <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
                                </tr>
                                <tr>
                                    <th>Ngày đặt: </th>
                                    <td><?= $donHang['ngay_dat'] ?></td>
                                </tr>
                                <!-- <tr>
                                    <th>Ghi chú:</th>
                                    <td><?= $donHang['ghi_chu'] ?></td>
                                </tr> -->

                            
                                
                              
                                <tr>
                                    <th>Tổng tiền:</th>
                                    <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> đ</td>
                                </tr>
                                <tr>
                                    <th>Phương thức thanh toán:</th>
                                    <td>
                                        <?= isset($donHang['phuong_thuc_thanh_toan_id']) ?
                                            ($donHang['phuong_thuc_thanh_toan_id'] == 1 ? 'COD - Thanh toán khi nhận hàng' : 'Online') : 'Không xác định'; ?>
                                    </td>
                                </tr>
                                <?php
                           $statusMap = [
                               1 => ['label' => 'Chờ Xác Nhận', 'class' => 'bg-secondary '],
                               2 => ['label' => 'Đã Xác Nhận', 'class' => 'bg-primary mw-100 p-3'],
                               3 => ['label' => 'Đang Giao', 'class' => 'bg-warning text-dark mw-100 p-3'],
                               4 => ['label' => 'Đã Giao', 'class' => 'bg-info mw-100 p-3'],
                               5 => ['label' => 'Thành Công', 'class' => 'bg-success mw-100 p-3'],
                               6 => ['label' => 'Thất Bại', 'class' => 'bg-dark mw-100 p-3'],
                               7 => ['label' => 'Hủy Đơn', 'class' => 'bg-danger mw-100 p-3'],
                           ];
                           ?>
                                <tr>
                                    <th>Trạng thái đơn hàng:</th>
                                    <td>
                                        <?php
                                        $statusId = isset($donHang['trang_thai_id']) ? $donHang['trang_thai_id'] : null;
                                        if ($statusId && isset($statusMap[$statusId])): ?>
                                        <span style="font-size: 15px;"
                                            class="badge <?= $statusMap[$statusId]['class']; ?>">
                                            <?= $statusMap[$statusId]['label']; ?>
                                        </span>
                                        <?php else: ?>
                                        Không xác định
                                        <?php endif; ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
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

function viewOrderDetails(orderId) {
    // Hiển thị chi tiết đơn hàng bằng AJAX hoặc chuyển hướng
    window.location.href = `order_details.php?id=${orderId}`;
}
</script>