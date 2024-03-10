<?php 
  session_start(); 

  if (!isset($_SESSION['employee_name'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['employee_name']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
	<h2>Home Page</h2>
	</div>

<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['employee_name'])) : ?>
    	<p>Welcome <strong></*?php echo $_SESSION['username']; ?*/></strong></p>
    	<center><p> <a href="index.php?logout='1'" style="color: red;">login</a> </p></center>
    <?php endif ?>
</div>

</body>
</html>