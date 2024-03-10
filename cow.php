<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cow</title>
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
        h1 {
            text-align: center;
            color: #d85f1b; /* Updated color */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: #d85f1b; /* Updated color */
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #d85f1b; /* Updated color */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #a73e06; /* Darker shade for hover */
        }
    </style>
</head>
<body>
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

$sql = "SELECT * FROM cow";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
}

echo '<div class="container">';
echo '<h1>รายการวัว</h1>';
echo '<a class="btn" href="insertcow.php">เพิ่มรายการวัว</a>';
echo '<table>';
echo '<tr>';
echo '<th>ลำดับ</th>';
echo '<th>เลขล็อต</th>';
echo '<th>ปริมาณนม</th>';
echo '<th>เกรด</th>';
echo '<th>ราคาทั่วไป</th>';
echo '<th>ราคาสมาชิก</th>';
echo '<th>แก้ไข</th>';
echo '<th>ลบ</th>';
echo '</tr>';

$row = 1;
while ($row_data = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'.$row.'</td>';
    echo '<td>'.$row_data['lot_num'].'</td>';
    echo '<td>'.$row_data['AmountOfMilk'].'</td>';
    echo '<td>'.$row_data['Quality'].'</td>';
    echo '<td>'.$row_data['Price'].'</td>';
    echo '<td>'.$row_data['Price_mem'].'</td>';
    echo '<td><a href="updatecow.php?lot_num='.$row_data['lot_num'].'">แก้ไข</a></td>';
    echo '<td><a href="cowdelete.php?lot_num='.$row_data['lot_num'].'" onclick="return confirm(\'ยืนยันการลบข้อมูลวัว\')">ลบ</a></td>';
    echo '</tr>';
    $row++;
}

echo '</table>';
mysqli_close($conn);
echo '<br><a href="home.php">Back to home</a>';
echo '</div>';

?>
</body>
</html>
