<?php
class GioHangController {
    // Thêm sản phẩm vào giỏ hàng
    public $modelSanPham;
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
        $this->modelSanPham = new SanPham();
    }

    public function themSanPham() {
        $sanPhamId = $_POST['san_pham_id'];
        $soLuong = $_POST['so_luong'] ?? 1;
    
        // Lấy sản phẩm từ Model
        $modelSanPham = new SanPham();
        $sanPham = $modelSanPham->getById($sanPhamId);
    
        if (!$sanPham) {
            echo "Sản phẩm không tồn tại!";
            return;
        }
    
        // Kiểm tra giỏ hàng hiện tại
        if (!isset($_SESSION['gio_hang'])) {
            $_SESSION['gio_hang'] = [];
        }
    
        // Tính tổng số lượng hiện tại trong giỏ hàng
        $soLuongHienTaiTrongGio = $_SESSION['gio_hang'][$sanPhamId]['so_luong'] ?? 0;
        $tongSoLuongSauKhiThem = $soLuongHienTaiTrongGio + $soLuong;
    
        // Kiểm tra nếu số lượng vượt quá kho
        if ($tongSoLuongSauKhiThem > $sanPham['so_luong']) {
            echo "<script>alert('Không thể thêm sản phẩm. Số lượng vượt quá hàng tồn kho!');</script>";
            echo "<script>window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
            return;
        }
    
        // Cập nhật hoặc thêm sản phẩm vào giỏ hàng
        if (isset($_SESSION['gio_hang'][$sanPhamId])) {
            $_SESSION['gio_hang'][$sanPhamId]['so_luong'] = $tongSoLuongSauKhiThem;
        } else {
            $_SESSION['gio_hang'][$sanPhamId] = [
                'san_pham_id' => $sanPham['id'],
                'ten_san_pham' => $sanPham['ten_san_pham'],
                'gia_ban' => $sanPham['gia_ban'],
                'so_luong' => $soLuong,
                'hinh_anh' => $sanPham['hinh_anh']
            ];
        }
    
        // Chuyển hướng về giỏ hàng
        header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php" . '?act=gio-hang');
    }
    

    // Hiển thị giỏ hàng
    public function xemGioHang() {
        $gioHang = $_SESSION['gio_hang'] ?? [];
        require './views/giohang/gio_hang.php';
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function xoaSanPham() {
        $sanPhamId = $_GET['san_pham_id'];

        if (isset($_SESSION['gio_hang'][$sanPhamId])) {
            unset($_SESSION['gio_hang'][$sanPhamId]);
        }

        header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php" . '?act=gio-hang');
    }

    // Cập nhật số lượng
    public function capNhatSoLuong() {
        $sanPhamId = $_POST['san_pham_id'];
        $soLuong = $_POST['so_luong'];
    
        // Lấy thông tin sản phẩm từ model
        $modelSanPham = new SanPham();
        $sanPham = $modelSanPham->getById($sanPhamId);
    
        if (!$sanPham) {
            echo "<script>alert('Sản phẩm không tồn tại!');</script>";
            echo "<script>window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
            return;
        }
    
        // Kiểm tra nếu số lượng vượt quá kho
        if ($soLuong > $sanPham['so_luong']) {
            echo "<script>alert('Số lượng sản phẩm vượt quá tồn kho!');</script>";
            echo "<script>window.location.href = '" . $_SERVER['HTTP_REFERER'] . "';</script>";
            return;
        }
    
        // Cập nhật số lượng trong giỏ hàng
        if (isset($_SESSION['gio_hang'][$sanPhamId])) {
            $_SESSION['gio_hang'][$sanPhamId]['so_luong'] = $soLuong;
        }
    
        header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php" . '?act=gio-hang');
    }
    
}
?>
