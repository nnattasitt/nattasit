<?php
    include_once("checklogin.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>หน้าหลักแอดมิน - อนัญญา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f0f8ff; /* Alice Blue */
        }
        .sidebar {
            min-height: 100vh;
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
        }
        .nav-link {
            color: #495057;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 5px 15px;
            transition: all 0.3s;
        }
        .nav-link:hover {
            background-color: #e3f2fd;
            color: #0d6efd;
        }
        .nav-link.active {
            background-color: #0d6efd;
            color: white;
        }
        .main-content {
            padding: 30px;
        }
        .admin-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        .admin-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse shadow-sm">
            <div class="position-sticky pt-3">
                <div class="text-center mb-4">
                    <i class="bi bi-person-circle text-primary" style="font-size: 3rem;"></i>
                    <h6 class="mt-2 fw-bold text-secondary">แอดมิน: <?php echo $_SESSION['name']; ?></h6>
                </div>
                <hr>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="index2.php">
                            <i class="bi bi-house-door me-2"></i> หน้าหลัก
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">
                            <i class="bi bi-box-seam me-2"></i> จัดการสินค้า
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php">
                            <i class="bi bi-cart-check me-2"></i> จัดการออเดอร์
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customers.php">
                            <i class="bi bi-people me-2"></i> จัดการลูกค้า
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a class="nav-link text-danger" href="logout.php">
                            <i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
                <h1 class="h2 text-primary">ระบบจัดการหลังบ้าน</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Admin Dashboard</li>
                    </ol>
                </nav>
            </div>

            <div class="alert alert-info border-0 shadow-sm rounded-4 p-4 mb-4" style="background-color: #d1ecf1;">
                <h4 class="alert-heading">ยินดีต้อนรับกลับมา!</h4>
                <p class="mb-0">สวัสดีคุณ <strong><?php echo $_SESSION['name']; ?></strong> วันนี้คุณต้องการจัดการส่วนไหนของระบบดีครับ?</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <a href="products.php" class="text-decoration-none">
                        <div class="card admin-card p-3 text-center bg-white">
                            <div class="card-body">
                                <i class="bi bi-box-seam text-primary mb-3" style="font-size: 2.5rem;"></i>
                                <h5 class="card-title text-dark">สินค้าทั้งหมด</h5>
                                <p class="card-text text-muted">เพิ่ม แก้ไข หรือลบสินค้า</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="orders.php" class="text-decoration-none">
                        <div class="card admin-card p-3 text-center bg-white">
                            <div class="card-body">
                                <i class="bi bi-receipt text-success mb-3" style="font-size: 2.5rem;"></i>
                                <h5 class="card-title text-dark">คำสั่งซื้อ</h5>
                                <p class="card-text text-muted">ตรวจสอบรายการสั่งซื้อใหม่</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="customers.php" class="text-decoration-none">
                        <div class="card admin-card p-3 text-center bg-white">
                            <div class="card-body">
                                <i class="bi bi-people text-info mb-3" style="font-size: 2.5rem;"></i>
                                <h5 class="card-title text-dark">ลูกค้า</h5>
                                <p class="card-text text-muted">ดูข้อมูลและประวัติลูกค้า</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <footer class="pt-5 my-5 text-muted border-top text-center">
                อนัญญา ผลจันทร์ (ตาล) &middot; &copy; 2026 Admin Management System
            </footer>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>