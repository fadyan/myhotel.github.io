<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
require_once 'config.php';
$sql = "DELETE FROM pemesanan WHERE id = :id";
if($stmt = $pdo->prepare($sql)){
$stmt->bindParam(':id', $param_id);
$param_id = trim($_POST["id"]);
if($stmt->execute()){
header("location: read_pesan.php");
exit;
} else{
echo "Oops! Something went wrong. Please try again later.";
}
}
unset($stmt);
unset($pdo);
} else{
if(empty(trim($_GET["id"]))){
header("location: read_pesan.php");
exit();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Delete Record</title>
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
.wrapper{
width: 500px;
margin: 0 auto;
}
</style>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header mt-5">
<h3><b><font color="green">Konfirmasi Delete Data
Pesan</h3></b></font>
<hr align="left" width="100%">
</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
method="post">
<div>
<input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
<p>Apakah anda ingin meng_delete data ini ? </p><br>
<p>
<input type="submit" value="Ya" class="btn btn-danger">
<a href="read_pesan.php" class="btn btn-primary">Tidak</a>
</p>
</div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>