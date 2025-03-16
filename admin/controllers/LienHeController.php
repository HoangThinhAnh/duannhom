<?php
class LienHeController
{
    // Kết nối đến file model
    public $modelLienHe;

    public function __construct()
    {
        $this->modelLienHe = new LienHe();
    }

    // Hàm hiển thị danh sách liên hệ
    public function index()
    {
        // Lấy ra dữ liệu liên hệ
        $lienHes = $this->modelLienHe->getAll();

        // Đưa dữ liệu ra view
        require_once './views/lienhe/list_lien_he.php';
    }

    // Hàm hiển thị form thêm liên hệ
    public function create()
    {
        require_once './views/lienhe/create_lien_he.php';
    }

    // Hàm xử lý thêm vào CSDL
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $email = $_POST['email'];
            $noi_dung = $_POST['noi_dung'];
            $trang_thai = $_POST['trang_thai'];
            $ngay_tao = date('Y-m-d'); // Lấy ngày hiện tại

            // Validate
            $errors = [];
            if (empty($email)) {
                $errors['email'] = 'Email là bắt buộc';
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Nội dung là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            // Thêm dữ liệu
            if (empty($errors)) {
                // Nếu không có lỗi thì thêm dữ liệu vào CSDL
                $this->modelLienHe->postData($email, $noi_dung, $ngay_tao, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=lien-hes');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-lien-he');
                exit();
            }
        }
    }

    // Hàm hiển thị form sửa liên hệ
    public function edit()
    {
        // Lấy id liên hệ
        $id = $_GET['lien_he_id'];
        // Lấy thông tin chi tiết của liên hệ
        $lienHe = $this->modelLienHe->getDetailData($id);

        // Đổ dữ liệu ra form
        require_once './views/lienhe/edit_lien_he.php';
    }

    // Hàm xử lý cập nhật dữ liệu vào CSDL
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $id = $_POST['id'];
            $trang_thai = $_POST['trang_thai'];

            // Validate
            $errors = [];
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            // Cập nhật dữ liệu
            if (empty($errors)) {
                // Nếu không có lỗi thì cập nhật dữ liệu
                $this->modelLienHe->updateData($id, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=lien-hes');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-lien-he');
                exit();
            }
        }
    }

    // Form tìm kiếm
    public function search()
    {
        if (isset($_POST['timkiem'])) {
            $search = $_POST['search'];
            $lienHes = $this->modelLienHe->searchData($search);

            require_once './views/lienhe/list_lien_he.php';
        }
    }


    // Hàm xóa dữ liệu liên hệ trong CSDL
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['lien_he_id'];

            // Xóa liên hệ
            $this->modelLienHe->deleteData($id);

            header('Location: ?act=lien-hes');
            exit();
        }
    }
}
