<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>66010910979 ณัฐสิทธิ์ พุฒธรรม (ปอนด์)</title>

<!-- Bootstrap 5.3 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f5f7fa;
    }
    .form-container {
        max-width: 600px;
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
</style>
</head>

<body>

<div class="container">
    <div class="form-container">

        <h1 class="text-center mb-4">ฟอร์มรับข้อมูล - ณัฐสิทธิ์ พุฒธรรม (ปอนด์) - ChatGPT</h1>

        <form method="post" action="">
            
            <!-- Fullname -->
            <div class="mb-3">
                <label class="form-label">ชื่อ-สกุล *</label>
                <input type="text" name="fullname" class="form-control" required autofocus>
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label class="form-label">เบอร์โทร *</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            <!-- Height -->
            <div class="mb-3">
                <label class="form-label">ส่วนสูง (ซม.) *</label>
                <input type="number" name="height" min="100" max="200" class="form-control" required>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label class="form-label">ที่อยู่</label>
                <textarea name="address" rows="4" class="form-control"></textarea>
            </div>

            <!-- Birthday -->
            <div class="mb-3">
                <label class="form-label">วันเดือนปีเกิด</label>
                <input type="date" name="birthday" class="form-control">
            </div>

            <!-- Favorite Color -->
            <div class="mb-3">
                <label class="form-label">สีที่ชอบ</label>
                <input type="color" name="color" class="form-control form-control-color">
            </div>

            <!-- Major -->
            <div class="mb-3">
                <label class="form-label">สาขาวิชา</label>
                <select name="major" class="form-select">
                    <option value="การบัญชี">การบัญชี</option>
                    <option value="การตลาด">การตลาด</option>
                    <option value="การจัดการ">การจัดการ</option>
                    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="d-flex flex-wrap gap-2 mt-3">
                <button type="submit" name="Submit" class="btn btn-primary">สมัครสมาชิก</button>
                <button type="reset" class="btn btn-warning">ล้างข้อมูล</button>
                <button type="button" class="btn btn-info text-white" onclick="window.location='https://www.msu.ac.th/'">Go to MSU</button>
                <button type="button" class="btn btn-secondary" onmouseover="alert('อาจจะยังน้า!');">Hello</button>
                <button type="button" class="btn btn-dark" onclick="window.print()">พิมพ์</button>
            </div>
        </form>

    </div>
</div>

<hr>

<div class="container">

<?php
if (isset($_POST['Submit'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $height = $_POST['height'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];
    $color = $_POST['color'];
    $major = $_POST['major'];

    echo "<div class='alert alert-success'>";
    echo "<h4>ผลลัพธ์ที่ส่งมา:</h4>";
    echo "ชื่อ-สกุล: ".$fullname."<br>";
    echo "เบอร์โทร: ".$phone."<br>";
    echo "ส่วนสูง: ".$height." ซม.<br>";
    echo "ที่อยู่: ".$address."<br>";
    echo "วันเดือนปีเกิด: ".$birthday."<br>";
    echo "สีที่ชอบ: <div style='background-color:{$color}; width:100px; height:30px; border-radius:4px;'></div>";
    echo "สาขาวิชา: ".$major."<br>";
    echo "</div>";
}
?>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
