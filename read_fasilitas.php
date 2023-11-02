<?php 
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){ 
require_once 'config.php'; 
$sql = "SELECT * FROM fasilitas  WHERE id = :id"; 
if($stmt = $pdo->prepare($sql)){ 
$stmt->bindParam(':id', $param_kodefasilitas); 
$param_kodefasilitas = trim($_GET["id"]); 
if($stmt->execute()){ 
    if($stmt->rowcount() ==1){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $kodefasilitas = $row["kodefasilitas"];
        $namafasilitas = $row["namafasilitas"];
        $harga = $row["harga"];
        $deskripsi = $row["deskripsi"];
        $photo = $row["photo"];

        // $photo =<img src='image/" .$row['photo'] ."'width='40' height='60'>;
    }else{
        header("location: error_fasilitas.php");
        exit();
    }
}else{
    echo "oops! something when wrong.please try again later.";
}
}
unset($stmt);

unset($pdo);
}else{
    header("location: error_fasilitas.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>view Fasilitas</title>
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
    .wrapper{
        width: 500px;
        margin: 0 auto;
    }
</style>
</head>
<body>
        <div class="wrapper">
            <div class="container_fluid">
                <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1><b><font color="green"> profil project</h1></font></b>
                        <hr align="left" width="100%">
                    </div>

                    <div class="from-group">
                        <label>prototype</label>
                        <p class="from-control-static">
                            <b>
                                <img src='gambar/<?php echo $row["photo"]; ?>' width='200' height='200' style="border-radius:15px 15px 15px 15px;">
</b>
</p>   
                </div>
                
                <div>
                    <div class="from-group">
                        <label><b>Kode Fasilitas</b></label>
                        <h5><?php echo $row["kodefasilitas"]; ?></h5>
</div>
<div class="from-group">
                        <label><b>Nama Fasilitas</b></label>
                        <h5><?php echo $row["namafasilitas"]; ?></h5>
</div>
<div class="from-group">
                        <label><b>Harga</b></label>
                        <h5><?php echo $row["harga"]; ?></h5>
</div>
<div class="from-group">
                        <label><b>Deskripsi</b></label>
                        <h5><?php echo $row["deskripsi"]; ?></h5><br>
     
                    </div>
                    <p><a href="index_fasilitas.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
        </div>
</body>
</html>