<?php
class NguoiDungController
{
    //Kết nối đến file model
    public $modelNguoiDung;

    public function __construct()
    {
        $this->modelNguoiDung = new NguoiDung();
    }
    //Hàm hiển thị danh sách
    public function index()
    {
        // Lấy ra dữ liệu người dùng
        $nguoiDungs = $this->modelNguoiDung->getAll();

        // Đưa dữ liệu ra view
        require_once './views/nguoidung/list_nguoi_dung.php';
    }
    //Hàm hiển thị form thêm
    public function create()
    {
        require_once './views/nguoidung/create_nguoi_dung.php';
    }
    //Hàm xử lý thêm vào CSDL
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $trang_thai = $_POST['trang_thai'];
            $mat_khau = $_POST['mat_khau']; // Thêm trường mật khẩu
            $vai_tro = $_POST['vai_tro']; // Thêm trường vai trò
            $dia_chi = $_POST['dia_chi'];

            // Validate
            $errors = [];
            if (empty($ten_nguoi_dung)) {
                $errors['ten_nguoi_dung'] = 'Tên người dùng là bắt buộc';
            }
            if (empty($email)) {
                $errors['email'] = 'Email là bắt buộc';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Tên trạng thái là bắt buộc';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu là bắt buộc';
            }
            if (empty($vai_tro)) {
                $errors['vai_tro'] = 'Vai trò là bắt buộc';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ là bắt buộc';
            }

            // Thêm dữ liệu
            if (empty($errors)) {
                // Mã hóa mật khẩu
                $mat_khau = password_hash($mat_khau, PASSWORD_DEFAULT);

                // Thêm vào CSDL
                $this->modelNguoiDung->postData($ten_nguoi_dung, $email, $so_dien_thoai, $trang_thai, $mat_khau, $vai_tro, $dia_chi);
                unset($_SESSION['errors']);
                header('Location: ?act=nguoi-dungs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-nguoi-dung');
                exit();
            }
        }
    }

    //Hàm hiển thị form sửa
    public function edit()
    {
        //Lấy id
        $id = $_GET['nguoi_dung_id'];
        // Lấy thông tin chi tiết của người dùng
        $nguoiDung = $this->modelNguoiDung->getDetailData($id);

        //Đổ dữ liệu ra form
        require_once './views/nguoidung/edit_nguoi_dung.php';
    }
    //Hàm xử lý cập nhật dữ liệu vào CSDL
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $trang_thai = $_POST['trang_thai'];
            $mat_khau = $_POST['mat_khau']; // Thêm trường mật khẩu
            $vai_tro = $_POST['vai_tro']; // Thêm trường vai trò
            $dia_chi = $_POST['dia_chi'];

            // Validate
            $errors = [];
            if (empty($ten_nguoi_dung)) {
                $errors['ten_nguoi_dung'] = 'Tên người dùng là bắt buộc';
            }
            if (empty($email)) {
                $errors['email'] = 'Email là bắt buộc';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Tên trạng thái là bắt buộc';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu là bắt buộc';
            }
            if (empty($vai_tro)) {
                $errors['vai_tro'] = 'Vai trò là bắt buộc';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ là bắt buộc';
            }

            // Cập nhật dữ liệu
            if (empty($errors)) {
                // Mã hóa mật khẩu
                $mat_khau = password_hash($mat_khau, PASSWORD_DEFAULT);

                // Cập nhật vào CSDL
                $this->modelNguoiDung->updateData($id, $ten_nguoi_dung, $email, $so_dien_thoai, $trang_thai, $mat_khau, $vai_tro, $dia_chi);
                unset($_SESSION['errors']);
                header('Location: ?act=nguoi-dungs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-nguoi-dung');
                exit();
            }
        }
    }


    // Tìm kiếm
    public function search()
    {
        if (isset($_POST['timkiem'])) {
            $search = $_POST['search'];
            $nguoiDungs = $this->modelNguoiDung->searchData($search);

            require_once './views/nguoidung/list_nguoi_dung.php';
        }
    }
    //Hàm xóa dữ liệu trong CSDL
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['nguoi_dung_id'];

            // Xóa người dùng 
            $this->modelNguoiDung->deleteData($id);

            header('Location: ?act=nguoi-dungs');
            exit();
        }
    }

    // Đăng nhập
    public function formDangNhap()
    {
        require_once './views/dangnhap/form_dang_nhap.php';
    }

    public function DangNhap()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];

            // var_dump($email);

            $nguoiDungs = $this->modelNguoiDung->checkDangNhap($email, $mat_khau);

            if ($nguoiDungs == $email) {
                $_SESSION['nguoidungs_admin'] = $nguoiDungs;
                header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/admin/index.php");
                exit();
            } else {
                $_SESSION['error'] = $nguoiDungs;

                $_SESSION['flash'] = true;

                header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/admin/index.php" . '?act=form-dang-nhap');
                exit();
            }
        }
    }

    // Đăng xuất
    public function DangXuat()
    {
        // Kiểm tra xem có session 'nguoidungs_admin' hay không, nếu có thì hủy nó
        if (isset($_SESSION['nguoidungs_admin'])) {
            unset($_SESSION['nguoidungs_admin']);
        }
        // Chuyển hướng đến trang đăng nhập
        header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php");
        exit();
    }
}
