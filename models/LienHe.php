<?php
class LienHeClient
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Thêm liên hệ từ client
    public function postLienHe($email, $noi_dung, $ngay_tao)
    {
        try {
            $sql = 'INSERT INTO lien_hes (email, noi_dung, ngay_tao, trang_thai)
                    VALUES (:email, :noi_dung, :ngay_tao, :trang_thai)';
                    
            $stmt = $this->conn->prepare($sql);

            // Gán giá trị
            $trang_thai = 0; // Mặc định trạng thái "Chưa xử lý"
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':ngay_tao', $ngay_tao);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}
?>
