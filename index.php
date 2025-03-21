<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/LienHeController.php';
require_once './controllers/KhuyenmaiController.php';
require_once './controllers/tintucController.php';
require_once './controllers/TaiKhoanController.php';
require_once './controllers/BinhLuanController.php';
require_once './controllers/GioHangController.php';
require_once './controllers/DonHangController.php';
require_once './controllers/DanhGiaController.php';
require_once './controllers/thanhToanController.php';



// Require toàn bộ file Models
require_once './models/NguoiDung.php';
require_once 'models/Sanpham.php';
require_once './models/LienHe.php';
require_once 'models/Khuyenmai.php';
require_once './models/tinTuc.php';
require_once 'models/AdminBinhLuan.php';
require_once 'models/DonHang.php';
require_once 'models/DanhGia.php';
require_once './models/DonHangClient.php';
require_once './admin/models/SanphamModel.php';



// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->home(),

    // Đăng nhập client
    'login' => (new HomeController())->formLogin(),
    'check-login' => (new HomeController())->checkLogin(),

    // Đăng ký

    'dangky' => (new HomeController())->formDangKy(),
    'check-dangky' => (new HomeController())->checkDangKy(),

    // Đăng xuất
    'logout' => (new HomeController())->logout(),

    // Liên hệ
    'lien-he' => (new LienHeClientController())->formLienHe(),
    'check-lien-he' => (new LienHeClientController())->checkLienHe(),

    //khuyen mai 
    'khuyen-mai' => (new KmaiController())->listKhuyenmai(),

    // Tin tức
    'tintucs'  => (new TinTucController())->list_tintuc(),
    'theloai-tintuc'  => (new TinTucController())->Show_category(),
    'detail-tintuc'  => (new TinTucController())->showDetail(),

    // Tài khoản cá nhân
    'taikhoan'  => (new TaiKhoanController())->taikhoan(),
    'editTaiKhoan'  => (new TaiKhoanController())->editTaiKhoan(),
    'updateTaiKhoan' => (new TaiKhoanController())->updateTaiKhoan(),

    //Sản phẩm
    'list-sanpham'       => (new HomeController())->danhSachSanPham(),
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'add-binhluan' => (new BinhLuanController())->addBinhLuan(),
    'search-san-pham'       => (new HomeController())->search(),
    'danh-muc-san-pham'  => (new HomeController())->danhMucSanPham(),

    // Giới thiệu
    'gioi-thieu' => (new HomeController())->gioithieu(),

    // Giỏ hàng
    'gio-hang' => (new GioHangController())->xemGioHang(),
    'them-san-pham' => (new GioHangController())->themSanPham(),
    'xoa-san-pham' => (new GioHangController())->xoaSanPham(),
    'cap-nhat-so-luong' => (new GioHangController())->capNhatSoLuong(),

    //donhang
    'lich-su-mua-hang' => (new DonHangController())->LichSuMuaHang(),
    'chi-tiet-mua-hang' => (new DonHangController())->ChiTietMuaHang(),
    'huy-don-hang' => (new DonHangController())->HuyDonHang(),

    // Thanh toán
    'thanh-toans'       => (new ThanhToanController())->hienThiThanhToan(),
    'xu-ly-thanh-toan'       => (new ThanhToanController())->postThanhToan(),

    // Quên mật khẩu
    'forgot-password' => (new HomeController())->formForgotPassword(),
    'retrieve-password' => (new HomeController())->retrievePassword(),

    'xac-nhan-don-hang' =>(new DonHangController())->XacNhanDonHang()

};
