<?php
session_start();
include_once("connectdb.php"); // เชื่อมต่อฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - อนัญญา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #e3f2fd; /* สีฟ้าอ่อนสบายตา */
            font-family: 'Sarabun', sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div class="card login-card p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4 text-primary">เข้าสู่ระบบ</h3>
                    <hr class="mb-4">
                    
                    <form method="post" action="">
                        <div class="mb-3">
                            <label class="form-label">ชื่อผู้ใช้งาน</label>
                            <input type="text" name="auser" class="form-control" placeholder="Username" autofocus required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">รหัสผ่าน</label>
                            <input type="password" name="apwd" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="Submit" class="btn btn-primary btn-lg">LOGIN</button>
                        </div>
                    </form>

                    <?php
                    if(isset($_POST['Submit'])){
                        $user = $_POST['auser'];
                        $pwd = $_POST['apwd'];

                        // 1. ป้องกัน SQL Injection ด้วย Prepared Statement
                        $stmt = mysqli_prepare($conn, "SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
                        mysqli_stmt_bind_param($stmt, "s", $user);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $data = mysqli_fetch_array($result);

                        // 2. ตรวจสอบว่าพบ User และเช็ครหัสผ่าน (ใช้ password_verify)
                        if ($data && password_verify($pwd, $data['a_password'])) {
                            $_SESSION['aid'] = $data['a_id'];
                            $_SESSION['name'] = $data['a_name'];
                            
                            echo "<script>
                                    window.location='index2.php';
                                  </script>";
                        } else {
                            echo "<div class='alert alert-danger mt-3 text-center' role='alert'>
                                    Username หรือ Password ไม่ถูกต้อง
                                  </div>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="text-center mt-3 text-muted">
                <small>© อนัญญา ผลจันทร์ (ตาล)</small>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>