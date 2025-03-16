<?php

class bannerController
{

    public $modelBanner;

    public function __construct()
    {
        $this->modelBanner = new banner();
    }
    // ham hien thi danh sach banner
    public function home()
    {
        // lay ra du lieu banner
        $banners = $this->modelBanner->getAll();

        //dua du lieu ra trang home
        require_once 'views/banner/list_banner.php';
    }


    // ham hien thi from add
    public function create()
    {
        // hien thi form add banner
        require_once 'views/banner/create_banner.php';
    }


    // ham xu ly them vao csdl
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lay ra du lieu
            $tieude_banner = $_POST['tieude_banner'];
            $hinhanh_banner = $_POST['hinhanh_banner'];
            $trangthai = $_POST['trangthai'];

            //check validate
            $errors = [];

            if (empty($tieude_banner)) {
                $errors['tieude_banner'] = 'Ten tieu de la bat buoc';
            }

            if (empty($hinhanh_banner)) {
                $errors['hinhanh_banner'] = 'hinh anh la bat buoc';
            }

            if (empty($trangthai)) {
                $errors['trangthai'] = 'Trang thai la bat buoc';
            }

            // them du lieu 
            if (empty($errors)) {
                // neu k co loi thi them du lieu
                // them vao csdl
                $this->modelBanner->addData($tieude_banner, $hinhanh_banner, $trangthai);
                unset($_SESSION['errors']);
                header('location: ?act=banners');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-them-banner ');
                exit();
            }
        }
    }




    // ham hien thi from sua
    public function edit()
    {

        //lay id

        $id = $_GET['banner_id'];
        // lay thong tin chi tiet cua banner
        $banner = $this->modelBanner->createData($id);


        // hien thi form create ra man hinh
        require_once 'views/banner/edit_banner.php';
    }


    // ham xu ly sua du lieu vao csdl
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lay ra du lieu
            $id = $_POST['id'];
            $tieude_banner = $_POST['tieude_banner'];
            $hinhanh_banner = $_POST['hinhanh_banner'];
            $trangthai = $_POST['trangthai'];

            //check validate
            $errors = [];

            if (empty($tieude_banner)) {
                $errors['tieude_banner'] = 'Ten tieu de la bat buoc';
            }

            if (empty($hinhanh_banner)) {
                $errors['hinhanh_banner'] = 'hinh anh la bat buoc';
            }

            if (empty($trangthai)) {
                $errors['trangthai'] = 'Trang thai la bat buoc';
            }

            // them du lieu 
            if (empty($errors)) {
                // neu k co loi thi them du lieu
                // them vao csdl
                $this->modelBanner->updateData($id, $tieude_banner, $hinhanh_banner, $trangthai);
                unset($_SESSION['errors']);
                header('location: ?act=banners');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-banner ');
                exit();
            }
        }
    }


    // ham xu ly xoa du lieu 
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['banner_id'];

            // tien hanh xoa banner
            $this->modelBanner->deleteData($id);
            header('location: ?act=banners');
        }
    }

    // Form tim kiem
    public function search()
    {
        if (isset($_POST['timkiem'])) {
            $search = $_POST['search'];
            $banners = $this->modelBanner->searchData($search);

            require_once './views/banner/list_banner.php';
        }
    }
}
