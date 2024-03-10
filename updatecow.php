<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลวัว</title>
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
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        input[type="text"],
        select {
            width: calc(100% - 16px); /* Subtract padding and border from width */
            padding: 8px;
            margin-top: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"],
        input[type="reset"] {
            background-color: #d85f1b;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #a73e06;
        }
        a {
            display: block;
            text-align: center;
            text-decoration: none;
            color: #d85f1b;
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

    if(isset($_GET['lot_num'])) {
        $lot_num = $_GET['lot_num'];

        $sql = "SELECT * FROM cow WHERE lot_num='$lot_num'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $row_data = mysqli_fetch_assoc($result);
    ?>
            <center>
                <h3>แก้ไขข้อมูลวัว</h3>
                <form action="cowupdate.php" method="post">
                    <input type="hidden" name="lot_num" value="<?php echo $row_data['lot_num']; ?>">
                    <label for="AmountOfMilk">ปริมาณนม:</label>
                    <input type="text" name="AmountOfMilk" value="<?php echo $row_data['AmountOfMilk']; ?>"><br>
                    <label for="Quality">เกรด:</label>
                    <input type="text" name="Quality" value="<?php echo $row_data['Quality']; ?>"><br>
                    <label for="Price_mem">ราคาสมาชิก:</label>
                    <input type="text" name="Price_mem" value="<?php echo $row_data['Price_mem']; ?>"><br>
                    <label for="Price">ราคาทั่วไป:</label>
                    <input type="text" name="Price" value="<?php echo $row_data['Price']; ?>"><br>
                    <input type="submit" name="submit" value="บันทึกข้อมูล">
                </form>
                <br><a href="cow.php">กลับ</a>
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
