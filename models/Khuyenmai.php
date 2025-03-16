<?php 
    class KhuyenMai 
    {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllKhuyenMai() {
        $query = "SELECT * FROM khuyen_mais ORDER BY ngay_bat_dau DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}