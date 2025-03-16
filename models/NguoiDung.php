<?php
class NguoiDung
{
    public $conn;

    // Kết nối CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Check đăng nhập
    public function checkLogin2($email, $mat_khau){
        try {
            $sql = "SELECT * FROM nguoi_dungs WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $nguoidungs = $stmt->fetch();
    
            if ($nguoidungs && password_verify($mat_khau, $nguoidungs['mat_khau'])) {
                // Kiểm tra trạng thái tài khoản
                if ($nguoidungs['trang_thai'] == 1) {
                    // Cho phép cả user và admin đăng nhập
                    if ($nguoidungs['vai_tro'] == 'user' || $nguoidungs['vai_tro'] == 'admin') {
                        // Trả về thông tin người dùng
                        return $nguoidungs;
                    } else {
                        return "Tài khoản không có quyền đăng nhập";
                    }
                } else {
                    return "Tài khoản bị cấm";
                }
            } else {
                return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
            }
        } catch (\Exception $e) {
            return "Lỗi hệ thống: " . $e->getMessage();
        }
    }
    
public function findByEmail($email) {
    $stmt = $this->conn->prepare("SELECT * FROM nguoi_dungs WHERE email = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch();
}

    

    // Check đăng kí
    public function checkDangKy2($ten_nguoi_dung, $email, $so_dien_thoai, $mat_khau, $dia_chi){
        try {
            // Kiểm tra nếu email đã tồn tại
            $sql = "SELECT * FROM nguoi_dungs WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $nguoiDung = $stmt->fetch();
    
            if ($nguoiDung) {
                // Nếu email đã tồn tại, trả về thông báo lỗi
                return "Email này đã được đăng ký.";
            }
    
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashed_password = password_hash($mat_khau, PASSWORD_DEFAULT);
    
            // Thêm người dùng mới vào cơ sở dữ liệu
            $sql = "INSERT INTO nguoi_dungs (ten_nguoi_dung, email, so_dien_thoai, mat_khau, vai_tro, trang_thai, dia_chi) 
                    VALUES (:ten_nguoi_dung, :email, :so_dien_thoai, :mat_khau, 'user', 1, :dia_chi)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'ten_nguoi_dung' => $ten_nguoi_dung,
                'email' => $email,
                'so_dien_thoai' => $so_dien_thoai,
                'mat_khau' => $hashed_password,
                'dia_chi' => $dia_chi
            ]);
            
            return true; // Trả về true nếu lưu thành công
        } catch (\Exception $e) {
            return "Lỗi hệ thống: " . $e->getMessage(); // Xử lý lỗi nếu có
        }
    }
    
public function getUserById($id)
{
    try {
        $sql = "SELECT * FROM nguoi_dungs WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    } catch (\Exception $e) {
        return "Lỗi hệ thống: " . $e->getMessage();
    }
}


// Cập nhật thông tin người dùng theo email
public function updateDataById($id, $ten_nguoi_dung, $email, $so_dien_thoai, $dia_chi, $mat_khau)
{
    try {
        $sql = "UPDATE nguoi_dungs 
                SET ten_nguoi_dung = :ten_nguoi_dung, 
                    email = :email,
                    so_dien_thoai = :so_dien_thoai, 
                    dia_chi = :dia_chi, 
                    mat_khau = :mat_khau 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'ten_nguoi_dung' => $ten_nguoi_dung,
            'email' => $email,
            'so_dien_thoai' => $so_dien_thoai,
            'dia_chi' => $dia_chi,
            'mat_khau' => $mat_khau,
            'id' => $id
        ]);
        return true; // Cập nhật thành công
    } catch (\Exception $e) {
        return "Lỗi hệ thống: " . $e->getMessage();
    }
}





    
}