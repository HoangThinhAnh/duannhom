
<?php

class AdminDonHangController
{
    public $modelDonHang;


    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }



    public function danhsachDonHang()
    {

        $listdonHang = $this->modelDonHang->getAllDonHang();


        require_once 'views/donhang/listDonHang.php';
    }



    public function detailDonHang()
    {
        $don_hang_id = $_GET['id_don_hang'];


        // Lấy thông tin đơn hàng ở bảng don_hangs
        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);


        // Lấy danh sách  sản phẩm  đã đặt của đơn hàng ở bảng chi_tiet_don_hangs
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);


        // lay sanh sach trang thai don hangs
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();



        require_once 'views/donhang/detailDonHang.php';
    }







    // public function formEditDonHang()
    // {
    //     $id = $_GET['id_don_hang'];
    //     $donHang = $this->modelDonHang->getDetailDonHang($id);
    //     $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
    //     if ($donHang) {
    //         require_once './views/donhang/editDonHang.php';
    //         // deleteSessionError();
    //     } else {
    //         header('location: ?act=don-hangs');
    //         exit();
    //     }
    // }





    //Hàm hiển thị form sửa
    public function edit()
    {
        // Lấy id đơn hàng từ URL
        $id = $_GET['don_hang_id'];

        // Lấy thông tin đơn hàng cần sửa
        $donHang = $this->modelDonHang->getDetailData($id);

        // Lấy danh sách trạng thái đơn hàng
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        // Debug dữ liệu

        // Gửi dữ liệu đến view
        require_once './views/donhang/editDonHang.php';
    }



    //Hàm xử lý cập nhật dữ liệu vào CSDL
    //Hàm xử lý cập nhật dữ liệu vào CSDL
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dữ liệu
            $id = $_POST['id'];
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $trang_thai_id = $_POST['trang_thai_id'] ?? null;

            // Validate
            $errors = [];

            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Tên người dùng là bắt buộc';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Email là bắt buộc';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Số điện thoại là bắt buộc';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ là bắt buộc';
            }
            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Tên trạng thái là bắt buộc';
            }
            // Thêm dữ liệu
            if (empty($errors)) {
                // Nếu không có lỗi thì thêm dữ liệu
                // Thêm vào CSDL
                $this->modelDonHang->updateData($id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id);
                $_SESSION['message'] = "Cập nhật thành công!";
                unset($_SESSION['errors']);
                header('Location: ?act=don-hangs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-don-hang');
                exit();
            }
        }
    }



    // Form tim kiem
    public function search()
    {
        if (isset($_POST['timkiem'])) {
            $search = $_POST['search'];
            $listdonHang = $this->modelDonHang->searchData($search);

            require_once './views/donhang/listDonHang.php';
        }
    }
}
?>