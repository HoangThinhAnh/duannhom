<?php

function checkDangNhapAdmin(){
    if (!isset($_SESSION['nguoidungs_admin'])){
        header("Location: http://localhost/PH49685-DuAn1/base_du_an_1/admin/index.php" . '?act=form-dang-nhap');
        exit();
    }
}
 
