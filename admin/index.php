<?php
session_start();

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ
require_once './views/dangnhap/check_dang_nhap_admin.php';

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/NguoiDungController.php';
require_once 'controllers/LienHeController.php';
require_once 'controllers/KhuyenMaiController.php';
require_once 'controllers/TinTucController.php';
require_once 'controllers/bannerController.php';
require_once 'controllers/TrangThaiDonHangController.php';
require_once 'controllers/SanphamController.php';
require_once 'controllers/thongkeController.php';
require_once 'controllers/DonHangController.php';
require_once 'controllers/BinhLuanController.php';
require_once 'controllers/DanhGiaController.php';



// Require toàn bộ file Models
require_once 'models/DanhMuc.php';
require_once 'models/NguoiDung.php';
require_once 'models/LienHe.php';
require_once 'models/KhuyenMai.php';
require_once 'models/TinTuc.php';
require_once 'models/banner.php';
require_once 'models/TrangThai.php';
require_once 'models/SanphamModel.php';
require_once 'models/thongKe.php';
require_once 'models/DonHang.php';
require_once 'models/AdminBinhLuan.php';
require_once 'models/AdminDanhGia.php';




// Route
$act = $_GET['act'] ?? '/';

if ($act !== 'form-dang-nhap' && $act !== 'dang-nhap' && $act !== 'dang-xuat') {
  checkDangNhapAdmin();
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
  // Dashboards
  '/' => (new thongkeController())->home(),

  // Quản lý danh mục sản phẩm
  'danh-mucs'                => (new DanhMucController())->index(),
  'form-them-danh-muc'       => (new DanhMucController())->create(),
  'them-danh-muc'            => (new DanhMucController())->store(),
  'form-sua-danh-muc'        => (new DanhMucController())->edit(),
  'sua-danh-muc'             => (new DanhMucController())->update(),
  'xoa-danh-muc'             => (new DanhMucController())->destroy(),
  'search-danh-muc'        => (new DanhMucController())->search(),


  // Quản lý người dùng
  'nguoi-dungs'              => (new NguoiDungController())->index(),
  'form-them-nguoi-dung'     => (new NguoiDungController())->create(),
  'them-nguoi-dung'          => (new NguoiDungController())->store(),
  'form-sua-nguoi-dung'      => (new NguoiDungController())->edit(),
  'sua-nguoi-dung'           => (new NguoiDungController())->update(),
  'xoa-nguoi-dung'           => (new NguoiDungController())->destroy(),
  'search-nguoi-dung'        => (new NguoiDungController())->search(),

  // Quản lý liên hệ
  'lien-hes'              => (new LienHeController())->index(),
  'form-them-lien-he'     => (new LienHeController())->create(),
  'them-lien-he'          => (new LienHeController())->store(),
  'form-sua-lien-he'      => (new LienHeController())->edit(),
  'sua-lien-he'           => (new LienHeController())->update(),
  'xoa-lien-he'           => (new LienHeController())->destroy(),
  'search-lien-he'        => (new LienHeController())->search(),

  // Quản lý khuyến mãi
  'list-khuyen-mai'   => (new KhuyenMaiController())->showKmaiList(),
  'add'               => (new KhuyenMaiController())->showAddKmaiForm(),
  'add-khuyen-mai'    => (new KhuyenMaiController())->addKmai(),
  'edit-khuyen-mai'   => (new KhuyenMaiController())->showEditKmaiForm(),
  'update-khuyen-mai' => (new KhuyenMaiController())->updateKmai(),
  'delete-khuyen-mai' => (new KhuyenMaiController())->deleteKmai($_GET['id'] ?? null),
  default          => (new KhuyenMaiController())->showKmaiList(),
  'search-khuyen-mai'        => (new KhuyenMaiController())->search(),

  // Quản lý banner
  'banners'             => (new bannerController())->home(),
  'form-them-banner'    => (new bannerController())->create(),
  'them-banner'         => (new bannerController())->add(),
  'form-sua-banner'     => (new bannerController())->edit(),
  'sua-banner'          => (new bannerController())->update(),
  'xoa-banner'          => (new bannerController())->delete(),
  'search-banner'        => (new bannerController())->search(),

  // Quản lý tin tức
  'tin-tucs'             => (new TinTucController())->home(),
  'form-them-tin-tuc'    => (new TinTucController())->create(),
  'them-tin-tuc'         => (new TinTucController())->add(),
  'form-sua-tin-tuc'     => (new TinTucController())->edit(),
  'sua-tin-tuc'          => (new TinTucController())->update(),
  'xoa-tin-tuc'          => (new TinTucController())->delete(),
  'search-tin-tuc'        => (new TinTucController())->search(),

  // Quản lý trạng thái đơn hàng
  'trang-thai-don-hangs'               => (new TrangThaiDonHangController())->index(),
  'form-them-trang-thai-don-hang'     => (new TrangThaiDonHangController())->create(),
  'them-trang-thai-don-hang'          => (new TrangThaiDonHangController())->store(),
  'form-sua-trang-thai-don-hang'      => (new TrangThaiDonHangController())->edit(),
  'sua-trang-thai-don-hang'           => (new TrangThaiDonHangController())->update(),
  'xoa-trang-thai-don-hang'           => (new TrangThaiDonHangController())->destroy(),
  'search-trang-thai-don-hang'        => (new TrangThaiDonHangController())->search(),

  // Các route khác (Bình luận)
  'binh-luan' => (new BinhLuanController())->ListBinhLuan(),
  'toggle-binhluan' => (new BinhLuanController())->toggleStatus(),
  'chitiet-sanpham' => (new SanphamController())->showChitietSanphamlist(),
  'delete-binhluan'     => (new BinhLuanController())->deleteBinhluan($_GET['id'] ?? null),


  //đánh giá
  'danh-gia' => (new DanhGiaController())->listDanhGia(),
  'delete-danhgia'     => (new DanhGiaController())->deleteDanhgia($_GET['id'] ?? null),


  // Quản lý sản phẩm
  'list-sanpham'       => (new SanphamController())->showSanphamList(),
  'add-sanpham'        => (new SanphamController())->showAddSanphamForm(),
  'add-sanpham-submit' => (new SanphamController())->addSanpham(),
  'edit-sanpham'       => (new SanphamController())->showEditSanphamForm(),
  'update-sanpham'     => (new SanphamController())->updateSanpham(),
  'delete-sanpham'     => (new SanphamController())->deleteSanpham($_GET['id'] ?? null),

  // Đăng nhập, đăng xuất
  'form-dang-nhap'    => (new NguoiDungController())->formDangNhap(),
  'dang-nhap'    => (new NguoiDungController())->DangNhap(),
  'dang-xuat' => (new NguoiDungController())->DangXuat(),

  // Quản lý đơn hàng
  'don-hangs'           => (new AdminDonHangController())->danhSachDonHang(),
  'form-sua-don-hang'   => (new AdminDonHangController())->edit(),
  'sua-don-hang'        => (new AdminDonHangController())->update(),
  'chi-tiet-don-hang'      => (new AdminDonHangController())->detailDonHang(),
  'search-don-hang'     => (new AdminDonHangController())->search(),

  // Thống kê
  'thongkes'             => (new thongkeController())->home(),
};
