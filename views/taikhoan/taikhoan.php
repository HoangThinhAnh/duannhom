<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Tài Khoản</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/menu.php'; ?>

<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100" style="background-color: #f8f9fa;">
    <div class="w-100 p-5 bg-light rounded shadow-lg" style="max-width: 900px;">
        <h2 class="text-center mb-4">Thông tin tài khoản</h2>

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

        <div class="row mb-4">
            <div class="col-md-4">
                <strong>Tên người dùng:</strong>
            </div>
            <div class="col-md-8">
                <p><?php echo htmlspecialchars($nguoiDung['ten_nguoi_dung']); ?></p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <strong>Email:</strong>
            </div>
            <div class="col-md-8">
                <p><?php echo htmlspecialchars($nguoiDung['email']); ?></p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <strong>Số điện thoại:</strong>
            </div>
            <div class="col-md-8">
                <p><?php echo htmlspecialchars($nguoiDung['so_dien_thoai']); ?></p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-4">
                <strong>Địa chỉ:</strong>
            </div>
            <div class="col-md-8">
                <p><?php echo htmlspecialchars($nguoiDung['dia_chi']); ?></p>
            </div>
        </div>

        <!-- Nút chỉnh sửa thông tin -->
        <div class="d-flex justify-content-center mt-4">
            <a href="<?= 'http://localhost/PH49685-DuAn1/base_du_an_1/index.php' . '?act=editTaiKhoan' ?>" class="btn btn-primary btn-lg px-5 py-3 shadow-lg hover-shadow-lg">Sửa thông tin</a>
        </div>
    </div>
</div>

<!-- Link Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php require_once 'views/layout/footer.php'; ?>
</body>
</html>
