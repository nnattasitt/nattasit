<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>66010910979 ณัฐสิทธิ์ พุฒธรรม (ปอนด์)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    /* ปรับความกว้างของ input color ให้สั้นลงเล็กน้อย */
    .form-control-color {
        width: 100px; /* กำหนดความกว้างที่เหมาะสม */
        height: 40px;
        padding: 0.375rem;
    }
</style>
</head>

<body>
<div class="container mt-5">

    <h1 class="mb-4 text-primary">ฟอร์มรับข้อมูล - ณัฐสิทธิ์ พุฒธรรม (ปอนด์) - Gemini</h1>

    <form method="post" action="" class="p-4 border rounded shadow-sm bg-light">

        <div class="mb-3">
            <label for="fullname" class="form-label">ชื่อ-สกุล <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="fullname" name="fullname" autofocus required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="height" class="form-label">ส่วนสูง <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="number" class="form-control" id="height" name="height" min="100" max="200" required>
                <span class="input-group-text">ซม.</span>
            </div>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">ที่อยู่</label>
            <textarea class="form-control" id="address" name="address" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label for="birthday" class="form-label">วันเดือนปีเกิด</label>
            <input type="date" class="form-control" id="birthday" name="birthday">
        </div>

        <div class="mb-3">
            <label for="color" class="form-label d-block">สีที่ชอบ</label>
            <input type="color" class="form-control form-control-color" id="color" name="color" value="#000000">
        </div>

        <div class="mb-3">
            <label for="major" class="form-label">สาขาวิชา</label>
            <select class="form-select" id="major" name="major">
                <option value="การบัญชี">การบัญชี</option>
                <option value="การตลาด">การตลาด</option>
                <option value="การจัดการ">การจัดการ</option>
                <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
            </select>
        </div>

        <div class="d-grid gap-2 d-md-block mt-4">
            <button type="submit" name="Submit" class="btn btn-primary">สมัครสมาชิก</button>
            <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
            <button type="button" onClick="window.location='https://www.msu.ac.th/';window.open('https://www.msu.ac.th/','_blank');" class="btn btn-info text-white">Go to MSU</button>
            <button type="button" onMouseOver="alert('อาจจะยังน้า!');" class="btn btn-warning">Hello</button>
            <button type="button" onClick="window.print();" class="btn btn-dark">พิมพ์</button>
        </div>

    </form>
    
    <hr class="my-5">

    <?php
    if (isset($_POST['Submit'])) {
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $height = $_POST['height'];
        $address = $_POST['address'];
        $birthday = $_POST['birthday'];
        $color = $_POST['color'];
        $major = $_POST['major'];
        
        echo "<div class='card border-success mt-4 shadow-lg'>";
        echo "<div class='card-header bg-success text-white fs-5'>ผลลัพธ์จากการส่งข้อมูล</div>";
        echo "<div class='card-body'>";
        
        echo "<p class='mb-2'><strong>ชื่อ-สกุล:</strong> {$fullname}</p>";
        echo "<p class='mb-2'><strong>เบอร์โทร:</strong> {$phone}</p>";
        echo "<p class='mb-2'><strong>ส่วนสูง:</strong> {$height} ซม.</p>";
        echo "<p class='mb-2'><strong>ที่อยู่:</strong> <br> {$address}</p>";
        echo "<p class='mb-2'><strong>วันเดือนปีเกิด:</strong> {$birthday}</p>";
        // การแสดงผลสีที่ชอบที่สวยงามขึ้นด้วย Bootstrap
        echo "<p class='mb-2 d-flex align-items-center'><strong>สีที่ชอบ:</strong> <div class='ms-2 p-2 rounded shadow-sm' style='background-color:{$color};width:300px; border: 1px solid #dee2e6;'>{$color}</div></p>";
        echo "<p class='mb-0'><strong>สาขาวิชา:</strong> {$major}</p>";
        
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>