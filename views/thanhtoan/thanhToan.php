<?php require_once 'views/layout/header.php'; ?>

<?php require_once 'views/layout/menu.php'; ?>
<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thanh Toán</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">

            <div class="col-12">
                <!-- Checkout Login Coupon Accordion Start -->
                <div class="checkoutaccordion" id="checkOutAccordion">
                    <div class="card">
                        <h6>Thêm Mã Giảm Giá <span data-bs-toggle="collapse" data-bs-target="#couponaccordion"> Click nhập mã giảm giá vào </span></h6>
                        <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                            <div class="card-body">
                                <div class="cart-update-option">
                                    <div class="apply-coupon-wrapper">
                                        <form action="#" method="post" class=" d-block d-md-flex">
                                            <input type="text" placeholder="Mời Bạn Nhập Mã Giảm Giá" required />
                                            <button class="btn btn-sqr">Đồng Ý</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Checkout Login Coupon Accordion End -->
            </div>
            <!-- Checkout Billing Details -->
            <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Thông Tin Người Nhận</h5>
                            <div class="billing-form-wrap">

                                <div class="single-input-item">
                                    <label for="ten_nguoi_nhan" class="required">Tên người nhận</label>
                                    <!-- Điền tên người nhận từ session -->
                                    <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" placeholder="Tên người Nhận" value="<?= htmlspecialchars($userInfo['ten_nguoi_dung']) ?>" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="email_nguoi_nhan" class="required">Email</label>
                                    <!-- Điền email người nhận từ session -->
                                    <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" placeholder="Email" value="<?= htmlspecialchars($userInfo['email']) ?>" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="dia_chi_nguoi_nhan" class="required">Địa Chỉ</label>
                                    <!-- Điền địa chỉ từ session -->
                                    <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" placeholder="Địa chỉ" value="<?= ($userInfo['dia_chi']) ?>" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="sdt_nguoi_nhan">Số Điện Thoại</label>
                                    <!-- Điền số điện thoại người nhận từ session -->
                                    <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" placeholder="Phone" value="<?= htmlspecialchars($userInfo['so_dien_thoai']) ?>" />
                                </div>
                                <div class="single-input-item">
                                    <label for="ghi_chu">Ghi Chú</label>
                                    <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="3" placeholder="Vui lòng nhập ghi chú của bạn"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Tóm Tắt Đơn Hàng</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản Phẩm</th>
                                                <th>Thành Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tongTienSanPham = 0; // Biến lưu tổng tiền sản phẩm
                                            foreach ($gioHang as $id => $item) {
                                                // Tính thành tiền mỗi sản phẩm
                                                $thanhTien = $item['gia_ban'] * $item['so_luong'];
                                                $tongTienSanPham += $thanhTien; // Cộng dồn tổng tiền sản phẩm
                                            ?>
                                                <tr>
                                                    <td>
                                                        <a href=""><?= htmlspecialchars($item['ten_san_pham']) ?> <strong> × <?= $item['so_luong'] ?></strong></a>
                                                    </td>
                                                    <td><?= number_format($thanhTien) ?>đ</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Tổng Tiền Sản Phẩm</td>
                                                <td><strong><?= number_format($tongTienSanPham) ?>đ</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Phí Vận Chuyển</td>
                                                <td><strong>30.000đ</strong></td>
                                            </tr>
                                            <tr>
                                                <td>Tổng Tiền Đơn Hàng</td>
                                                <input type="hidden" name="tong_tien" value="<?= ($tongTienSanPham + 30000) ?>">
                                                <td><strong><?= number_format($tongTienSanPham + 30000) ?>đ</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="1" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon"> Thanh Toán Khi Nhận Hàng (COD)</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="1">
                                            <p>Có thể thanh toán sau khi đã nhận hàng thành công (Cần xác thực đơn hàng).</p>
                                        </div>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="directbank" name="paymentmethod" value="2" class=" custom-control-input" />
                                                <label class="custom-control-label" for="directbank">Thanh Toán Online</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="bank">
                                            <p>Khách hàng chuyển khoản khi thanh toán online</p>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">Xác nhận bạn đồng ý mua hàng</label>
                                        </div>
                                        <button type="submit" class="btn btn-sqr">Đặt Hàng</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout main wrapper end -->
</main>



<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->

<?php require_once 'views/layout/footer.php'; ?>
