<?php
// Include config file
require_once 'config.php';
// Define variables and initialize with empty values
$kodefasilitas = $namafasilitas = $harga = $deskripsi = "";
$kodefasilitas_err = $namafasilitas_err = $harga_err = $deskripsi_err = "";

if(isset($_POST["id"]) && !empty($_POST["id"])){
// Get hidden input value
$id = $_POST["id"];

// Validate nama fasilitas
$input_namafasilitas = trim($_POST["namafasilitas"]);
if(empty($input_namafasilitas)){
$namafasilitas_err = "Please enter a namafasilitas.";
// } elseif(!filter_var(trim($_POST["namafasilitas"]), FILTER_VALIDATE_REGEXP, 
// array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
$namafasilitas_err = 'Please enter a valid namafasilitas.';
} else{
$namafasilitas = $input_namafasilitas;
} 

// Validate kodefasilitas
$input_kodefasilitas = trim($_POST["kodefasilitas"]);
if(empty($input_kodefasilitas)){
$kodefasilitas_err = 'Please enter kodefasilitas.';
} else{
$kodefasilitas = $input_kodefasilitas;
}

// Validate harga
$input_harga = trim($_POST["harga"]);
if(empty($input_harga)){
$harga_err = 'Please enter harga.';
} else{
$harga = $input_harga;
}

// Validate deskripsi
$input_deskripsi = trim($_POST["deskripsi"]);
if(empty($input_deskripsi)){
$deskripsi_err = 'Please enter deskripsi.';
} else{
$deskripsi = $input_deskripsi;
}

// Check input errors before inserting in database
if(empty($kodefasilitas_err) && empty($namafasilitas_err) && empty($harga_err) && empty($deskripsi_err) && empty($photo_err)){

// Prepare an insert statement
$sql = "UPDATE fasilitas SET id=:id, kodefasilitas=:kodefasilitas, namafasilitas=:namafasilitas, harga=:harga, deskripsi=:deskripsi WHERE id=:id";

if($stmt = $pdo->prepare($sql)){

// Bind variables to the prepared statement as parameters
$stmt->bindParam(':id', $param_id);
$stmt->bindParam(':kodefasilitas', $param_kodefasilitas);
$stmt->bindParam(':namafasilitas', $param_namafasilitas);
$stmt->bindParam(':harga', $param_harga);
$stmt->bindParam(':deskripsi', $param_deskripsi);
// $stmt->bindParam(':photo', $param_photo);

// Set parameters
$param_id = $id;
$param_kodefasilitas = $kodefasilitas;
$param_namafasilitas = $namafasilitas;
$param_harga= $harga;
$param_deskripsi = $deskripsi;
// $param_photo = $photo;

// Attempt to execute the prepared statement
if($stmt->execute()){

// Records updated succesfully. Redirect to landing page
header("location: index_fasilitas.php");
exit();
} else{
echo "Something went wrong. Please try again later.";
}
}
// Close statement
unset($stmt);
}
// Close connection
unset($pdo);
} else{
// Check existance of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

// Get URL parameter
$id = trim($_GET["id"]);

// Prepare a select statement
$sql = "SELECT * FROM fasilitas WHERE id = :id";
if($stmt = $pdo->prepare($sql)){

// Bind variables to the prepared statement as parameters
$stmt->bindParam(':id', $param_id);

// Set parameters
$param_id = $id;

// Attempt to execute the prepared statement
if($stmt->execute()){
if($stmt->rowCount() == 1){

/* Fetch result row as an associative array. Since the result set 
contains only one row, we don't need to use while loop */

$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Retrieve individual field value
$id = $row["id"];
$kodefasilitas = $row["kodefasilitas"];
$namafasilitas= $row["namafasilitas"];
$harga= $row["harga"];
$deskripsi = $row["deskripsi"];
// $photo = $row["photo"];
} else{

// URL doesn't contain valid id. Redirect to error page
header("location: error_fasilitas.php");
exit();
}
} else{
echo "Oops! Something went wrong. Please try again later.";
}
}
// Close statement
unset($stmt);
// Close connection
unset($pdo);
} else{
// URL doesn't contain id parameter. Redirect to error page
header("location: error_fasilitas.php");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update Data Project</title>
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
<style type="text/css">
	.wrapper{
		width: 500px;
		margin: 0 auto;
	}
</style>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
<h2><b><font color="green">Update Data Fasilitas</h2></b></font>
</div>
<p>Harap edit pesan yang dalam form lalu <b>Submit</b></p>
<hr align="left" width="100%">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<div class="mb-3 <?php echo (!empty($kodefasilitas_err)) ? 'has-error' : ''; ?>">
<label><b>Kode Fasilitas</label></b>
<input type="text" name="kodefasilitas" class="form-control" value="<?php echo $kodefasilitas; ?>">
<span class="help-block"><?php echo $kodefasilitas_err;?></span>
</div>

<div class="mb-3 <?php echo (!empty($namafasilitas_err)) ? 'has-error' : ''; ?>">
<label><b>Nama Fasiliats</label></b>
<input type="text" name="namafasilitas" class="form-control" value="<?php echo $namafasilitas; ?>">
<span class="help-block"><?php echo $namafasilitas_err;?></span>
</div>

<div class="mb-3 <?php echo (!empty($harga_err)) ? 'has-error' : ''; ?>">
<label><b>Harga</label></b>
<input type="text" name="harga" class="form-control" value="<?php echo $harga; ?>">
<span class="help-block"><?php echo $harga_err;?></span>
</div>

<div class="mb-3 <?php echo (!empty($deskripsi_err)) ? 'has-error' : ''; ?>">
<label><b>Desripsi</label></b>
<input type="text" name="deskripsi" class="form-control" value="<?php echo $deskripsi; ?>">
<span class="help-block"><?php echo $deskripsi_err;?></span>
</div>

<!-- <div clas="mb-3 <?php echo (!empty($photo_err)) ? 'has-error' : ''; ?>"> -->
<div>
<label><b>Photo</label></b><br>
    <?php
        // include config file
        require_once 'config.php';

        // Attempt select query execution
        $sql = "SELECT * FROM fasilitas";

        echo "<img src='gambar/" .$row['photo'] ."'width='80' height='110'>"

    ?>

</div>
<br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" class="btn btn-primary" value="edit">
<a href="index_fasilitas.php" class="btn btn-info">Cancel</a>
</form>
</div>
</div>
</div>
</div>

</body>
</html>