<?php require_once 'views/layout/header.php'; ?>
<?php require_once 'views/layout/menu.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Tổng quan */

/* Chi tiết trang tin tức */
.text-brown {
    color: #8B4513; /* Màu nâu đậm cho tiêu đề */
}

.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}
.card-header {
    background: linear-gradient(135deg, #ff7f50, #ff4500);
    text-align: center;
    padding: 20px 15px;
    color: #fff;
    border-bottom: none;
}
.card-header h4 {
    font-size: 1.8rem;
    margin: 0;
}
.card-header p {
    font-size: 0.9rem;
    margin-top: 10px;
    color: rgba(255, 255, 255, 0.8);
}
.card .content-detail {
    padding: 20px;
    font-size: 1rem;
    line-height: 1.8;
    color: #555;
    background-color: #fff;
    border-radius: 15px;
    margin-top: 15px;
}

/* Scroll to top */
.scroll-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #ff7f50;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
    opacity: 0;
    visibility: hidden;
}
.scroll-top.visible {
    opacity: 1;
    visibility: visible;
}
.scroll-top:hover {
    background-color: #e76e3d;
    transform: translateY(-3px);
}

/* Responsive */
@media (max-width: 768px) {
    .card-header h4 {
        font-size: 1.5rem;
    }
    .card-header p {
        font-size: 0.8rem;
    }
    .card .content-detail {
        font-size: 0.9rem;
        padding: 15px;
    }
}

</style>
<body>
    
</body>
</html>
<div class="row justify-content-center">
    <!-- News detail column -->
    <div class="col-xxl-10 col-lg-12" style="width: 90%; margin: auto;">
        <h2 class="text-center text-brown mb-4">Chi tiết Trang Tin Tức</h2>
        <?php if ($tinTuc) { ?>
            <div class="card shadow-lg" style="margin: 20px auto; padding: 20px; max-width: 100%;">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title text-center"><?= htmlspecialchars($tinTuc['tieude']) ?></h4>
                    <p class="card-subtitle text-center">Ngày tạo: <?= htmlspecialchars($tinTuc['ngay_tao']) ?></p>
                </div>
                <div class="content-detail" style="line-height: 1.8; font-size: 16px;">
                    <?= $tinTuc['noidung'] ?>
                </div>
            </div>
        <?php } else { ?>
            <p class="text-center text-danger">Bài viết không tồn tại.</p>
        <?php } ?>
    </div>
</div>

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->

<?php require_once 'views/layout/menu.php'; ?>