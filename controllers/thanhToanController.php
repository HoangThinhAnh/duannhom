<?php
class ThanhToanController
{

    public $ModelDonHangClient;
    public $modelSanPham;
    public $SanphamModel;





    public function __construct()
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!isset($_SESSION['nguoidungs_client'])) {
            header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php?act=login");
            exit();
        }

        $this->modelSanPham = new SanPham();

        $this->ModelDonHangClient = new DonHangClient();

        $this->SanphamModel = new SanphamModel();
    }


    // Hàm hiển thị trang thanh toán
    public function hienThiThanhToan()
    {

        // // Kiểm tra và hiển thị thông báo nếu có
        // if (isset($_SESSION['thong_bao'])) {
        //     echo '<div class="alert alert-success">' . $_SESSION['thong_bao'] . '</div>';
        //     unset($_SESSION['thong_bao']);
        // }
        // Lấy thông tin người dùng từ session
        $userInfo = $_SESSION['nguoidungs_client'];

        // Kiểm tra và gán địa chỉ nếu có, nếu không thì để trống
        $diaChi = isset($userInfo['dia_chi']) ? $userInfo['dia_chi'] : '';

        // Lấy giỏ hàng từ session
        $gioHang = $_SESSION['gio_hang'] ?? [];

        // Tính toán tổng tiền
        $tongTienSanPham = 0;
        foreach ($gioHang as $id => $item) {
            $thanhTien = $item['gia_ban'] * $item['so_luong'];
            $tongTienSanPham += $thanhTien;
        }


        // Truyền dữ liệu vào view
        require_once './views/thanhtoan/thanhToan.php';
    }




    public function postThanhToan()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
        $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
        $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
        $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
        $ghi_chu = $_POST['ghi_chu'];
        $tong_tien = $_POST['tong_tien'];
        $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'] ?? 1;

        $ngay_dat = date('Y-m-d');
        $trang_thai_id = 1; // Mặc định trạng thái đơn hàng là "Chờ xác nhận"

        $userInfo = $_SESSION['nguoidungs_client'];
        $tai_khoan_id = $userInfo['id'];
        $ma_don_hang = 'DH-' . rand(100, 999); // Sinh mã đơn hàng ngẫu nhiên

        // Gọi Model để thêm đơn hàng
        $donhang = $this->ModelDonHangClient->addDonHangClient(
            $tai_khoan_id,
            $ten_nguoi_nhan,
            $email_nguoi_nhan,
            $dia_chi_nguoi_nhan,
            $sdt_nguoi_nhan,
            $ghi_chu,
            $tong_tien,
            $phuong_thuc_thanh_toan_id,
            $ngay_dat,
            $trang_thai_id,
            $ma_don_hang
        );

        // Kiểm tra nếu đơn hàng được tạo thành công
        if ($donhang) {
            foreach ($_SESSION['gio_hang'] as $item) {
                $sanPhamId = $item['san_pham_id'];
                $soLuongMua = $item['so_luong'];
                $giaSanPham = $item['gia_khuyen_mai'] ?? $item['gia_ban'];

                // Cập nhật lại số lượng sản phẩm trong kho
                $this->SanphamModel->capNhatSoLuongSanPham($sanPhamId, $soLuongMua);

                // Thêm chi tiết đơn hàng (có cả ma_don_hang)
                $this->ModelDonHangClient->addChiTietDonHang(
                    $donhang,
                    $sanPhamId,
                    $giaSanPham,
                    $soLuongMua,
                    $giaSanPham * $soLuongMua,
                    $ma_don_hang
                );
            }

            $_SESSION['thong_bao'] = "Đặt hàng thành công!";
            header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php?act=lich-su-mua-hang");
            exit();
        } else {
            echo "Không thể tạo đơn hàng!";
        }
    }
}

}