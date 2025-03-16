<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>

/* Tiêu đề */
h2 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

/* Bảng giỏ hàng */
.table {
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 20px;
    text-align: center;
}

.table th {
    background-color: #007bff;
    color: black;
    font-size: 16px;
    text-align: center;
    padding: 15px;
    border-bottom: 2px solid #f0f0f0;
}

.table td {
    padding: 12px;
    vertical-align: middle;
}

/* Hình ảnh trong bảng */
.table img {
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

/* Nút */
.nut {
    background-color: #007bff;
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 25px;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.3s ease;
}

.nut:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.nut:active {
    transform: translateY(1px);
}

.nut.xoa {
    background-color: #dc3545;
}

.nut.xoa:hover {
    background-color: #c82333;
}

/* Form cập nhật số lượng */
form input[type="number"] {
    width: 70px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 5px;
    text-align: center;
    margin-right: 10px;
}

/* Tiến hành đặt hàng */
.text-right .nut {
    background-color: #28a745;
}

.text-right .nut:hover {
    background-color: #218838;
}

</style>
<body>
<?php require_once 'views/layout/header.php'; ?>

<?php require_once 'views/layout/menu.php'; ?>
<?php if (!empty($gioHang)): ?>
    <div class="container my-5">
        <h2 class="mb-4">Giỏ hàng của bạn</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gioHang as $id => $item): ?>
                    <tr>
                        <td><img src="<?= BASE_URL_IMG . $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>" class="img-fluid" width="100"></td>
                        <td><?= $item['ten_san_pham'] ?></td>
                        <td><?= number_format($item['gia_ban']) ?>đ</td>
                        <td>
                            <form action="index.php?act=cap-nhat-so-luong" method="POST" class="form-inline">
                                <input type="number" name="so_luong" value="<?= $item['so_luong'] ?>" min="1" class="form-control mr-2">
                                <input type="hidden" name="san_pham_id" value="<?= $id ?>">
                                <button type="submit" class="nut">Cập nhật</button>
                            </form>
                        </td>
                        <td><?= number_format($item['gia_ban'] * $item['so_luong']) ?>đ</td>
                        <td>
                            <a href="index.php?act=xoa-san-pham&san_pham_id=<?= $id ?>" class="nut xoa">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-right">
            <a href="index.php?act=thanh-toans" class="nut">Tiến Hành Đặt Hàng</a>
        </div>
    </div>
<?php else: ?>
    <div class="container my-5">
        <h2 class="text-center">Giỏ hàng của bạn đang trống!</h2>
    </div>
<?php endif; ?>

<?php require_once 'views/layout/footer.php'; ?>

</body>
</html>

