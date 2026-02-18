<?php
    include_once("checklogin.php");
    include_once("connectdb.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการออเดอร์ - อนัญญา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f0f8ff; 
        }
        .main-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            background-color: white;
        }
        .table thead {
            background-color: #eef7ff;
            color: #0d6efd;
        }
        .status-pending { background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; }
        .status-paid { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="index2.php">ADMIN SYSTEM</a>
        <div class="ms-auto d-flex align-items-center">
            <span class="me-3 d-none d-md-inline text-muted">ผู้ใช้งาน: <strong><?php echo $_SESSION['name']; ?></strong></span>
            <a href="logout.php" class="btn btn-outline-danger btn-sm">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold"><i class="bi bi-cart-check text-primary me-2"></i>จัดการรายการสั่งซื้อ</h2>
            <p class="text-muted">ตรวจสอบและอัปเดตสถานะการสั่งซื้อของลูกค้า</p>
        </div>
        <div class="col-md-4 text-md-end">
            <button class="btn btn-primary" onclick="window.print()">
                <i class="bi bi-printer me-2"></i>พิมพ์รายงาน
            </button>
        </div>
    </div>

    <div class="row g-3 mb-4 text-center">
        <div class="col-md-4">
            <div class="card main-card p-3 border-start border-primary border-4">
                <h6 class="text-muted">ออเดอร์ทั้งหมด</h6>
                <h3 class="fw-bold mb-0">120</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card main-card p-3 border-start border-warning border-4">
                <h6 class="text-muted">รอตรวจสอบ</h6>
                <h3 class="fw-bold mb-0 text-warning">5</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card main-card p-3 border-start border-success border-4">
                <h6 class="text-muted">ยอดขายเดือนนี้</h6>
                <h3 class="fw-bold mb-0 text-success">฿45,000</h3>
            </div>
        </div>
    </div>

    <div class="card main-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">เลขที่ใบสั่งซื้อ</th>
                            <th>วันที่สั่งซื้อ</th>
                            <th>ชื่อลูกค้า</th>
                            <th>ราคาสุทธิ</th>
                            <th>สถานะ</th>
                            <th class="text-center">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // สมมติการดึงข้อมูลจากตาราง orders (ปรับเปลี่ยนตามจริง)
                        $sql = "SELECT * FROM orders ORDER BY o_id DESC";
                        $rs = mysqli_query($conn, $sql);
                        while($data = mysqli_fetch_array($rs)){
                        ?>
                        <tr>
                            <td class="ps-4 fw-bold">#ORD-<?php echo $data['o_id']; ?></td>
                            <td><?php echo $data['o_date']; ?></td>
                            <td><?php echo $data['c_name']; ?></td>
                            <td class="text-primary fw-bold">฿<?php echo number_format($data['o_total'], 2); ?></td>
                            <td>
                                <?php if($data['o_status'] == 0): ?>
                                    <span class="badge rounded-pill status-pending">รอยืนยัน</span>
                                <?php else: ?>
                                    <span class="badge rounded-pill status-paid">ชำระเงินแล้ว</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="order_details.php?id=<?php echo $data['o_id']; ?>" class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-search me-1"></i>ดูรายละเอียด
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-5 p-4 bg-white rounded-4 shadow-sm">
        <div class="row text-center">
            <div class="col-3 border-end"><a href="products.php" class="text-decoration-none"><i class="bi bi-box-seam"></i><br>สินค้า</a></div>
            <div class="col-3 border-end text-primary fw-bold"><i class="bi bi-cart-check"></i><br>ออเดอร์</div>
            <div class="col-3 border-end"><a href="customers.php" class="text-decoration-none text-dark"><i class="bi bi-people"></i><br>ลูกค้า</a></div>
            <div class="col-3"><a href="logout.php" class="text-decoration-none text-danger"><i class="bi bi-power"></i><br>ออก</a></div>
        </div>
    </div>
</div>

<footer class="py-5 text-center text-muted">
    <small>ออกแบบและพัฒนาโดย อนัญญา ผลจันทร์ (ตาล)</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>