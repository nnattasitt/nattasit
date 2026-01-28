<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>66010910979 ณัฐสิทธิ์ พุฒธรรม (ปอนด์)</title>
</head>

<body>
<h1>66010910979 ณัฐสิทธิ์ พุฒธรรม (ปอนด์)</h1>
<form method="post" action="">
    กรอกคะแนน<input type="number" min="0" max="100" name="a" autofocus required>
    <button type="submit" name="Submit">OK</button>
</form>
<hr>

<?php
if(isset($_POST['Submit'])){
    $score = $_POST['a'];
    if($score >= 80){
        $grade = "A";
    }elseif ($score >= 70){
        $grade = "B";
    }elseif ($score >= 60){
        $grade = "C";
    }elseif ($score >= 50){
        $grade = "D";
    }else{
        $grade = "F";
    }
    echo "<h2>คะแนน $score ได้เกรด $grade</h2>" ; 
}

?>
</body>
</html>
