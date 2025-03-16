<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link đến Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-image: url('https://authentic-shoes.com/wp-content/uploads/2023/05/jordan1fearlesscollectionreleaseinfo-7749_d25ec236a3f845f59ec02ab11167211f_2048x2048.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .card {
        background-image: url('https://file.hstatic.net/200000037626/file/maxresdefault__3__d4698533464d4cea9dcab66c9363c89e_grande.jpg');
        /* Đường dẫn đến ảnh */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: black;
    }

    .card-body {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
    }
</style>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Đăng Nhập Admin</h5>

                <?php if (isset($_SESSION['error'])) { ?>
                    <p class="text-danger"><?= $_SESSION['error'] ?></p>
                <?php } else { ?>
                    <p class="login">Vui lòng đăng nhập</p>
                <?php } ?>

                <form action="<?= 'http://localhost/PH49685-DuAn1/base_du_an_1/admin/index.php' . '?act=dang-nhap' ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" minlength="6" name="mat_khau">
                    </div>

                    <div class="mb-3">
                        <a href="<?= 'http://localhost/PH49685-DuAn1/base_du_an_1/index.php' . '?act=forgot-password' ?>" class="text-decoration-none">Quên mật khẩu?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
                </form>
                <a href="http://localhost/PH49685-DuAn1/base_du_an_1/index.php" class="btn btn-secondary w-100 mt-3">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
</body>

</html>