<?php

class TinTuc
{

    public $db;

    // ket noi CSDL
    public function __construct()
    {
        $this->db = connectDB();
    }


    // danh sach tintuc
    public function getAll()
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

    // them moi du lieu vao csdl
    public function addData_tintuc($tieude_tintucs, $noidung_tintucs, $image, $trangthai_tintucs, $ngaytao_tintucs)
    {
        try {
            $sql = 'INSERT INTO ql_tintuc (tieude, noidung, image, Trangthai, ngay_tao) 
                VALUES (:tieude, :noidung, :image, :Trangthai, :ngay_tao)';

            $stmt = $this->db->prepare($sql);

            // Gán giá trị vào các tham số
            $stmt->bindParam(':tieude', $tieude_tintucs);
            $stmt->bindParam(':noidung', $noidung_tintucs);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':Trangthai', $trangthai_tintucs);
            $stmt->bindParam(':ngay_tao', $ngaytao_tintucs);


            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }





    // lay thong tin chi tiet tu from add
    // lay thong tin chi tiet
    public function createData($id)
    {
        try {
            $sql = 'SELECT * FROM ql_tintuc WHERE id = :id';

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            $result = $stmt->fetch();
            // Kiểm tra kết quả
            if ($result) {
                return $result;
            } else {
                return null; // hoặc bạn có thể throw một exception tùy vào yêu cầu
            }
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }


    //cap nhat du lieu 
    public function updateData($id, $tieude_tintucs, $noidung_tintucs, $image, $trangthai_tintucs, $ngaytao_tintucs)
    {
        try {
            // Cập nhật dữ liệu mà không có image và theloai
            $sql = 'UPDATE ql_tintuc SET tieude = :tieude, noidung = :noidung, image = :image,  Trangthai = :Trangthai, ngay_tao = :ngay_tao WHERE id = :id';

            $stmt = $this->db->prepare($sql);

            // Gán giá trị vào các tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tieude', $tieude_tintucs);
            $stmt->bindParam(':noidung', $noidung_tintucs);
            $stmt->bindParam(':Trangthai', $trangthai_tintucs);
            $stmt->bindParam(':ngay_tao', $ngaytao_tintucs);
            $stmt->bindParam(':image', $image);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }




    // xoa du lieu tintuc trong CSDL
    public function delete_Tintuc($id)
    {
        try {
            $sql = 'DELETE FROM  ql_tintuc WHERE id = :id';

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'loi: ' . $e->getMessage();
        }
    }



    // huy ket noi CSDL 
    public function __destruct()
    {
        $this->db = null;
    }

    public function searchData($search)
    {
        try {
            // Tạo câu truy vấn SQL tìm kiếm theo tên, email, số điện thoại, trạng thái
            $sql = "SELECT * FROM ql_tintuc WHERE tieude LIKE :search";

            $stmt = $this->db->prepare($sql);
            // Thêm dấu % vào từ khóa để tìm kiếm theo chuỗi chứa từ khóa
            $stmt->bindValue(':search', '%' . $search . '%');

            $stmt->execute();

            $results = $stmt->fetchAll();

            return !empty($results) ? $results : [];
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
}
