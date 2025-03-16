<?php

class DanhMuc
{
    public $conn;

    // Kết nối CSDL 
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Danh sách danh mục
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM danh_mucs ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Thêm dữ liệu vào CSDL
    public function postData($ten_danh_muc, $trang_thai)
    {
        try {
            $sql = 'INSERT INTO danh_mucs (ten_danh_muc, trang_thai)
            VALUES (:ten_danh_muc, :trang_thai)';

            $stmt = $this->conn->prepare($sql);

            // Gán giá trị vào các tham số
            $stmt->bindParam('ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam('trang_thai', $trang_thai);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy thông tin chi tiết
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam('id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Cập nhật dữ liệu vào CSDL
    public function updateData($id, $ten_danh_muc, $trang_thai)
    {
        try {
            $sql = 'UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc, trang_thai = :trang_thai WHERE id = :id';


            $stmt = $this->conn->prepare($sql);

            // Gán giá trị vào các tham số
            $stmt->bindParam('id', $id);
            $stmt->bindParam('ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam('trang_thai', $trang_thai);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Xóa dữ liệu trong CSDL
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam('id', $id);

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
            $sql = "SELECT * FROM danh_mucs WHERE ten_danh_muc LIKE :search";

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

    // Hủy kết nối
    public function __destruct()
    {
        $this->conn = null;
    }
}
