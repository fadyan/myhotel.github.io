<?php
// Include config file
require_once 'config.php';
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
// Check if username is empty
if(empty(trim($_POST["username"]))){
$username_err = 'Please enter username.';
} else{
$username = trim($_POST["username"]);
}
// Check if password is empty
if(empty(trim($_POST['password']))){
$password_err = 'Please enter your password.';
} else{
$password = trim($_POST['password']);
}
// Validate credentials
if(empty($username_err) && empty($password_err)){
// Prepare a select statement
$sql = "SELECT username, password FROM user WHERE username = :username";
if($stmt = $pdo->prepare($sql)){
// Bind variables to the prepared statement as parameters
$stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
// Set parameters
$param_username = trim($_POST["username"]);
// Attempt to execute the prepared statement
if($stmt->execute()){
// Check if username exists, if yes then verify password
if($stmt->rowCount() == 1){
if($row = $stmt->fetch()){
$hashed_password = $row['password'];
if(password_verify($password, $hashed_password)){
/* Password is correct */
session_start();
$_SESSION['username'] = $username;
header("location: welcome.php");
// header("location: index_alat.php");
} else{
// Display an error message if password is not valid
$password_err = 'password anda salah.';
}
}
} else{
// Display an error message if username doesn't exist
$username_err = 'anda belum memiliki username.';
}
} else{
echo "Oops! ada yang salah. harap coba lagi.";
}
}
// Close statement
unset($stmt);
}
// Close connection
unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="Gaya/images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="Gaya/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="Gaya/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="Gaya/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="Gaya/vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="Gaya/vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="Gaya/vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="Gaya/css/util.css">
	<link rel="stylesheet" type="text/css" href="Gaya/css/main.css">

</head>

<body style="background-image: url('Gaya/images/img-01.jpg');">
	
	 <div class="limiter"> 
	 	<!-- <div class="container-login100-form-btn" style="background-image: url('/images/img-01.png');"> -->
			<div class="container-login100-form-btn">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form class="login100-form validate-form"action="loginGaya.php" method="post">
					<div class="login100-form-avatar">
						<img src="Gaya/images/photo1.jpg" height="images:100%" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						M.Fadli Idrus
					</span>

					<div class="wrap-input100 validate-input m-b-10 <?php echo (!empty($username_err)) ? 'has-error':'' ; ?>" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
						<span class="focus-input100"><?php echo $username_err;?></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10<?php echo (!empty($password_err))? 'has-error' : '';?> " data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"><?php echo $password_err; ?></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button  type="submit" class="login100-form-btn">
							Login
						</button>
                    </div>
					<div class="text-center w-full">
					    	<a class="txt1" href="registerGaya.php">
						    	Register / Create new account
						    	<i class="fa fa-long-arrow-right"></i>						
						    </a>
					    </div>
             

<script src="Gaya/vendor/bootstrap/js/popper.js"></script>
<script src="Gaya/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="Gaya/vendor/select2/select2.min.js"></script>

<script src="Gaya/js/main.js"></script>
</body>
</html>