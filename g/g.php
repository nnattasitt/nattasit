<?php
include_once("connectdb.php");

// ดึงข้อมูลเตรียมไว้สำหรับทั้งตารางและกราฟ
$sql = "SELECT 
            MONTH(p_date) AS m_num, 
            MONTHNAME(p_date) AS m_name, 
            SUM(p_amount) AS Total_Sales
        FROM popsupermarket
        GROUP BY MONTH(p_date)
        ORDER BY m_num ASC";

$result = mysqli_query($conn, $sql);

$labels = [];
$salesData = [];
$tableData = [];

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['m_name']; // ชื่อเดือนสำหรับกราฟ
    $salesData[] = $row['Total_Sales']; // ยอดขายสำหรับกราฟ
    $tableData[] = $row; // เก็บไว้แสดงในตาราง
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>Dashboard - ณัฐสิทธิ์ พุฒธรรม</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Sarabun', sans-serif; background: #f4f7f6; padding: 20px; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .chart-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: center; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .chart-container { position: relative; height: 300px; }
    </style>
</head>
<body>

<div class="container">
    <h2>รายงานยอดขายรายเดือน: ณัฐสิทธิ์ พุฒธรรม</h2>

    <div class="chart-grid">
        <div class="chart-container">
            <canvas id="barChart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="donutChart"></canvas>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>เดือน</th>
                <th>ยอดขาย (บาท)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tableData as $row): ?>
            <tr>
                <td><?php echo $row['m_name']; ?></td>
                <td align="right"><?php echo number_format($row['Total_Sales'], 2); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    const labels = <?php echo json_encode($labels); ?>;
    const dataValues = <?php echo json_encode($salesData); ?>;
    const colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'];

    // Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดขายรายเดือน',
                data: dataValues,
                backgroundColor: '#36A2EB'
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });

    // Donut Chart
    new Chart(document.getElementById('donutChart'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: dataValues,
                backgroundColor: colors
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
</script>

</body>
</html>