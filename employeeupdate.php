<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['employee_name'];
    $employee_address = $_POST['employee_address'];
    $employee_phone = $_POST['employee_phone'];

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "cowcow";
    $conn = mysqli_connect($hostname, $username, $password);
    echo '<center>';
    if (!$conn)
        die("ไม่สามารถติดต่อกับ mySQL ได้");
    mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล cowcow ได้");
    mysqli_query($conn,"set character_set_connection=utf8mb4");
    mysqli_query($conn,"set character_set_client=utf8mb4");
    mysqli_query($conn,"set character_set_results=utf8mb4");
  
    $sql = "UPDATE employee SET employee_name='$employee_name', employee_address='$employee_address', employee_phone='$employee_phone' WHERE employee_id='$employee_id'";
    mysqli_query($conn, $sql) or die("อัปเดตข้อมูลในตาราง cow มีข้อผิดพลาดเกิดขึ้น");

    header("location: employee.php");
    echo '<br><br><a href="employee.php">กลับหน้า bookList1.php</a>';
    mysqli_close($conn);
    echo '</center>';
?>
</body>
</html>
