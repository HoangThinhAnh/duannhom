<?php

class AmdinThongke
{
    public $conn;

    // Kết nối CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả đơn hàng để thống kê
    public function getAllDonHang_ThongKe()
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai
                    FROM don_hangs
                    INNER JOIN trang_thai_don_hangs 
                    ON don_hangs.trang_thai_id = trang_thai_don_hangs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy kết quả dưới dạng mảng
        } catch (Exception $e) {
            echo "Lỗi khi lấy dữ liệu thống kê: " . $e->getMessage();
        }
    }

    // Lấy số lượng đơn hàng
    public function getSoLuongDonHang()
    {
        try {
            // Lấy số lượng đơn hàng với trang_thai_id = 2 (Đã Xác Nhận)
            $query = "SELECT COUNT(*) AS orders FROM don_hangs WHERE trang_thai_id ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);  // Lấy kết quả dưới dạng mảng
            return $result['orders'] ?? 0;  // Trả về số lượng đơn hàng, mặc định là 0 nếu không có kết quả
        } catch (Exception $e) {
            echo "Lỗi khi lấy số lượng đơn hàng: " . $e->getMessage();
            return 0;  // Nếu có lỗi, trả về 0
        }
    }


    // // Lấy doanh thu
    public function getRevenue()
    {
        try {
            $query = "SELECT SUM(gia_ban * so_luong) AS doanh_thu FROM san_phams";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['doanh_thu'] ?? 0;
        } catch (Exception $e) {
            echo "Lỗi khi tính doanh thu: " . $e->getMessage();
            return 0;
        }
    }


    // Lấy lợi nhuận
    public function getProfit()
    {
        try {
            $query = "SELECT 
    SUM(cth.thanh_tien) AS tong_doanh_thu,
    SUM(COALESCE(sp.gia_nhap, 0) * COALESCE(cth.so_luong, 0)) AS tong_gia_nhap,
    SUM(cth.thanh_tien) - SUM(COALESCE(sp.gia_nhap, 0) * COALESCE(cth.so_luong, 0)) AS loi_nhuan
FROM 
    chi_tiet_don_hangs cth
JOIN 
    san_phams sp ON cth.san_pham_id = sp.id;
";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return isset($result['loi_nhuan']) ? $result['loi_nhuan'] : 0;
        } catch (Exception $e) {
            echo "Lỗi khi lấy lợi nhuận: " . $e->getMessage();
            return 0;
        }
    }



    // bang doanh thu theo ngay
    public function getRevenueByDay($startDate, $endDate)
    {

        try {
            // Truy vấn doanh thu theo ngày trong khoảng thời gian từ $startDate đến $endDate
            $query = "
                SELECT DATE(dh.ngay_dat) AS day, SUM(cth.thanh_tien) AS revenue
                FROM chi_tiet_don_hangs cth
                JOIN don_hangs dh ON cth.don_hang_id = dh.id
                WHERE dh.ngay_dat BETWEEN :start_date AND :end_date
                GROUP BY DATE(dh.ngay_dat)
                ORDER BY DATE(dh.ngay_dat)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':start_date', $startDate);
            $stmt->bindParam(':end_date', $endDate);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (Exception $e) {
            echo "Lỗi khi lấy doanh thu theo ngày: " . $e->getMessage();
            return [];
        }
    }
}
