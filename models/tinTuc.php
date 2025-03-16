<?php
class tintuc
{

    public $db;

    // ket noi CSDL
    public function __construct()
    {
        $this->db = connectDB();
    }


    // danh sach tintuc
    public function getAlltinTuc()
    {
        try {
            $sql = 'SELECT * FROM ql_tintuc';

            $stmt = $this->db->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'loi: ' . $e->getMessage();
        }
    }

    public function getTinTucByCategory($category = null)
    {
        // Xây dựng câu truy vấn SQL, nếu có thể loại thì lọc theo thể loại đó
        $sql = "SELECT tieude, noidung, ngay_tao, Trangthai, theloai FROM  ql_tintuc";

        if ($category) {
            // Thêm điều kiện lọc theo thể loại
            $sql .= " WHERE theloai = :category";
        }

        $stmt = $this->db->prepare($sql);

        // Nếu có thể loại thì gán giá trị thể loại vào câu truy vấn
        if ($category) {
            $stmt->bindParam(':category', 1);
        }

        $stmt->execute();

        // Lấy tất cả dữ liệu và trả về dưới dạng mảng
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Lấy thông tin bài viết theo id
    public function getTinTucById($id)
    {
        $sql = "SELECT * FROM ql_tintuc WHERE id = :id"; // Câu truy vấn SQL lấy bài viết theo id
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Lấy dữ liệu và trả về
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}