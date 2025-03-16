
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


/* Tiêu đề trang */
.page-title-box {
    background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
.page-title-box h4 {
    font-size: 2rem;
    color: #6c757d;
    margin: 0;
}

/* Sidebar */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
.card-body {
    padding: 20px;
}
.search-box input {
    border: 1px solid #ddd;
    padding: 10px 15px;
    border-radius: 50px;
    width: 100%;
    transition: all 0.3s ease;
}
.search-box input:focus {
    border-color: #ff7f50;
    box-shadow: 0 0 5px rgba(255, 127, 80, 0.5);
    outline: none;
}
.search-icon {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    color: #888;
}

/* Thể loại */
ul.fw-medium li {
    padding: 10px 0;
}
ul.fw-medium li a {
    color: #6c757d;
    text-decoration: none;
    transition: all 0.3s ease;
}
ul.fw-medium li a:hover {
    color: #ff7f50;
    text-decoration: underline;
}
ul.fw-medium .badge {
    background-color: #ffc107;
    color: #fff;
    font-size: 0.9rem;
}

/* Danh sách tin tức */
.card.shadow-sm {
    border: none;
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card.shadow-sm:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}
.card-img-top {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    object-fit: cover;
    height: 200px;
}
.card-title {
    font-size: 1.2rem;
    color: #333;
    margin: 10px 0;
}
.card-text {
    color: #555;
    font-size: 0.95rem;
}
.card-footer {
    background-color: #f8f9fa;
    border-top: 1px solid #eee;
    text-align: center;
    font-size: 0.9rem;
    color: #777;
}
.btn-primary {
    background-color: #ff7f50;
    border: none;
    border-radius: 50px;
    padding: 10px 20px;
    transition: all 0.3s ease;
}
.btn-primary:hover {
    background-color: #e76e3d;
    box-shadow: 0 4px 10px rgba(255, 127, 80, 0.5);
}

/* Scroll to Top */
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
}
.scroll-top:hover {
    background-color: #e76e3d;
    transform: translateY(-3px);
}

/* Responsive */
@media (max-width: 768px) {
    .page-title-box h4 {
        font-size: 1.5rem;
    }
    .card-title {
        font-size: 1rem;
    }
    .btn-primary {
        font-size: 0.9rem;
        padding: 8px 16px;
    }
}

</style>
<body>
    
</body>
</html>
<body>
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0" style="color: brown;">Trang Tin Tức</h4>
                    </div>
                </div>

            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xxl-3">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="search-box">
                                <p style="color: brown;" class="py-2 d-block">Search</p>
                                <div class="position-relative">
                                    <input type="text" class="form-control rounded bg-light border-light" placeholder="Search...">
                                    <i class="mdi mdi-magnify search-icon"></i>
                                </div>
                            </div>

                            <div class="mt-4 pt-4 border-top border-dashed border-bottom-0 border-start-0 border-end-0">
                                <p style="color: brown;" class="py-2 d-block">Thể loại </p>

                                <ul class="list-unstyled fw-medium">
                                    <li><a href="index.php?category=TinMoi" class="text-dark py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i> Tin mới</a></li>
                                    <li><a href="index.php?category=TinNoiBat" class="text-dark py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i> Tin nổi bật <span class="badge badge-soft-success rounded-pill float-end ms-1 font-size-12">04</span></a></li>
                                    <li><a href="index.php?category=SuKienGiamGia" class="text-dark py-2 d-block"><i class="mdi mdi-chevron-right me-1"></i> Sự kiện giảm giá</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xxl-9">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                
                            </div>
                        </div>

                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end gap-2">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control" placeholder="Tim Kiếm Tin Tức">
                                    <i class="ri-search-line search-icon"></i>
                                </div>

                                <select class="form-control w-md" data-choices data-choices-search-false>
                                    <option value="All">All</option>
                                    <option value="Today">Today</option>
                                    <option value="Yesterday" selected>Yesterday</option>
                                    <option value="Last 7 Days">Last 7 Days</option>
                                    <option value="Last 30 Days">Last 30 Days</option>
                                    <option value="This Month">This Month</option>
                                    <option value="Last Year">Last Year</option>
                                </select>
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="col-xxl-9">
                        <div class="row g-4">
                            <?php if (!empty($tinTucs)): ?>
                                <?php foreach ($tinTucs as $tinTuc): ?>
                                    <div class="col-md-4">
                                        <div class="card shadow-sm">
                                            <!-- Đảm bảo đường dẫn ảnh là chính xác -->
                                            <img src="<?= BASE_URL_IMG . $tinTuc['image'] ?>" class="card-img-top" alt="Ảnh bài viết" width="200" height="300">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= htmlspecialchars($tinTuc['tieude']) ?></h5>
                                                <p class="card-text"><?= substr(htmlspecialchars($tinTuc['noidung']), 0, 100) ?>...</p>
                                                <a href="?act=detail-tintuc&id=<?= $tinTuc['id'] ?>" class="btn btn-primary">Xem Chi Tiết</a>
                                            </div>
                                            <div class="card-footer text-muted">
                                                Ngày tạo: <?= htmlspecialchars($tinTuc['ngay_tao']) ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <p class="text-center">Không có tin tức nào.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div><!--end col-->
            </div><!--end row-->


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</body>
<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->

<?php require_once 'views/layout/footer.php'; ?>