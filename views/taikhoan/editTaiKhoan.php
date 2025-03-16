<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin Tài Khoản</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php require_once 'views/layout/header.php'; ?>
    <?php require_once 'views/layout/menu.php'; ?>

    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100" style="background-color: #f8f9fa;">
        <div class="w-100 p-5 bg-light rounded shadow-lg" style="max-width: 900px;">
            <h2 class="text-center mb-4">Sửa Thông Tin Tài Khoản</h2>

            <!-- Hiển thị thông báo lỗi -->
            <?php if (isset($_SESSION['errors'])): ?>
                <div class="alert alert-danger">
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php endif; ?>

            <!-- Hiển thị thông báo thành công -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <p><?= htmlspecialchars($_SESSION['success']) ?></p>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <!-- Form sửa thông tin -->
            <form method="post" action="<?= 'http://localhost/PH49685-DuAn1/base_du_an_1/index.php' . '?act=updateTaiKhoan' ?>">
                <input type="hidden" name="email" value="<?php echo $nguoiDung['email']; ?>" />

                <div class="mb-3">
                    <label for="ten_nguoi_dung" class="form-label">Tên người dùng</label>
                    <input type="text" class="form-control" name="ten_nguoi_dung" id="ten_nguoi_dung" value="<?php echo htmlspecialchars($nguoiDung['ten_nguoi_dung']); ?>" required />
                </div>

                <div class="mb-3">
                    <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="so_dien_thoai" id="so_dien_thoai" value="<?php echo htmlspecialchars($nguoiDung['so_dien_thoai']); ?>" required />
                </div>

                <div class="mb-3">
                    <label for="dia_chi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi" id="dia_chi" value="<?php echo htmlspecialchars($nguoiDung['dia_chi']); ?>" required />
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($nguoiDung['email']); ?>" required />
                </div>

                <div class="mb-3">
                    <label for="mat_khau_cu" class="form-label">Mật khẩu cũ</label>
                    <input type="password" class="form-control" name="mat_khau_cu" id="mat_khau_cu" required />
                </div>

                <div class="mb-3">
                    <label for="mat_khau_moi" class="form-label">Mật khẩu mới</label>
                    <input type="password" class="form-control" name="mat_khau_moi" id="mat_khau_moi" />
                    <small style="color: blue;">Để trống nếu không thay đổi mật khẩu</small>
                </div>

                <div class="mb-3">
                    <label for="xac_nhan_mat_khau_moi" class="form-label">Xác nhận mật khẩu mới</label>
                    <input type="password" class="form-control" name="xac_nhan_mat_khau_moi" id="xac_nhan_mat_khau_moi" />
                    <small style="color: blue;">Để trống nếu không thay đổi mật khẩu</small>
                </div>



                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5 py-3 shadow-lg hover-shadow-lg">Cập nhật</button>
                    <a href="http://localhost/PH49685-DuAn1/base_du_an_1/index.php?act=taikhoan" class="btn btn-secondary btn-lg px-5 py-3 shadow-lg hover-shadow-lg ms-3">Hủy</a>
                </div>

            </form>
        </div>
    </div>

    <!-- Link Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php require_once 'views/layout/footer.php'; ?>
</body>

</html>