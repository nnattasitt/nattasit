<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>66010910979 ณัฐสิทธิ์ พุฒธรรม (ปอนด์)</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">66010910979 ณัฐสิทธิ์ พุฒธรรม (ปอนด์)</h4>
        </div>
        <div class="card-body">
            
            <form method="post" action="" class="row g-3 mb-4">
                <div class="col-auto">
                    <input type="text" name="a" class="form-control" placeholder="คำค้นหา..." autofocus>
                </div>
                <div class="col-auto">
                    <button type="submit" name="Submit" class="btn btn-success">ค้นหาข้อมูล</button>
                </div>
            </form>

            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-hover border">
                    <thead class="table-dark">
                        <tr>
                            <th>Order ID</th>
                            <th>ชื่อสินค้า</th>
                            <th>ประเภทสินค้า</th>
                            <th>วันที่</th>
                            <th>ประเทศ</th>
                            <th>จำนวนเงิน</th>
                            <th>รูปภาพ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include_once("connectdb.php");
                    @$kw = $_POST['a'];
                    
                    $sql = "SELECT * FROM `popsupermarket` 
                            WHERE p_country LIKE '%{$kw}%' 
                            OR p_product_name LIKE '%{$kw}%' 
                            OR p_category LIKE '%{$kw}%'";
                    
                    $rs = mysqli_query($conn, $sql);
                    $total = 0;
                    
                    while($data = @mysqli_fetch_array($rs)) {
                        $total += $data['p_amount'];
                    ?>
                        <tr>
                            <td><?php echo $data['p_order_id'];?></td>
                            <td><?php echo $data['p_product_name'];?></td>
                            <td><span class="badge bg-info text-dark"><?php echo $data['p_category'];?></span></td>
                            <td><?php echo $data['p_date'];?></td>
                            <td><?php echo $data['p_country'];?></td>
                            <td class="text-end"><?php echo number_format($data['p_amount'], 2);?></td>
                            <td class="text-center">
                                <img src="images/<?php echo $data['p_product_name'];?>.jpg" 
                                     width="50" class="img-thumbnail" 
                                     onerror="this.src='https://via.placeholder.com/50?text=No+Img'">
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th colspan="5" class="text-end">ยอดรวมทั้งสิ้น:</th>
                            <th class="text-end text-primary"><?php echo number_format($total, 2);?></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/th.json" // เมนูภาษาไทย
                },
                "pageLength": 10
            });
        });
    </script>

    <?php mysqli_close($conn); ?>
</body>
</html>