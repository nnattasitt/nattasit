<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>66010910979 ณัฐสิทธิ์ พุฒธรรม (ปอนด์)</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f7f6; padding: 20px; color: #333; }
        .container { max-width: 900px; margin: auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { text-align: center; color: #2c3e50; margin-bottom: 30px; }
        .chart-container { display: flex; gap: 20px; margin-bottom: 40px; flex-wrap: wrap; }
        .chart-box { flex: 1; min-width: 300px; height: 350px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; }
        th { background-color: #3498db; color: white; padding: 12px; }
        td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
    </style>
</head>

<body>

<div class="container">
    <h1>สรุปยอดขายรายประเทศ - ณัฐสิทธิ์ (ปอนด์)</h1>

    <div class="chart-container">
        <div class="chart-box">
            <canvas id="barChart"></canvas>
        </div>
        <div class="chart-box">
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    <table border="0">
        <thead>
            <tr>
                <th>ประเทศ</th>
                <th>ยอดขาย (บาท)</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include_once("connectdb.php");
        $sql = "SELECT `p_country`, SUM(`p_amount`) AS total FROM `popsupermarket` GROUP BY `p_country` ORDER BY total DESC";
        $rs = mysqli_query($conn, $sql);
        
        $countries = [];
        $sales = [];

        while($data = mysqli_fetch_array($rs)) {
            $countries[] = $data['p_country'];
            $sales[] = $data['total'];
        ?>
            <tr>
                <td><?php echo $data['p_country'];?></td>
                <td align="right"><strong><?php echo number_format($data['total'], 0);?></strong></td>
            </tr>
        <?php 
        } 
        mysqli_close($conn);
        ?>
        </tbody>
    </table>
</div>

<script>
    // เตรียมข้อมูลจาก PHP สำหรับ JavaScript
    const labels = <?php echo json_encode($countries); ?>;
    const dataSales = <?php echo json_encode($sales); ?>;

    const chartColors = [
        'rgba(54, 162, 235, 0.7)',
        'rgba(255, 99, 132, 0.7)',
        'rgba(255, 206, 86, 0.7)',
        'rgba(75, 192, 192, 0.7)',
        'rgba(153, 102, 255, 0.7)',
        'rgba(255, 159, 64, 0.7)'
    ];

    // สร้าง Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ยอดขายรายประเทศ',
                data: dataSales,
                backgroundColor: chartColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });

    // สร้าง Pie Chart
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: dataSales,
                backgroundColor: chartColors
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>

</body>
</html>