<?php
class TaiKhoanController
{
    // Kết nối với model
    public $modelNguoiDung;

    public function __construct()
    {
        $this->modelNguoiDung = new NguoiDung();
    }

    // Hiển thị thông tin tài khoản cá nhân
    public function taikhoan()
{
    if (isset($_SESSION['nguoidungs_client'])) {
        // Lấy ID từ session
        $id = $_SESSION['nguoidungs_client']['id'];

        // Lấy thông tin người dùng từ model theo ID
        $nguoiDung = $this->modelNguoiDung->getUserById($id);

        // Kiểm tra nếu không tìm thấy tài khoản
        if (!$nguoiDung) {
            $_SESSION['errors'] = ['Tài khoản không tồn tại.'];
            header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php?act=logout");
            exit();
        }

        // Hiển thị thông tin người dùng trong view
        require_once './views/taikhoan/taikhoan.php';
    } else {
        // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
        header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php?act=login");
        exit();
    }
}



    // Chỉnh sửa tài khoản cá nhân
    public function editTaiKhoan()
{
    if (isset($_SESSION['nguoidungs_client'])) {
        $id = $_SESSION['nguoidungs_client']['id']; // Lấy ID từ session
        $nguoiDung = $this->modelNguoiDung->getUserById($id); // Lấy thông tin người dùng từ model
        
        require_once './views/taikhoan/editTaiKhoan.php';
    } else {
        header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php?act=login");
        exit();
    }
}



public function updateTaiKhoan()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_SESSION['nguoidungs_client']['id']; // Lấy ID từ session
        $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
        $email = $_POST['email'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $dia_chi = $_POST['dia_chi'];
        $mat_khau_cu = $_POST['mat_khau_cu'];
        $mat_khau_moi = $_POST['mat_khau_moi'];
        $xac_nhan_mat_khau_moi = $_POST['xac_nhan_mat_khau_moi'];

        $nguoiDung = $this->modelNguoiDung->getUserById($id);

        // Validate input
        $errors = [];
        if (empty($ten_nguoi_dung)) $errors['ten_nguoi_dung'] = 'Tên người dùng không được để trống';
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email không hợp lệ';
        }
        if (empty($so_dien_thoai)) $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
        if (empty($dia_chi)) $errors['dia_chi'] = 'Địa chỉ không được để trống';

        if (!password_verify($mat_khau_cu, $nguoiDung['mat_khau'])) {
            $errors['mat_khau_cu'] = 'Mật khẩu cũ không đúng';
        }

        // Kiểm tra mật khẩu mới nếu người dùng nhập
        if (!empty($mat_khau_moi)) {
            if (strlen($mat_khau_moi) < 6) {
                $errors['mat_khau_moi'] = 'Mật khẩu mới phải có ít nhất 6 ký tự';
            }
            if ($mat_khau_moi !== $xac_nhan_mat_khau_moi) {
                $errors['xac_nhan_mat_khau_moi'] = 'Mật khẩu mới và xác nhận không khớp';
            }
        }

        if (empty($errors)) {
            // Xử lý mật khẩu
            $mat_khau = empty($mat_khau_moi) ? $nguoiDung['mat_khau'] : password_hash($mat_khau_moi, PASSWORD_DEFAULT);

            // Cập nhật thông tin
            $this->modelNguoiDung->updateDataById($id, $ten_nguoi_dung, $email, $so_dien_thoai, $dia_chi, $mat_khau);

            $_SESSION['success'] = "Cập nhật thông tin thành công!";
            header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php?act=taikhoan");
            exit();
        } else {
            $_SESSION['errors'] = $errors;
            header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php?act=editTaiKhoan");
            exit();
        }
    }
}






}