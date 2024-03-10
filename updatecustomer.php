<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลลูกค้า</title>
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
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"],
        input[type="reset"] {
            background-color: #d85f1b; /* Updated color */
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #a73e06; /* Darker shade for hover */
        }
        a {
            text-decoration: none;
            color: #d85f1b; /* Updated color */
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            margin-top: 20px;
            text-align: center;
        }
        a:hover {
            text-decoration: underline;
            background-color: #a73e06; /* Darker shade for hover */
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #d85f1b; /* Updated color */
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 20px;
            text-align: center;
        }
        .btn:hover {
            background-color: #a73e06; /* Darker shade for hover */
        }
    </style>
</head>
<body><center>
<div class="container">
    <h3>แก้ไขข้อมูลลูกค้า</h3>
    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "cowcow";
    $conn = mysqli_connect($hostname, $username, $password, $dbName);
    if (!$conn)
        die("ไม่สามารถติดต่อกับ mySQL ได้");

    mysqli_set_charset($conn, "utf8mb4");

    function getTypeSelect($conn)
    {
        echo '<option value="">เลือกประเภทลูกค้า</option>';
        echo '<option value="ทั่วไป">ทั่วไป</option>';
        echo '<option value="สมาชิก">สมาชิก</option>';
    }

    if(isset($_GET['customer_id'])) {
        $customer_id = $_GET['customer_id'];

        $sql = "SELECT * FROM customer WHERE customer_id='$customer_id'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("เกิดข้อผิดพลาดในการดึงข้อมูล: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $row_data = mysqli_fetch_assoc($result);
            ?>
            <form action="customerupdate.php" method="post">
                <input type="hidden" name="customer_id" value="<?php echo $row_data['customer_id']; ?>">
                <label for="customer_name">ชื่อลูกค้า:</label>
                <input type="text" name="customer_name" value="<?php echo $row_data['customer_name']; ?>"><br><br>
                <label for="customer_address">ที่อยู่:</label>
                <input type="text" name="customer_address" value="<?php echo $row_data['customer_address']; ?>"><br><br>
                <label for="customer_phone">เบอร์โทร:</label>
                <input type="text" name="customer_phone" value="<?php echo $row_data['customer_phone']; ?>"><br><br>
                <label for="customer_type">ประเภท:</label>
                <select name="customer_type">
                    <?php getTypeSelect($conn); ?>
                </select><br><br>
                <input type="submit" name="submit" value="บันทึกข้อมูล" class="btn">
            </form>
            <?php
        } else {
            echo "ไม่พบข้อมูลลูกค้าที่ต้องการแก้ไข";
        }
    } else {
        echo "ไม่พบพารามิเตอร์ customer_id";
    }
    mysqli_close($conn);
    ?>
    <a href="customer.php">กลับหน้าลูกค้า</a>
</div>
</body>
</html>
