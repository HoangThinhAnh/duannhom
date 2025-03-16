<?php
class DonHangClient
{

    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }


    // hien thi don hang cua nguoi dung vao bang don hang
    public function  addDonHangClient($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $sdt_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $trang_thai_id, $ma_don_hang)
    {
        try {
            $sql = 'INSERT INTO don_hangs (tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, dia_chi_nguoi_nhan, sdt_nguoi_nhan, ghi_chu, tong_tien, phuong_thuc_thanh_toan_id, ngay_dat, trang_thai_id, ma_don_hang)
                    VALUES (:tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :dia_chi_nguoi_nhan, :sdt_nguoi_nhan, :ghi_chu, :tong_tien, :phuong_thuc_thanh_toan_id, :ngay_dat, :trang_thai_id, :ma_don_hang)';


            $stmt = $this->conn->prepare($sql);

            // Gán giá trị
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':ghi_chu' => $ghi_chu,
                ':tong_tien' => $tong_tien,
                ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                ':ngay_dat' => $ngay_dat,
                ':trang_thai_id' => $trang_thai_id,
                ':ma_don_hang' => $ma_don_hang,

            ]);


            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }


    // hien thi san pham vao chi tiet don hang
    public function addChiTietDonHang($donHangId, $sanPhamId, $donGia, $soLuong, $thanhTien, $maDonHang)
{
    try {
        if (empty($sanPhamId)) {
            throw new Exception('Sản phẩm không hợp lệ, san_pham_id bị thiếu!');
        }

        $sql = 'INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, don_gia, so_luong, thanh_tien, ma_don_hang)
                VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong, :thanh_tien, :ma_don_hang)';

        $stmt = $this->conn->prepare($sql);

        // Truyền giá trị vào SQL
        $stmt->execute([
            ':don_hang_id' => $donHangId,
            ':san_pham_id' => $sanPhamId,
            ':don_gia'     => $donGia,
            ':so_luong'    => $soLuong,
            ':thanh_tien'  => $thanhTien,
            ':ma_don_hang' => $maDonHang,
        ]);
    } catch (Exception $e) {
        echo 'Lỗi: ' . $e->getMessage();
    }
}




    // Hàm giảm số lượng sản phẩm sau khi thanh toán
    public function capNhatSoLuongSanPham($sanPhamId, $soLuongMua)
    {
        try {
            // Truy vấn SQL để giảm số lượng sản phẩm trong kho
            $sql = "UPDATE san_phams SET so_luong = so_luong - :so_luong_mua WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);

            // Thực thi câu lệnh SQL
            $stmt->execute([
                ':so_luong_mua' => $soLuongMua,  // Số lượng sản phẩm mua
                ':san_pham_id'  => $sanPhamId   // ID sản phẩm cần giảm số lượng
            ]);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}