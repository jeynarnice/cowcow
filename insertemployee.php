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
            text-align: left; /* Updated alignment */
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
        input[type="text"],
        input[type="submit"],
        input[type="reset"] {
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
            display: inline-block;
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
    $conn = mysqli_connect($hostname, $username, $password);
    if (!$conn)
        die("ไม่สามารถติดต่อกับ mySQL ได้");
    mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล cowcow ได้");
    mysqli_query($conn, "set character_set_connection=utf8mb4");
    mysqli_query($conn, "set character_set_client=utf8mb4");
    mysqli_query($conn, "set character_set_results=utf8mb4");
?>
    <div class="container">
        <h3>เพิ่มข้อมูลพนักงาน</h3>
        <form enctype="multipart/form-data" name="save" method="post" action="employeeinsert.php">
            <table>
                <tr>
                    <th colspan="2" bgcolor="#f2f2f2">เพิ่มรายการ</th>
                </tr>
                <tr>
                    <td>รหัสพนักงาน :</td>
                    <td><input type="text" name="employee_id" size="50" maxlength="10"></td>
                </tr>
                <tr>
                    <td>ชื่อ :</td>
                    <td><input type="text" name="employee_name" size="50" maxlength="20"></td>
                </tr>
                <tr>
                    <td>ที่อยู่ :</td>
                    <td><input type="text" name="employee_address" size="50" maxlength="50"></td>
                </tr>
                <tr>
                    <td>เบอร์โทร :</td>
                    <td><input type="text" name="employee_phone" size="50" maxlength="10"></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="บันทึกข้อมูล">
            <input type="reset" name="reset" value="ยกเลิก">
        </form>
        <a href="employee.php">กลับหน้าพนักงาน</a>
    </div>
</body>
</html>
