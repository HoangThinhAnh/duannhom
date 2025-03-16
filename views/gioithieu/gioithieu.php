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
    /* Tổng quát *

/* Sidebar */
.sidebar {
    background-color: #fff;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}
.sidebar-widget {
    margin-bottom: 20px;
}
.sidebar-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}
.sidebar-widget img {
    margin-top: 10px;
    border-radius: 10px;
    width: 100%;
}

/* Breadcrumb */
.breadcrumb-wrap {
    background-color: #f8f9fa;
    padding: 15px 20px;
    border-radius: 5px;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
}
.breadcrumb-item a {
    color: #007bff;
    text-decoration: none;
}
.breadcrumb-item a:hover {
    text-decoration: underline;
}
.breadcrumb-item.active {
    color: #6c757d;
}

/* Phần giới thiệu */
.section-title {
    margin-bottom: 30px;
}
.section-title h2 {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
    position: relative;
    display: inline-block;
}
.section-title h2:after {
    content: '';
    width: 50px;
    height: 3px;
    background-color: #007bff;
    display: block;
    margin: 10px auto 0;
}

.about-us img {
    border-radius: 10px;
}
.about-us p {
    margin-bottom: 15px;
    text-align: justify;
}
.about-us ul {
    list-style: none;
    padding: 0;
}
.about-us ul li {
    margin-bottom: 10px;
    position: relative;
    padding-left: 25px;
}
.about-us ul li:before {
    content: '\2713';
    color: #28a745;
    font-weight: bold;
    position: absolute;
    left: 0;
    top: 0;
}

/* Các giá trị cốt lõi */
.mt-4 .col-md-4 img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 15px;
}
.mt-4 .col-md-4 h4 {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #007bff;
}
.mt-4 .col-md-4 p {
    font-size: 0.95rem;
    color: #555;
}

/* Nút bấm */
.btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    font-size: 1rem;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}
.btn-primary:hover {
    background-color: #0056b3;
    color: #fff;
}

/* Đáp ứng di động */
@media (max-width: 768px) {
    .breadcrumb-wrap {
        text-align: center;
    }
    .section-title h2 {
        font-size: 1.75rem;
    }
    .about-us img {
        margin-bottom: 20px;
    }
}

</style>
<body>
    
</body>
</html>
<main>
    <div class="container">
        <div class="row">
            <!-- Sidebar bên trái -->
            <div class="col-md-3">
                <div class="sidebar">
                    <!-- Widget giới thiệu -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-title">Về chúng tôi</h3>
                        <p>
                            Chào mừng bạn đến với <strong>Website Bán Hàng</strong>. Chúng tôi cam kết mang đến cho bạn những sản phẩm chất lượng cao và trải nghiệm mua sắm tốt nhất.
                        </p>
                        <img src="assets/img/slider/slide1.jpg" alt="Giới thiệu" class="img-fluid mt-3">
                        <img src="assets/img/slider/slide1.jpg" alt="Giới thiệu" class="img-fluid mt-3">
                        <img src="assets/img/slider/slide1.jpg" alt="Giới thiệu" class="img-fluid mt-3">
                        <img src="assets/img/slider/slide1.jpg" alt="Giới thiệu" class="img-fluid mt-3">
                        
                    </div>
                </div>
            </div>

            <!-- Nội dung giới thiệu bên phải -->
            <div class="col-md-9">
                <!-- breadcrumb area start -->
                <div class="breadcrumb-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb-wrap">
                                    <nav aria-label="breadcrumb">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- breadcrumb area end -->

                <!-- Content area start -->
                <section class="about-us section-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title text-center">
                                    <h2 class="title">Về chúng tôi</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="assets/img/slider/slide1.jpg" alt="Về chúng tôi" class="img-fluid rounded">
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <strong>Website Bán Hàng</strong> tự hào là nơi cung cấp hàng ngàn sản phẩm thuộc các lĩnh vực thời trang, điện tử, gia dụng, và nhiều hơn nữa. Chúng tôi không ngừng nỗ lực để đem đến những sản phẩm tốt nhất cùng dịch vụ chăm sóc khách hàng tận tình.
                                </p>
                                <p>
                                    Với đội ngũ nhân viên giàu kinh nghiệm và tận tâm, chúng tôi luôn sẵn sàng hỗ trợ bạn trong suốt hành trình mua sắm. Chúng tôi tin rằng chất lượng và sự hài lòng của khách hàng chính là yếu tố quan trọng nhất.
                                </p>
                                <ul>
                                    <li>Sản phẩm chất lượng cao</li>
                                    <li>Dịch vụ khách hàng chuyên nghiệp</li>
                                    <li>Giá cả cạnh tranh</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4 text-center">
                                <img src="assets/img/slider/slide1.jpg" alt="Tầm nhìn" class="img-fluid rounded">
                                <h4 class="mt-2">Tầm nhìn</h4>
                                <p>Trở thành đơn vị bán lẻ hàng đầu, mang lại giá trị tốt nhất cho khách hàng.</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="assets/img/slider/slide1.jpg" alt="Sứ mệnh" class="img-fluid rounded">
                                <h4 class="mt-2">Sứ mệnh</h4>
                                <p>Cung cấp sản phẩm chất lượng cao với dịch vụ hoàn hảo.</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="assets/img/slider/slide1.jpg" alt="Giá trị cốt lõi" class="img-fluid rounded">
                                <h4 class="mt-2">Giá trị cốt lõi</h4>
                                <p>Chất lượng - Uy tín - Hài lòng khách hàng.</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <a href="<?= BASE_URL . '?act=list-sanpham' ?>" class="btn btn-primary">Khám phá sản phẩm</a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Content area end -->
            </div>
        </div>
    </div>
</main>

<?php require_once 'views/layout/footer.php'; ?>
