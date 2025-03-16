<?php 

class HomeController
{

    public $modelNguoiDung;
    public $modelSanPham;
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
        $this->modelNguoiDung = new NguoiDung();
        $this->modelSanPham = new SanPham();
    }

    public function home(){
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }

    // Đăng nhập
    public function formLogin(){
        require_once './views/dangnhap/formLogin.php';
        
    }

    public function checkLogin(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
    
            // Kiểm tra đăng nhập
            $nguoiDungs = $this->modelNguoiDung->checkLogin2($email, $mat_khau);
    
            // Kiểm tra nếu $nguoiDungs là mảng (đăng nhập thành công)
            if (is_array($nguoiDungs)) {
                // Lưu thông tin người dùng vào session dưới dạng mảng
                $_SESSION['nguoidungs_client'] = [
                    'id' => $nguoiDungs['id'],
                    'ten_nguoi_dung' => $nguoiDungs['ten_nguoi_dung'],
                    'email' => $nguoiDungs['email'],
                    'so_dien_thoai' => $nguoiDungs['so_dien_thoai'],
                    'trang_thai' => $nguoiDungs['trang_thai'],
                    'vai_tro' => $nguoiDungs['vai_tro'],
                    'dia_chi' => $nguoiDungs['dia_chi']
                ];
                header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php");
                exit();
            } else {
                // Nếu không phải mảng, tức là có lỗi xảy ra
                $_SESSION['error'] = $nguoiDungs; // Lưu thông báo lỗi vào session
                $_SESSION['flash'] = true;
                header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php?act=login");
                exit();
            }
        }
    }

    public function formForgotPassword() {
        require_once './views/dangnhap/quenMatKhau.php'; // Đường dẫn tới file giao diện quên mật khẩu
    }
    
    public function retrievePassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
    
            // Tìm người dùng theo email
            $nguoiDung = $this->modelNguoiDung->findByEmail($email);
    
            if ($nguoiDung) {
                // Hiển thị mật khẩu gốc (không an toàn, chỉ để học tập)
                $_SESSION['success'] = "Mật khẩu của bạn là: " . $nguoiDung['mat_khau'];
            } else {
                $_SESSION['error'] = "Email không tồn tại trong hệ thống.";
            }
    
            header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php?act=forgot-password");
            exit();
        }
    }
    
    
    
    
    
    // Đăng ký
    public function formDangKy(){
        require_once './views/dangnhap/formDangKy.php';
    }
    
    public function checkDangKy(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Lấy dữ liệu từ form
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $mat_khau = $_POST['mat_khau'];
            $confirm_mat_khau = $_POST['confirm_mat_khau'];
            $dia_chi = $_POST['dia_chi'];
    
            // Kiểm tra nếu mật khẩu xác nhận khớp
            if ($mat_khau !== $confirm_mat_khau) {
                $_SESSION['error'] = "Mật khẩu và xác nhận mật khẩu không khớp.";
                header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php" . '?act=dangky');
                exit();
            }
    
            // Gọi phương thức trong model để đăng ký người dùng
            $result = $this->modelNguoiDung->checkDangKy2($ten_nguoi_dung, $email, $so_dien_thoai, $mat_khau, $dia_chi);
    
            if ($result === true) {
                // Đăng ký thành công, chuyển hướng đến trang đăng nhập
                $_SESSION['success'] = "Đăng ký thành công! Bạn có thể đăng nhập ngay.";
                header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php" . '?act=login');
                exit();
            } else {
                // Nếu có lỗi (email đã tồn tại), hiển thị lỗi
                $_SESSION['error'] = $result;
                header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php" . '?act=dangky');
                exit();
            }
        }
    }
    
     // Đăng xuất
     public function logout() {
        session_start();
        unset($_SESSION['nguoidungs_client']); // Hủy phiên đăng nhập
        session_destroy(); // Xóa toàn bộ session
        header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php");
        exit();
    }

  
    public function danhSachSanPham()
    {
        // Lấy giá trị tìm kiếm
        $searchTerm = $_GET['search'] ?? '';
    
        // Lấy giá trị phân trang
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 9;
        $offset = ($currentPage - 1) * $itemsPerPage;
    
        // Lấy giá trị lọc theo khoảng giá từ URL
        $min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
        $max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : PHP_INT_MAX;
    
        // Lấy sản phẩm dựa trên bộ lọc
        if ($searchTerm) {
            $Sanphams = $this->modelSanPham->searchByNameAndPrice($searchTerm, $min_price, $max_price);
        } else {
            $Sanphams = $this->modelSanPham->getPagedSanPhamByPrice($min_price, $max_price, $offset, $itemsPerPage);
        }
    
        // Lấy tổng số sản phẩm theo khoảng giá để tính số trang
        $totalItems = $this->modelSanPham->getTotalSanPhamByPrice($min_price, $max_price);
        $totalPages = ceil($totalItems / $itemsPerPage);
    
        // Lấy danh mục
        $categories = $this->modelSanPham->getDanhMucs();
    
        // Gửi dữ liệu đến View
        require_once './views/sanpham/listSanpham.php';
    }

    
    public function chiTietSanPham(){
        $danhMucs = $this->modelSanPham->getDanhMucs();
        $id = $_GET['id'] ?? null;
    
        if ($id && is_numeric($id)) {
            // Lấy thông tin sản phẩm theo ID
            $Sanpham = $this->modelSanPham->getSpById($id);
    
            // Lấy danh sách ảnh của sản phẩm
            $listSanpham = $this->modelSanPham->getlistAnh($id);
    
            // Lấy bình luận của sản phẩm
            $binhLuans = $this->modelSanPham->getBinhLuansBySanPhamId($id); 
    
            // Lấy đánh giá của sản phẩm
            $danhGias = $this->modelSanPham->getDanhGiasBySanPhamId($id);

            $listSanphamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($Sanpham['danh_muc_id']);
            
            if ($Sanpham) {
                // Truyền dữ liệu vào view
                require "./views/sanpham/chitiet_sanpham.php";
            } else {
                header("Location: " . BASE_URL);
            }
        } else {
            echo "ID không hợp lệ!";
        }
    }

    public function search()
    {
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            $listSanpham = $this->modelSanPham->searchData($search);

            require_once './views/sanpham/chitiett_sanpham.php';
        }
    }

    public function danhMucSanPham() {
        // Lấy tất cả danh mục sản phẩm
        $danhMucs = $this->modelSanPham->getDanhMucs();
        $Sanphams = $this->modelSanPham->getAllSanPham(); // Hoặc getAll() tùy theo yêu cầu
        $categories = $this->modelSanPham->getDanhMucs();
        // Truyền dữ liệu vào view
        require_once './views/sanpham/danhmuc_sanpham.php';
    }

    

    // Giói thiệu
    public function gioithieu(){
        require_once './views/gioithieu/gioithieu.php';
    }
}