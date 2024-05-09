<?php
	require_once("../../models/database.php");
	require_once('../../models/cart.php');
	session_start();

	$db=new  database;

	$db->openConnection();
	
	if(isset($_POST['submit']))
	{	
		$fname = $_POST['first_name'];
		$fname = stripslashes($fname);
		$fname = addslashes($fname);

		$lname = $_POST['last_name'];
		$lname = stripslashes($lname);
		$lname = addslashes($lname);
		
		$username = $_POST['username'];
		$username = stripslashes($username);
		$username = addslashes($username);

		$email = $_POST['email'];
		$email = stripslashes($email);
		$email = addslashes($email);

		$password = $_POST['password'];
		$password = stripslashes($password);
		$password = addslashes($password);

		$phone = $_POST['phone'];
		$phone = stripslashes($phone);
		$phone = addslashes($phone);

		$address = $_POST['address'];
		$address = stripslashes($address);
		$address = addslashes($address);
		

		$str="SELECT email from user WHERE email='$email'";
		$result=$db->query($str);
		
		if((mysqli_num_rows($result))>0)	
		{
            echo "<center><h3><script>alert('Sorry.. This email is already registered !!');</script></h3></center>";
            header("refresh:0;url=login.php");
        }
		else
		{
			// $cart = new cart();
			// $cart->createCart($email);
            $str="insert into user set first_name='$fname',last_name='$lname',username='$username',email='$email',password='$password',phone='$phone',address='$address'";
			if(($db->query($str)))	
			echo "<center><h3><script>alert('Congrats.. You have successfully registered !!');</script></h3></center>";
			header('location: login.php');
		}

		
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Register</title>
		<link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    	<script type="text/javascript" src="../bootstrap-5.3.3-dist/js/bootstrap.min.js"> </script>
		<link rel="stylesheet" href="../bootstrap-icons/font/bootstrap-icons.min.css">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="../css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<center> <h5 style="font-family: Noto Sans;">Register to </h5><h4 style="font-family: Noto Sans;">jomعa store</h4></center><br>
							<form method="post" action="register.php" enctype="multipart/form-data">
								
								<div class="form-group">
									<label>First name:</label>
									<input type="text" name="first_name" class="form-control" placeholder="Enter Your First name" required/>
								</div>
								<div class="form-group">
									<label>Last name:</label>
									<input type="text" name="last_name" class="form-control" placeholder="Enter Your Last name" required />
								</div>
                <div class="form-group">
									<label>Enter Your Username:</label>
									<input type="text" name="username" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Enter Your Email:</label>
									<input type="email" name="email" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Enter Your Password:</label>
									<input type="password" name="password" class="form-control" required />
                                </div>
								<div class="form-group">
									<label>Enter Your Phone:</label>
									<input type="text" name="phone" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Enter Your address:</label>
									<input type="text" name="address" class="form-control" required />
								</div>
                                
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Register</button>
								</div>
								<div class="form-group text-center">
									<span class="text-muted">Already have an account! </span> <a href="login.php">Login </a> Here..
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>