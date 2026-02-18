<?php
    include_once("checklogin.php");
    include_once("connectdb.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการลูกค้า - อนัญญา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f8fbff; /* ฟ้าอ่อนสว่าง */
        }
        .main-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(13, 110, 253, 0.05);
            overflow: hidden;
        }
        .table thead {
            background-color: #0d6efd;
            color: white;
        }
        .avatar-circle {
            width: 40px;
            height: 40px;
            background-color: #e3f2fd;
            color: #0d6efd;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: bold;
        }
        .search-bar {
            border-radius: 10px;
            border: 1px solid #dee2e6;
            padding-left: 40px;
        }
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php"><i class="bi bi-shield-lock me-2"></i>ADMIN PANEL</a>
        <div class="ms-auto">
            <span class="navbar-text text-white me-3 d-none d-sm-inline">
                สวัสดีคุณ <?php echo $_SESSION['name']; ?>
            </span>
            <a href="logout.php" class="btn btn-light btn-sm text-primary fw-bold">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mb-4 align-items-end">
        <div class="col-md-6">
            <h2 class="fw-bold text-primary">รายชื่อลูกค้า</h2>
            <p class="text-muted mb-0">จัดการข้อมูลสมาชิกและประวัติการติดต่อ</p>
        </div>
        <div class="col-md-6 mt-3 mt-md-0">
            <div class="position-relative">
                <i class="bi bi-search search-icon"></i>
                <input type="text" class="form-control search-bar" placeholder="ค้นหาชื่อลูกค้า หรือเบอร์โทรศัพท์...">
            </div>
        </div>
    </div>

    <div class="card main-card bg-white">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="py-3 ps-4">ลูกค้า</th>
                        <th class="py-3">เบอร์โทรศัพท์</th>
                        <th class="py-3">อีเมล</th>
                        <th class="py-3">ที่อยู่</th>
                        <th class="py-3 text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // ดึงข้อมูลลูกค้า
                    $sql = "SELECT * FROM customers ORDER BY c_id DESC";
                    $rs = mysqli_query($conn, $sql);
                    while($data = mysqli_fetch_array($rs)){
                    ?>
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar-circle me-3">
                                    <?php echo mb_substr($data['c_name'], 0, 1, 'UTF-8'); ?>
                                </div>
                                <div>
                                    <div class="fw-bold text-dark"><?php echo $data['c_name']; ?></div>
                                    <small class="text-muted">ID: #CUS-<?php echo $data['c_id']; ?></small>
                                </div>
                            </div>
                        </td>
                        <td><?php echo $data['c_phone']; ?></td>
                        <td><?php echo $data['c_email']; ?></td>
                        <td><small class="text-muted text-truncate d-inline-block" style="max-width: 200px;"><?php echo $data['c_address']; ?></small></td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm rounded-pill" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                    <li><a class="dropdown-item" href="customer_edit.php?id=<?php echo $data['c_id']; ?>"><i class="bi bi-pencil me-2 text-warning"></i>แก้ไขข้อมูล</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="customer_del.php?id=<?php echo $data['c_id']; ?>" onclick="return confirm('ยืนยันการลบลูกค้ารายนี้?')"><i class="bi bi-trash me-2"></i>ลบสมาชิก</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row g-3 mt-4">
        <div class="col-6 col-md-3">
            <a href="products.php" class="btn btn-outline-primary w-100 py-3 rounded-4">
                <i class="bi bi-box-seam fs-4 d-block mb-1"></i> สินค้า
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="orders.php" class="btn btn-outline-primary w-100 py-3 rounded-4">
                <i class="bi bi-cart-check fs-4 d-block mb-1"></i> ออเดอร์
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="customers.php" class="btn btn-primary w-100 py-3 rounded-4">
                <i class="bi bi-people fs-4 d-block mb-1"></i> ลูกค้า
            </a>
        </div>
        <div class="col-6 col-md-3">
            <a href="index2.php" class="btn btn-outline-secondary w-100 py-3 rounded-4">
                <i class="bi bi-house fs-4 d-block mb-1"></i> หน้าหลัก
            </a>
        </div>
    </div>
</div>

<footer class="py-5 text-center text-muted">
    <p class="mb-0">ระบบจัดการหลังบ้าน &middot; อนัญญา ผลจันทร์ (ตาล)</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>