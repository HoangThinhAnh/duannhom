<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/menu.php'; ?>


                <!-- breadcrumb area start -->
                <div class="breadcrumb-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb-wrap">
                                    <nav aria-label="breadcrumb">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="shop.html">Liên hệ</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="w-100 p-4">
        <h2 class="text-center mb-4">Liên hệ với chúng tôi</h2>

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

        <form action="<?= 'http://localhost/PH49685-DuAn1/base_du_an_1/index.php' . '?act=check-lien-he' ?>" method="post">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="noi_dung" class="form-label">Nội dung</label>
                        <textarea class="form-control" id="noi_dung" name="noi_dung" rows="5" placeholder="Nhập nội dung liên hệ" required></textarea>
                    </div>
                </div>

                <!-- Submit button with Bootstrap styling -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5 py-3 shadow-lg hover-shadow-lg">Gửi</button>
                </div>
            </div>
        </form>

    </div>
</div>

<!-- Google Recaptcha script (if added) -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Link Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php require_once 'views/layout/footer.php'; ?>
</body>
</html>
