<?php
require_once "models/KhuyenMai.php";

class KhuyenMaiController
{
    private $model;

    public function __construct()
    {
        $this->model = new KhuyenMaiModel();
    }

    // Hiển thị danh sách khuyến mãi
    public function showKmaiList()
    {
        $promotions = $this->model->getAll();
        require "views/khuyenmai/list_kmai.php";
    }

    // Hiển thị form thêm khuyến mãi
    public function showAddKmaiForm()
    {
        require "views/khuyenmai/add_kmai.php";
    }

    // Xử lý thêm khuyến mãi mới
    public function addKmai()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $mo_ta = $_POST['mo_ta'];
            $discount_value = $_POST['discount_value'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $trang_thai = $_POST['trang_thai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];


            // var_dump($ten_khuyen_mai, $mo_ta, $discount_value, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai);
            // exit();
            $this->model->add($ten_khuyen_mai, $mo_ta, $discount_value, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai, $ma_khuyen_mai);
            header("Location: index.php?act=list-khuyen-mai");
        } else {
            echo "Phương thức không hợp lệ!";
        }
    }

    // Hiển thị form chỉnh sửa khuyến mãi
    public function showEditKmaiForm()
    {
        $id = $_GET['id'] ?? null;
        if ($id && is_numeric($id)) {  // Kiểm tra ID có tồn tại và hợp lệ
            $promotion = $this->model->getById($id);
            if ($promotion) {
                require "views/khuyenmai/edit_kmai.php";
            } else {
                echo "Không tìm thấy khuyến mãi với ID: $id";
            }
        } else {
            echo "ID không hợp lệ!";
        }
    }


    // Cập nhật khuyến mãi
    public function updateKmai()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            var_dump($_POST);
            $id = $_POST['id'];
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $mo_ta = $_POST['mo_ta'];
            $discount_value = $_POST['discount_value'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $trang_thai = $_POST['trang_thai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];


            // Gọi model để cập nhật dữ liệu
            $this->model->update($id, $ten_khuyen_mai, $mo_ta, $discount_value, $ngay_bat_dau, $ngay_ket_thuc, $trang_thai, $ma_khuyen_mai);

            // Chuyển hướng về trang danh sách khuyến mãi sau khi cập nhật
            header("Location: index.php?act=list-khuyen-mai");
        } else {
            echo "Phương thức không hợp lệ!";
        }
    }


    // Xóa khuyến mãi
    public function deleteKmai($id)
    {
        if ($id) {
            $this->model->delete($id);
            header("Location: index.php?act=list-khuyen-mai");
        } else {
            echo "ID không hợp lệ!";
        }
    }

    // Tìm kiếm
    public function search()
    {
        if (isset($_POST['timkiem'])) {
            $search = $_POST['search'];
            $promotions = $this->model->searchData($search);

            require_once './views/khuyenmai/list_kmai.php';
        }
    }

    // Trang mặc định hiển thị danh sách người dùng nếu không khớp act nào
    public function showUserList()
    {
        echo "Trang danh sách người dùng";
    }
}
