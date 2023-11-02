<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
header("location: loginGaya.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Welcome</title>
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
<style type="text/css">
body{
font: 14px sans-serif; text-align: center;
margin-top: 100px;
background-color: #ccc;
}
</style>
</head>
<body>
<div class="container-fluid padding">
<a href="logout.php" class="btn btn-danger">Log Out or Sign Out</a>
</div>
<br><br>
<div class="page-header">
<h4>Assalamu'alaikum warahmatullahi wabarakatuh... ,</h4>
<h2>
<font color="#1a63c6"><b><?php echo
htmlspecialchars($_SESSION['username']); ?></b></font>
</h2> <br>
<h3>
Selamat Datang di App Mapel PWPB-2:)<br>
</h3>
<br>
<a href="read_pesan.php" class="btn btn-success">Pesan Hotel</a>
<a href="index_fasilitas.php" class="btn btn-primary">Fasilitas</a>
</div>
<br>
</body>
</html>