<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
  		@import url('https://fonts.googleapis.com/css2?family=Mali:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
		* {
		margin: 0px;
		padding: 0px;
		}

		body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            font-family: "Mali", cursive;
            font-weight: 700;
            font-style: normal;
        }

		.header {
		width: 30%;
		margin: 50px auto 0px;
		color: white; /* สีตัวอักษร */
		background: #d85f1b; /* สีพื้นหลัง */
		text-align: center;
		border: 1px solid #B0C4DE;
		border-bottom: none;
		border-radius: 10px 10px 0px 0px;
		padding: 20px;
		}

		form, .content {
		width: 30%;
		margin: 0px auto;
		padding: 20px;
		border: 1px solid #d85f1b;
		background: white; /* สีพื้นหลัง */
		border-radius: 0px 0px 10px 10px;
		}

		.input-group {
		margin: 10px 0px 10px 0px;
		}

		.input-group label {
		display: block;
		text-align: left;
		margin: 3px;
		}

		.input-group input {
		height: 30px;
		width: 93%;
		padding: 5px 10px;
		font-size: 16px;
		border-radius: 5px;
		border: 1px solid gray;
		}

		.btn {
		padding: 10px;
		font-size: 15px;
		color: white; /* สีตัวอักษร */
		background: #d85f1b; /* สีพื้นหลัง */
		border: none;
		border-radius: 5px;
		}

		.error {
		width: 92%;
		margin: 0px auto;
		padding: 10px;
		border: 1px solid #a94442;
		color: #a94442;
		background: #f2dede;
		border-radius: 5px;
		text-align: left;
		}

		.success {
		color: #d85f1b;
		background: #dff0d8;
		border: 1px solid #d85f1b;
		margin-bottom: 20px;
		}

	</style>
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="employee_name" value="<?php echo $employee_name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="employee_email" value="<?php echo $employee_email; ?>">
  	</div>
	  <div class="input-group">
  	  <label>Address</label>
  	  <input type="text" name="employee_address">
  	</div>
	  <div class="input-group">
  	  <label>Phone</label>
  	  <input type="text" name="employee_phone">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="employee_pass_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="employee_pass_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>