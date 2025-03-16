<?php

class DanhMucController
{
    // Kết nối đến model
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new DanhMuc();
    }

    // Hàm hiển thị danh sách
    public function index()
    {
        // Lấy ra dữ liệu danh mục
        $danhMucs = $this->modelDanhMuc->getAll();


        // Đưa dữ liệu ra view
        require_once './views/danhmuc/list_danh_muc.php';
    }

    // Hàm hiển thị form thêm
    public function create()
    {
        require_once './views/danhmuc/create_danh_muc.php';
    }

    // Hàm xử lý thêm vào CSDL
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];

            // Validate
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            // Thêm dữ liệu
            if (empty($errors)) {
                // Nếu không có lỗi thì thêm dữ liệu
                // Thêm vào CSDL
                $this->modelDanhMuc->postData($ten_danh_muc, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=danh-mucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-danh-muc');
                exit();
            }
        }
    }

    // Hàm hiển thị form sửa
    public function edit()
    {
        // Lấy id
        $id = $_GET['danh_muc_id'];
        // Lấy thông tin chi tiết của danh mục
        $danhMuc = $this->modelDanhMuc->getDetailData($id);

        // Đổ dữ liệu ra form
        require_once './views/danhmuc/edit_danh_muc.php';
    }

    // Hàm xử lý cập nhật dữ liệu vào CSDL
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];

            // Validate
            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            // Thêm dữ liệu
            if (empty($errors)) {
                // Nếu không có lỗi thì thêm dữ liệu
                // Thêm vào CSDL
                $this->modelDanhMuc->updateData($id, $ten_danh_muc, $trang_thai);
                unset($_SESSION['errors']);
                header('Location: ?act=danh-mucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-danh-muc');
                exit();
            }
        }
    }
    // Tìm kiếm
    public function search()
    {
        if (isset($_POST['timkiem'])) {
            $search = $_POST['search'];
            $danhMucs = $this->modelDanhMuc->searchData($search);

            require_once './views/danhmuc/list_danh_muc.php';
        }
    }

    // Hàm xóa dữ liệu trong CSDL
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['danh_muc_id'];

            // Xóa danh mục
            $this->modelDanhMuc->deleteData($id);

            header('Location: ?act=danh-mucs');
            exit();
        }
    }
}
