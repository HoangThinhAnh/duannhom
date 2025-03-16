<?php
class BinhLuanController
{
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelBinhLuan = new BinhLuan();
    }

    // Hiển thị danh sách bình luận
    public function ListBinhLuan()
    {
        $listBinhLuan = $this->modelBinhLuan->getAll();

        // Debug: kiểm tra dữ liệu trả về

        require_once 'views/sanpham/list_binhluan.php'; // Trỏ đến file view danh sách bình luận
    }


    // Chuyển trạng thái bình luận giữa Hiện và Ẩn
    public function toggleStatus()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->modelBinhLuan->toggleStatus($id);

            if ($result) {
                header('Location: index.php?act=binh-luan'); // Chuyển hướng lại danh sách bình luận
            } else {
                echo "Có lỗi xảy ra khi cập nhật trạng thái.";
            }
        }
    }
    public function deleteBinhluan($id)
    {
        if ($id && is_numeric($id)) {  // Kiểm tra ID hợp lệ
            $this->modelBinhLuan->delete($id);
            header("Location: index.php?act=binh-luan");
        } else {
            echo "ID không hợp lệ!";
        }
    }
}
