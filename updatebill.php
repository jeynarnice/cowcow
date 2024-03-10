<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลบิล</title>
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
            max-width: 600px;
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
<body><center>
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

    if(isset($_GET['bill_id'])) {
        $bill_id = $_GET['bill_id'];

        $sql = "SELECT * FROM bill WHERE bill_id='$bill_id'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $row_data = mysqli_fetch_assoc($result);
    ?>
            <h3>แก้ไขข้อมูลบิล</h3>
            <form action="billupdate.php" method="post">
                <input type="hidden" name="bill_id" value="<?php echo $row_data['bill_id']; ?>">
                <label for="customer_id">รหัสลูกค้า:</label>
                <input type="text" name="customer_id" value="<?php echo $row_data['customer_id']; ?>"><br>
                <label for="employee_id">รหัสพนักงานขาย:</label>
                <input type="text" name="employee_id" value="<?php echo $row_data['employee_id']; ?>"><br>
                <label for="lot_num">เลขล็อต:</label>
                <input type="text" name="lot_num" value="<?php echo $row_data['lot_num']; ?>"><br>
                <input type="submit" name="submit" value="บันทึกข้อมูล">
            </form>
            <a href="bill.php">กลับ</a>
    <?php
        } else {
            echo "ไม่พบข้อมูลบิลที่ต้องการแก้ไข";
        }
    } else {
        echo "ไม่พบพารามิเตอร์ bill_id";
    }
    mysqli_close($conn);
    ?>
</body>
</html>
