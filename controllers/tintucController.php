<?php
class TinTucController
{


    // ket noi den file model
    public $modelTintuc;

    public function __construct()
    {
        $this->modelTintuc = new TinTuc();
    }


    public function list_tintuc()
    {

        $tinTucs = $this->modelTintuc->getAlltinTuc();
        // hien thi danh sach tin tuc
        require_once './views/tintuc/list_tintuc.php';
    }



    // Phương thức để hiển thị danh sách tin tức theo thể loại
    public function Show_category()
    {
        // Lấy thể loại từ URL (nếu có)
        $category = isset($_GET['category']) ? $_GET['category'] : null;

        // Lấy danh sách tin tức theo thể loại, nếu có
        $tinTucs = $this->modelTintuc->getTinTucByCategory($category);

        // Gửi dữ liệu đến view
        require_once './views/tintuc/list_tintuc.php';
    }


    // Phương thức hiển thị chi tiết bài viết
    public function showDetail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id']; // Lấy tham số id từ URL

            $tinTuc = $this->modelTintuc->getTinTucById($id); // Gọi hàm trong Model để lấy thông tin bài viết theo ID

            if ($tinTuc) {
                // Nếu tìm thấy bài viết, hiển thị trang chi tiết
                include './views/tintuc/detail_tintuc.php';
            } else {
                // Nếu không tìm thấy bài viết, thông báo lỗi
                echo "Bài viết không tồn tại.";
            }
        } else {
            // Nếu không có tham số id trong URL, thông báo lỗi
            echo "Không có ID bài viết.";
        }
    }

    public function showEdit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id']; // Lấy tham số id từ URL
            $tinTuc = $this->modelTintuc->getTinTucById($id); // Lấy thông tin bài viết theo ID

            if ($tinTuc) {
                // Nếu tìm thấy bài viết, hiển thị form chỉnh sửa
                include './views/tintuc/edit_tintuc.php';
            } else {
                // Nếu không tìm thấy bài viết, thông báo lỗi
                echo "Bài viết không tồn tại.";
            }
        } else {
            // Nếu không có tham số id trong URL, thông báo lỗi
            echo "Không có ID bài viết.";
        }
    }
}