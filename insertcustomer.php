<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูลลูกค้า</title>
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

    function getTypeSelect($conn)
    {
        echo '<option value="">เลือกประเภทลูกค้า</option>';
        echo '<option value="ทั่วไป">ทั่วไป</option>';
        echo '<option value="สมาชิก">สมาชิก</option>';
    }

    ?>
    <form enctype="multipart/form-data" name="save" method="post" action="customerinsert.php">
        <table>
            <tr>
                <th colspan="2">เพิ่มข้อมูลลูกค้า</th>
            </tr>
            <tr>
                <td>รหัสลูกค้า :</td>
                <td><input type="text" name="customer_id" size="50" maxlength="10"></td>
            </tr>
            <tr>
                <td>ชื่อ :</td>
                <td><input type="text" name="customer_name" size="50" maxlength="20"></td>
            </tr>
            <tr>
                <td>ที่อยู่ :</td>
                <td><input type="text" name="customer_address" size="50" maxlength="50"></td>
            </tr>
            <tr>
                <td>เบอร์โทร :</td>
                <td><input type="text" name="customer_phone" size="50" maxlength="10"></td>
            </tr>
            <tr>
                <td>ประเภทลูกค้า :</td>
                <td>
                    <select name="customer_type">
                        <?php getTypeSelect($conn); ?>
                    </select>
                </td>
            </tr>
        </table>
        <center>
            <input type="submit" name="submit" value="บันทึกข้อมูล">
            <input type="reset" name="reset" value="ยกเลิก">
        </center>
    </form>
    <a href="customer.php">กลับหน้าลูกค้า</a>
</body>
</html>
