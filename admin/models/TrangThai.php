<?php

class TrangThai
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả trạng thái
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Thêm trạng thái mới
    public function postData($ten_trang_thai)
    {
        try {
            $sql = 'INSERT INTO trang_thai_don_hangs (ten_trang_thai) VALUES (:ten_trang_thai)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_trang_thai', $ten_trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy chi tiết trạng thái
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hangs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Cập nhật trạng thái
    public function updateData($id, $ten_trang_thai)
    {
        try {
            $sql = 'UPDATE trang_thai_don_hangs SET ten_trang_thai = :ten_trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_trang_thai', $ten_trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Xóa trạng thái
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE FROM trang_thai_don_hangs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Tìm kiếm trạng thái
    public function searchData($search)
    {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs WHERE ten_trang_thai LIKE :search";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':search', '%' . $search . '%');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->conn = null;
    }
}
