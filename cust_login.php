<?php
	require 'includes/common.php';
	if(isset($_SESSION["pan"]))
    {
        session_unset();
        session_destroy();
    }
	if (isset($_POST['submit']) && !empty($_POST['submit'])) {
		$pan = mysqli_real_escape_string($conn,$_POST['pan']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$safe_pass = md5($password);
		$fetch = "select customer.cin from customer join cust_credentials c on customer.cin=c.cin where customer.pan = '$pan'";
		$check = mysqli_query($conn,$fetch) or die(mysqli_error($conn));
		if(mysqli_num_rows($check) == 0)
		{
			die("User Not Found,Please Contact Admin");
		}
		else
		{
			$fetch = "select customer.cin from customer join cust_credentials c on customer.cin=c.cin where customer.pan = '$pan' and c.password='$safe_pass'";
			$check = mysqli_query($conn,$fetch) or die(mysqli_error($conn));
			if(mysqli_num_rows($check) == 0)
			{
				// die("Incorrect Password");
				echo '<script>alert("Incorrect Password, Please try again");window.location = history.back();</script>';
			}
			$row = mysqli_fetch_array($check);
			if(!isset($_SESSION['pan'])){
				$_SESSION['pan'] = $pan;
				$_SESSION['cin'] =  $row['cin'];
			}
			header("location:customer_dashboard.php");
			}
		}								
	
?>

<!DOCTYPE html>
<html>
    <head>
	<title>Login|DBMS Bank</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/styles.css">
</head>

<body style="background-color:  #2a2b3d;">
<nav class="navbar position-sticky top-0 left-0 navbar-expand-md">
        <div class="container-fluid mx-2">
            <div class="navbar-header">
                <i data-show="show-side-navigation1" class="show-side-btn fa-fw text-white "></i>
                <a class="navbar-brand" href="admin_dashboard.php">DBMS<span class="main-color">Bank</span></a>
            </div>
        </div>
		<div class="container-fluid" style="margin-right: -1060px;">
            <div class="navbar-header">
				<a type="submit" href="index.php" class="btn login_btn">Employee Login</a>
			</div>
        </div>
    </nav>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="https://www.pngitem.com/pimgs/m/531-5313435_bank-png-free-download-vector-bank-logo-png.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="pan" class="form-control input_user" value="" placeholder="PAN" required  readonly onfocus="this.removeAttribute('readonly');">
						</div>

						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="Password" required  readonly onfocus="this.removeAttribute('readonly');">
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<!-- <input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label> -->
							</div>
						</div>

						<div class="d-flex justify-content-center mt-3 login_container">
				 	        <input type="submit" name="submit" value="Login" class="btn login_btn"></input>
				        </div>

					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>