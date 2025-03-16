<?php

class TinTucController
{

    // ket noi den file model
    public $modelTintuc;

    public function __construct()
    {
        $this->modelTintuc = new TinTuc();
    }

    // ham hien thi danh sach
    public function home()
    {

        // lay ra du lieu tintuc
        $tinTucs = $this->modelTintuc->getAll();

        // dua du lieu ra view
        require_once 'views/tintuc/list_tin_tuc.php';
    }


    // ham hien thi form them
    public function create()
    {
        require_once 'views/tintuc/create_tin_tuc.php';
    }

    // ham xu ly them vao CSDL
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy dữ liệu
            $tieude_tintucs = $_POST['tieude'];
            $noidung_tintucs = $_POST['noidung'];
            $trangthai_tintucs = $_POST['Trangthai'];
            $ngaytao_tintucs = $_POST['ngay_tao'];
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], './upload_images/' . $image);



            // kiểm tra validate
            $errors = [];

            if (empty($tieude_tintucs)) {
                $errors['tieude'] = 'Tiêu đề là bắt buộc';
            }

            if (empty($noidung_tintucs)) {
                $errors['noidung'] = 'Nội dung là bắt buộc';
            }

            if (empty($image)) {
                $errors['image'] = 'hinh anh la bat buoc';
            }

            if (empty($trangthai_tintucs)) {
                $errors['Trangthai'] = 'Trạng thái là bắt buộc';
            }



            if (empty($ngaytao_tintucs)) {
                $errors['ngay_tao'] = 'Ngày tạo là bắt buộc';
            }


            // nếu không có lỗi, thêm dữ liệu vào CSDL
            if (empty($errors)) {
                $this->modelTintuc->addData_tintuc($tieude_tintucs, $noidung_tintucs, $image, $trangthai_tintucs, $ngaytao_tintucs);
                unset($_SESSION['errors']);
                header('Location: ?act=tin-tucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-tin-tuc');
                exit();
            }
        }
    }




    // ham hien thi form cap nhat du lieu
    public function edit()
    {
        //lay id

        $id = $_GET['tintuc_id'];
        // lay thong tin chi tiet cua banner
        $tinTuc = $this->modelTintuc->createData($id);

        // Kiểm tra giá trị của $tinTuc

        // hien thi form create ra man hinh
        require_once 'views/tintuc/edit_tin_tuc.php';
    }



    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $id = $_POST['id'];
            $tieude_tintucs = $_POST['tieude'];
            $noidung_tintucs = $_POST['noidung']; // Lấy nội dung từ TinyMCE
            if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
                $image = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "./upload_images/" . $image);
            } else {
                $image = null;
            }
            $trangthai_tintucs = $_POST['Trangthai'];
            $ngaytao_tintucs = $_POST['ngay_tao'];

            // Kiểm tra xem các trường có bị trống không
            $errors = [];

            if (empty($tieude_tintucs)) {
                $errors['tieude'] = 'Tiêu đề là bắt buộc';
            }

            if (empty($noidung_tintucs)) {
                $errors['noidung'] = 'Nội dung là bắt buộc';
            }

            if (empty($image)) {
                $errors['image'] = 'hinh anh la bat buoc';
            }


            if (empty($trangthai_tintucs)) {
                $errors['Trangthai'] = 'Trạng thái là bắt buộc';
            }

            if (empty($ngaytao_tintucs)) {
                $errors['ngay_tao'] = 'Ngày tạo là bắt buộc';
            }

            // Nếu không có lỗi, tiến hành cập nhật dữ liệu
            if (empty($errors)) {
                // Gọi model để cập nhật
                $this->modelTintuc->updateData($id, $tieude_tintucs, $noidung_tintucs, $image, $trangthai_tintucs, $ngaytao_tintucs);
                unset($_SESSION['errors']);
                header('Location: ?act=tin-tucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-tin-tuc');
                exit();
            }
        }
    }


    // ham xu ly xoa  du lieu trong CSDL
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['tintuc_id'];


            // thuc hien xoa tin tuc
            $this->modelTintuc->delete_Tintuc($id);
            header('location: ?act=tin-tucs ');
            exit();
        }
    }

    public function search()
    {
        if (isset($_POST['timkiem'])) {
            $search = $_POST['search'];
            $tinTucs = $this->modelTintuc->searchData($search);

            require_once './views/tintuc/list_tin_tuc.php';
        }
    }
}
