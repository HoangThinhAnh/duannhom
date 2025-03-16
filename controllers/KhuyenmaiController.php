<?php
require_once 'models/Khuyenmai.php';
class KmaiController
{
    public $modelKhuyenmai;

    public function __construct()
    {
        $this->modelKhuyenmai = new KhuyenMai();
    }


    public function listKhuyenmai() {
        $khuyenMaiList = $this->modelKhuyenmai->getAllKhuyenMai();
        require_once 'views/khuyenmai/khuyenmai.php'; 
    }
}