<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mali:wght@700&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: "Mali", cursive;
            font-weight: 700;
            font-style: normal;
            
            background-color: #ffffff;
    
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background: linear-gradient(to bottom right, #ffffff, #f0f0f0);
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #d85f1b; /* Changed color to #d85f1b */
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 15px;
        }

        a {
            display: block;
            padding: 15px 20px;
            background: linear-gradient(to bottom, #f08080, #ff6969);
            color: #ffffff;
            text-decoration: none;
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s ease;
        }

        a:hover {
            background: linear-gradient(to bottom,  #f0800f, #ff700f);
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐮 cowwoc 🐄</h1>
        <ul>
            <li><a href="cow.php">cow</a></li>
            <li><a href="customer.php">customer</a></li>
            <li><a href="employee.php">employee</a></li>
            <li><a href="bill.php">bill</a></li>
        </ul>
    </div>
</body>
</html>