<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการสมัครงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-success rounded-3">
                    <div class="card-header bg-success text-white text-center py-3">
                        <h1 class="h3 mb-0">✅ ข้อมูลการสมัครงานถูกส่งเรียบร้อยแล้ว</h1>
                        <p class="mb-0">บริษัท ณัฐสิทธิ์ จำกัด จะติดต่อกลับโดยเร็วที่สุด</p>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        
                        <?php
                        // ตรวจสอบว่ามีการส่งข้อมูลผ่าน method POST หรือไม่
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            
                            // ฟังก์ชันช่วยในการทำความสะอาดและดึงข้อมูล
                            function sanitize_input($data) {
                                $data = trim($data);
                                $data = stripslashes($data);
                                $data = htmlspecialchars($data);
                                return $data;
                            }

                            // กำหนดตัวแปรสำหรับรับค่าจาก $_POST
                            $jobPosition = sanitize_input($_POST['jobPosition'] ?? '');
                            $otherPosition = sanitize_input($_POST['otherPosition'] ?? '');
                            $prefix = sanitize_input($_POST['prefix'] ?? '');
                            $firstName = sanitize_input($_POST['firstName'] ?? '');
                            $lastName = sanitize_input($_POST['lastName'] ?? '');
                            $dob = sanitize_input($_POST['dob'] ?? '');
                            $phone = sanitize_input($_POST['phone'] ?? '');
                            $email = sanitize_input($_POST['email'] ?? '');
                            $address = sanitize_input($_POST['address'] ?? '');
                            $educationLevel = sanitize_input($_POST['educationLevel'] ?? '');
                            $major = sanitize_input($_POST['major'] ?? '');
                            $university = sanitize_input($_POST['university'] ?? '');
                            $specialSkills = sanitize_input($_POST['specialSkills'] ?? '');
                            $workExperience = sanitize_input($_POST['workExperience'] ?? '');
                            $expectedSalary = sanitize_input($_POST['expectedSalary'] ?? '');
                            $startDate = sanitize_input($_POST['startDate'] ?? '');
                            
                            // จัดการกับตำแหน่งที่ต้องการสมัคร (รวมตำแหน่งอื่นๆ)
                            $displayPosition = ($jobPosition == 'Other' && !empty($otherPosition)) ? $otherPosition . " (ระบุเอง)" : $jobPosition;


                            // ตรวจสอบไฟล์แนบ (หมายเหตุ: การอัปโหลดไฟล์จริงต้องใช้ฟังก์ชัน move_uploaded_file และการจัดการที่ซับซ้อนกว่านี้)
                            $resumeStatus = "ไม่มีการแนบไฟล์";
                            if (isset($_FILES['resumeFile']) && $_FILES['resumeFile']['error'] == 0) {
                                $fileName = $_FILES['resumeFile']['name'];
                                $fileSize = number_format($_FILES['resumeFile']['size'] / 1024, 2); // แปลงเป็น KB
                                $fileType = $_FILES['resumeFile']['type'];
                                $resumeStatus = "ไฟล์: $fileName | ขนาด: $fileSize KB | ชนิด: $fileType";
                                // ในสถานการณ์จริง จะต้องมีการย้ายไฟล์จาก temp location ไปยัง Server
                            }

                            // --- ส่วนแสดงผลข้อมูลในรูปแบบตาราง ---

                            echo "<h4 class='mb-4 text-primary'>สรุปข้อมูลที่ท่านได้กรอก</h4>";

                            echo "<div class='table-responsive'>";
                            echo "<table class='table table-bordered table-striped'>";
                            
                            // ส่วนที่ 1: ตำแหน่ง
                            echo "<thead class='table-light'><tr><th colspan='2'>ส่วนที่ 1: ตำแหน่งที่ต้องการสมัคร</th></tr></thead>";
                            echo "<tbody>";
                            echo "<tr><td>ตำแหน่งที่สมัคร</td><td><strong>" . $displayPosition . "</strong></td></tr>";
                            echo "</tbody>";
                            
                            // ส่วนที่ 2: ข้อมูลส่วนตัว
                            echo "<thead class='table-light'><tr><th colspan='2'>ส่วนที่ 2: ข้อมูลส่วนตัว</th></tr></thead>";
                            echo "<tbody>";
                            echo "<tr><td>ชื่อ-สกุล</td><td>$prefix $firstName $lastName</td></tr>";
                            echo "<tr><td>วันเดือนปีเกิด</td><td>$dob</td></tr>";
                            echo "<tr><td>เบอร์โทรศัพท์</td><td>$phone</td></tr>";
                            echo "<tr><td>อีเมล</td><td>$email</td></tr>";
                            echo "<tr><td>ที่อยู่ปัจจุบัน</td><td>$address</td></tr>";
                            echo "</tbody>";
                            
                            // ส่วนที่ 3: ประวัติการศึกษา
                            echo "<thead class='table-light'><tr><th colspan='2'>ส่วนที่ 3: ประวัติการศึกษา</th></tr></thead>";
                            echo "<tbody>";
                            echo "<tr><td>ระดับการศึกษาสูงสุด</td><td>$educationLevel</td></tr>";
                            echo "<tr><td>สาขาวิชาเอก</td><td>$major</td></tr>";
                            echo "<tr><td>สถาบัน/มหาวิทยาลัย</td><td>$university</td></tr>";
                            echo "</tbody>";

                            // ส่วนที่ 4: ความสามารถและประสบการณ์
                            echo "<thead class='table-light'><tr><th colspan='2'>ส่วนที่ 4: ความสามารถและประสบการณ์</th></tr></thead>";
                            echo "<tbody>";
                            echo "<tr><td>ความสามารถพิเศษ</td><td>" . nl2br($specialSkills) . "</td></tr>"; // nl2br เพื่อให้ขึ้นบรรทัดใหม่ตามที่ผู้ใช้กรอก
                            echo "<tr><td>ประสบการณ์ทำงาน (สรุป)</td><td>" . nl2br($workExperience) . "</td></tr>";
                            echo "<tr><td>เงินเดือนที่คาดหวัง</td><td>" . ($expectedSalary ? number_format($expectedSalary) . " บาท" : "-") . "</td></tr>";
                            echo "<tr><td>วันที่พร้อมเริ่มงาน</td><td>$startDate</td></tr>";
                            echo "</tbody>";

                            // ส่วนที่ 5: ไฟล์แนบ
                            echo "<thead class='table-light'><tr><th colspan='2'>ส่วนที่ 5: ไฟล์แนบ</th></tr></thead>";
                            echo "<tbody>";
                            echo "<tr><td>Resume/CV</td><td>$resumeStatus</td></tr>";
                            echo "</tbody>";

                            echo "</table>";
                            echo "</div>";

                        } else {
                            // กรณีเข้าถึงหน้านี้โดยตรง (ไม่ได้ผ่านการ Submit Form)
                            echo "<div class='alert alert-warning' role='alert'>กรุณากรอกใบสมัครจากหน้าฟอร์มสมัครงานก่อนการส่งข้อมูล</div>";
                        }
                        ?>

                    </div>
                    <div class="card-footer text-center">
                        <a href="application_form.html" class="btn btn-outline-secondary">กลับไปที่หน้าฟอร์ม</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>