<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลพนักงาน</title>
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
        form {
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
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-top: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #d85f1b; /* Updated color */
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #a73e06; /* Darker shade for hover */
        }
        a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #d85f1b; /* Updated color */
            margin-top: 20px;
        }
        a:hover {
            text-decoration: underline;
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
            <h3>แก้ไขข้อมูลพนักงาน</h3>
            <form action="employeeupdate.php" method="post">
                <input type="hidden" name="employee_id" value="<?php echo $row_data['employee_id']; ?>">
                <label for="employee_name">ชื่อพนักงาน:</label>
                <input type="text" name="employee_name" value="<?php echo $row_data['employee_name']; ?>"><br>
                <label for="employee_address">ที่อยู่:</label>
                <input type="text" name="employee_address" value="<?php echo $row_data['employee_address']; ?>"><br>
                <label for="employee_phone">เบอร์โทร:</label>
                <input type="text" name="employee_phone" value="<?php echo $row_data['employee_phone']; ?>"><br>
                <input type="submit" name="submit" value="บันทึกข้อมูล">
            </form>
            <br><a href="employee.php">กลับ</a>
        </center>
<?php
    } else {
        echo "ไม่พบข้อมูลพนักงานที่ต้องการแก้ไข";
    }
} else {
    echo "ไม่พบพารามิเตอร์ employee_id";
}
mysqli_close($conn);
?>
</body>
</html>
