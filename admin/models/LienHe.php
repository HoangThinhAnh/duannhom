<?php
class LienHe
{
    public $conn;

    // Kết nối CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Danh sách liên hệ
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM lien_hes';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Thêm dữ liệu vào CSDL
    public function postData($email, $noi_dung, $ngay_tao, $trang_thai)
    {
        try {
            $sql = 'INSERT INTO lien_hes (email, noi_dung, ngay_tao, trang_thai)
                    VALUES (:email, :noi_dung, :ngay_tao, :trang_thai)';

            $stmt = $this->conn->prepare($sql);

            // Gán giá trị vào các tham số
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

    // Lấy thông tin chi tiết liên hệ
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM lien_hes WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Cập nhật dữ liệu vào CSDL
    public function updateData($id, $trang_thai)
    {
        try {
            $sql = 'UPDATE lien_hes SET trang_thai = :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);

            // Gán giá trị vào các tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':trang_thai', $trang_thai);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }


    // Xóa dữ liệu liên hệ trong CSDL
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE FROM lien_hes WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Tìm kiếm
    public function searchData($search)
    {
        try {
            // Tạo câu truy vấn SQL tìm kiếm theo tên, email, số điện thoại, trạng thái
            $sql = "SELECT * FROM lien_hes WHERE email LIKE :search";

            $stmt = $this->conn->prepare($sql);
            // Thêm dấu % vào từ khóa để tìm kiếm theo chuỗi chứa từ khóa
            $stmt->bindValue(':search', '%' . $search . '%');

            $stmt->execute();

            $results = $stmt->fetchAll();

            return !empty($results) ? $results : [];
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }


    // Hủy kết nối CSDL
    public function __destruct()
    {
        $this->conn = null;
    }
}
