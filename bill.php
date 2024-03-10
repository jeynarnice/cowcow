<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Management</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mali:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
        
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            font-family: "Mali", cursive;
            font-weight: 700;
            font-style: normal;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #d85f1b; /* Updated color */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #d85f1b; /* Updated color */
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #a73e06; /* Darker shade for hover */
        }
    </style>
</head>
<body>
<div class="container">
    <h3>รายการขาย</h3>
    <center>
    <a class="btn" href="insertbill.php">เพิ่มรายการขาย</a></br></br></br>
    <table>
        <tr>
            <th>ลำดับ</th>
            <th>รหัสรายการขาย</th>
            <th>รหัสลูกค้า</th>
            <th>รหัสพนักงาน</th>
            <th>เลขล็อต</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>
        <?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbName = "cowcow";
        $conn = mysqli_connect($hostname, $username, $password, $dbName);
        if (!$conn) {
            die("ไม่สามารถติดต่อกับ MySQL ได้: " . mysqli_connect_error());
        }

        mysqli_set_charset($conn, "utf8mb4");

        $sql = "SELECT * FROM bill";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
        }

        $row = 1;
        while ($row_data = mysqli_fetch_assoc($result)) {
            echo '<tr align="center">';
            echo '<td>'.$row.'</td>';
            echo '<td>'.$row_data['bill_id'].'</td>';
            echo '<td>'.$row_data['customer_id'].'</td>';
            echo '<td>'.$row_data['employee_id'].'</td>';
            echo '<td>'.$row_data['lot_num'].'</td>';
            echo '<td><a href="updatebill.php?bill_id='.$row_data['bill_id'].'">แก้ไข</a></td>';
            echo '<td><a href="billdelete.php?bill_id='.$row_data['bill_id'].'" onclick="return confirm(\'ยืนยันการลบ\')">ลบ</a></td>';
            echo '</tr>';
            $row++;
        }

        mysqli_close($conn);
        ?>
    </table>
    <center>
    <br><br><a href="join.php">รายการขายเพิ่มเติม</a>
    <br><br><a href="home.php">Back to menu</a>
</div>
</body>
</html>
