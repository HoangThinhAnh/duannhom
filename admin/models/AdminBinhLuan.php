<?php
class BinhLuan
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = connectDB(); // Giả sử hàm connectDB() đã được định nghĩa bên ngoài
    }

    public function getAll()
    {
        try {
            // Thêm JOIN để lấy dữ liệu từ bảng san_phams
            $sql = "SELECT binh_luans.*, san_phams.ten_san_pham 
                    FROM binh_luans 
                    JOIN san_phams ON binh_luans.san_pham_id = san_phams.id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            // Trả về tất cả bình luận kèm tên sản phẩm
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }


    // Cập nhật trạng thái bình luận (Hiện/Ẩn)
    public function toggleStatus($id)
    {
        try {
            // Lấy trạng thái hiện tại của bình luận
            $sql = "SELECT trang_thai FROM binh_luans WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $newStatus = $result['trang_thai'] == 1 ? 0 : 1; // Đổi trạng thái từ 1 sang 0 hoặc ngược lại

                // Cập nhật trạng thái bình luận
                $updateSql = "UPDATE binh_luans SET trang_thai = :newStatus WHERE id = :id";
                $updateStmt = $this->pdo->prepare($updateSql);
                $updateStmt->execute([':newStatus' => $newStatus, ':id' => $id]);

                return true; // Cập nhật thành công
            }
            return false; // Không tìm thấy bình luận
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
        try {
            // Xóa đánh giá dựa trên id
            $sql = "DELETE FROM binh_luans WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Kiểm tra xem xóa thành công hay không
            if ($stmt->rowCount() > 0) {
                return true; // Xóa thành công
            } else {
                return false; // Không tìm thấy đánh giá để xóa
            }
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
}
