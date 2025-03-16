<?php
class NguoiDung
{
    public $conn;

    // Kết nối CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }
    // Danh sách người dùng
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM nguoi_dungs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    // Thêm dữ liệu vào CSDL
    public function postData($ten_nguoi_dung, $email, $so_dien_thoai, $trang_thai, $mat_khau, $vai_tro, $dia_chi)
    {
        try {
            $sql = 'INSERT INTO nguoi_dungs (ten_nguoi_dung, email, so_dien_thoai, trang_thai, mat_khau, vai_tro, dia_chi)
            VALUES (:ten_nguoi_dung, :email, :so_dien_thoai, :trang_thai, :mat_khau, :vai_tro, :dia_chi)';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':vai_tro', $vai_tro);
            $stmt->bindParam(':dia_chi', $dia_chi);

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
            $sql = 'SELECT * FROM nguoi_dungs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Cập nhật dữ liệu vào CSDL
    public function updateData($id, $ten_nguoi_dung, $email, $so_dien_thoai, $trang_thai, $mat_khau, $vai_tro, $dia_chi)
    {
        try {
            $sql = 'UPDATE nguoi_dungs SET ten_nguoi_dung = :ten_nguoi_dung, email = :email, so_dien_thoai = :so_dien_thoai, trang_thai = :trang_thai, mat_khau = :mat_khau, vai_tro = :vai_tro, dia_chi = :dia_chi WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_nguoi_dung', $ten_nguoi_dung);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':vai_tro', $vai_tro);
            $stmt->bindParam(':dia_chi', $dia_chi);

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
            $sql = 'DELETE FROM nguoi_dungs WHERE id = :id';

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
            $sql = "SELECT * FROM nguoi_dungs WHERE email LIKE :search";

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

    // Check đăng nhập
    public function checkDangNhap($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM nguoi_dungs WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $nguoidungs = $stmt->fetch();

            // var_dump($nguoidungs);

            if ($nguoidungs && password_verify($mat_khau, $nguoidungs['mat_khau'])) {
                if ($nguoidungs['vai_tro'] == 'admin') {
                    if ($nguoidungs['trang_thai'] == 1) {
                        return $nguoidungs['email'];
                    } else {
                        return "Tài khoản bị cấm";
                    }
                } else {
                    return "Tài khoản không có quyền đăng nhập";
                }
            } else {
                return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
            }
        } catch (\Exception $e) {
            return "Lỗi hệ thống: " . $e->getMessage();
        }
    }
}
