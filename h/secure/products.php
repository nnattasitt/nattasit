<?php
    include_once("checklogin.php");
    include_once("connectdb.php"); // อย่าลืมเชื่อมต่อ DB เพื่อดึงข้อมูลมาโชว์
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสินค้า - อนัญญา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f0f8ff; 
        }
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .main-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            background-color: white;
        }
        .table thead {
            background-color: #e3f2fd;
            color: #0d6efd;
        }
        .btn-add {
            background-color: #0d6efd;
            border-radius: 10px;
            padding: 10px 20px;
        }
        .img-product {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="index2.php">ADMIN PANEL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-3">
                    <span class="text-secondary"><i class="bi bi-person-circle me-1"></i> <?php echo $_SESSION['name']; ?></span>
                </li>
                <li class="nav-item border-start ps-3">
                    <a class="btn btn-outline-danger btn-sm" href="logout.php">ออกจากระบบ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h3 class="fw-bold text-dark m-0"><i class="bi bi-box-seam me-2 text-primary"></i>จัดการรายการสินค้า</h3>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
            <a href="product_add.php" class="btn btn-primary btn-add shadow-sm">
                <i class="bi bi-plus-lg me-2"></i>เพิ่มสินค้าใหม่
            </a>
        </div>
    </div>

    <div class="card main-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">ลำดับ</th>
                            <th>รูปภาพ</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>สถานะ</th>
                            <th class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // ตัวอย่างการดึงข้อมูลสินค้า (ปรับชื่อตาราง/ฟิลด์ตามจริงของคุณ)
                        $sql = "SELECT * FROM products ORDER BY p_id DESC";
                        $rs = mysqli_query($conn, $sql);
                        $i = 1;
                        while($data = mysqli_fetch_array($rs)){
                        ?>
                        <tr>
                            <td class="ps-4 text-muted"><?php echo $i++; ?></td>
                            <td>
                                <img src="images/<?php echo $data['p_img']; ?>" class="img-product border" alt="product">
                            </td>
                            <td class="fw-bold"><?php echo $data['p_name']; ?></td>
                            <td><span class="text-primary fw-bold"><?php echo number_format($data['p_price'], 2); ?></span> บาท</td>
                            <td>
                                <span class="badge rounded-pill bg-success-subtle text-success border border-success">พร้อมจำหน่าย</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="product_edit.php?id=<?php echo $data['p_id']; ?>" class="btn btn-sm btn-outline-warning">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="product_delete.php?id=<?php echo $data['p_id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('ยืนยันการลบสินค้า?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        
                        <?php if(mysqli_num_rows($rs) == 0): ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">ไม่พบข้อมูลสินค้าในระบบ</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="index2.php" class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left-short"></i> กลับหน้าหลักแอดมิน
        </a>
    </div>
</div>

<footer class="py-5 text-center text-muted">
    <small>© อนัญญา ผลจันทร์ (ตาล)</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>