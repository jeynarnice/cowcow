<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลวัว</title>
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

    if(isset($_GET['employee_id'])) {
        $employee_id = $_GET['employee_id'];

        $sql = "SELECT * FROM employee WHERE employee_id='$employee_id'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $row_data = mysqli_fetch_assoc($result);
    ?>
            <center>
                <h3>แก้ไขemployee</h3>
                <form action="employeeupdate.php" method="post">
                    <input type="hidden" name="employee_id" value="<?php echo $row_data['employee_id']; ?>">
                    <label for="employee_name">ชื่อพนักงาน:</label>
                    <input type="text" name="employee_name" value="<?php echo $row_data['employee_name']; ?>"><br><br>
                    <label for="employee_address">ที่อยู่:</label>
                    <input type="text" name="employee_address" value="<?php echo $row_data['employee_address']; ?>"><br><br>
                    <label for="employee_phone">เบอร์โทร:</label>
                    <input type="text" name="employee_phone" value="<?php echo $row_data['employee_phone']; ?>"><br><br>
                    <input type="submit" name="submit" value="บันทึกข้อมูล"style="cursor:hand;">
                </form>
                <br><br><a href="employee.php">กลับ</a>
            </center>
    <?php
        } else {
            echo "ไม่พบข้อมูลวัวที่ต้องการแก้ไข";
        }
    } else {
        echo "ไม่พบพารามิเตอร์ lot_num";
    }
    mysqli_close($conn);
    ?>
</body>
</html>
