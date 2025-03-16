<?php
class LienHeClientController
{
    public $modelLienHeClient;

    public function __construct()
    {
        $this->modelLienHeClient = new LienHeClient();
    }

    // Hiển thị form liên hệ
    public function formLienHe()
    {
        require_once './views/lienhe/formLienHe.php';
    }

    // Xử lý gửi liên hệ
    public function checkLienHe()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $email = $_POST['email'];
            $noi_dung = $_POST['noi_dung'];
            $ngay_tao = date('Y-m-d');

            // Validate dữ liệu
            $errors = [];
            if (empty($email)) {
                $errors['email'] = 'Email là bắt buộc';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }

            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Nội dung là bắt buộc';
            }

            // Thêm dữ liệu nếu không có lỗi
            if (empty($errors)) {
                $this->modelLienHeClient->postLienHe($email, $noi_dung, $ngay_tao);
                $_SESSION['success'] = 'Gửi liên hệ thành công';
                header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php" . '?act=lien-he');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/index.php" . '?act=lien-he');
                exit();
            }
        }
    }
}
?>
