<?php
// Include config file
require_once 'config.php';
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if($_SERVER['REQUEST_METHOD'] == "POST"){
// Validate username
if(empty(trim($_POST['username']))){
$username_err = "masukkan username.";
} else{
// Prepare a select statement
$sql = "SELECT id FROM user WHERE username = :username";
if($stmt = $pdo->prepare($sql)){
// Bind variables to the prepared statement as parameters
$stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
// Set parameters
$param_username = trim($_POST['username']);
// Attempt to execute the prepared statement
if($stmt->execute()){
if($stmt->rowCount() == 1){
$username_err = "username ini telah ada.";
} else{
$username = trim($_POST['username']);
}
} else{
echo "Oops! ada yang salah. Harap coba kembali.";
}
} // Close statement
unset($stmt);
}
// Validate password
if(empty(trim($_POST['password']))){
$password_err = "masukkan password.";
} elseif(strlen(trim($_POST['password'])) < 4){
$password_err = "Password minimal 4 karakter.";
} else{
$password = trim($_POST['password']);
}// Validate confirm password
if(empty(trim($_POST['confirm_password']))){
$confirm_password_err = 'Konfirmasi password.';
} else{
$confirm_password = trim($_POST['confirm_password']);
if($password != $confirm_password){
$confirm_password_err = 'Password tidak cocok.';
}
} // Check input errors before inserting in database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
// Prepare an insert statement
$sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
if($stmt = $pdo->prepare($sql)){
// Bind variables to the prepared statement as parameters
$stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
$stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
// Set parameters
$param_username = $username;
// Creates a password hash
$param_password = password_hash($password, PASSWORD_DEFAULT);
// Attempt to execute the prepared statement
if($stmt->execute()){
// Redirect to login page
header("location: loginGaya.php");
}
else
{
echo "Something went wrong. Please try again later.";
}
} // Close statement
unset($stmt);
} // Close connection
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

    <!-- <div class="container-login100" style="background-image: url('Gaya/images/img-01.jpg');"> -->
	<div class="container-login100-form-btn">	
		<div class="wrap-login100 p-t-190 p-b-30">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"method="post">
					<div class="login100-form-avatar">
						<img src="Gaya/images/photo1.jpg." height="images:100%" alt="Logo">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						 M.Fadli Idrus
					</span>

					<div class="wrap-input100 validate-input m-b-10 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Masukkan Username" value="<?php echo $username;?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100" <?php echo $username_err; ?>>
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Masukkan Password" value="<?php echo $password; ?>">
						<span class="focus-input100"<?php echo $password_err; ?>></span>
						<span class="symbol-input100" >
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-10 <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" data-validate = "confirm_Password is required">
						<input class="input100" type="password" name="confirm_password" placeholder="Masukkan Password yang sama" value="<?php echo $confirm_password; ?>">
						<span class="focus-input100"<?php echo $confirm_password_err; ?>></span>
						<span class="symbol-input100" >
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button  type="submit" class="login100-form-btn">
							REGISTER
						</button>
                    </div>
				
					
					<div class="text-center w-full">
					    	<a class="txt1" href="loginGaya.php">
						    	Login / Create new account
						    	<i class="fa fa-long-arrow-right"></i>						
						    </a>
					    </div>
             


				
                  
				</form>
			</div>
		</div>
	</div>

<script src="Gaya/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="Gaya/vendor/bootstrap/js/popper.js"></script>
	<script src="Gaya/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="Gaya/vendor/select2/select2.min.js"></script>

	<script src="Gaya/js/main.js"></script> 
</body>
</html>