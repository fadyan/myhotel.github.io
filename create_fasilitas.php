<?php

require_once 'config.php';

$id = $kodefasilitas =$namafasilitas = $harga = $deskripsi  = $photo = "";
$id_err = $kodefasilitas_err =$namafasilitas_err = $harga_err = $deskripsi_err = $photo_err = "";

// Processing form data when form is submitted

    if(isset($_POST["id"]) && !empty($_POST["id"])){  
    // Get hidden input value
    $id = $_POST["id"];

    // validate nama fasilitas
    $input_namafasilitas = trim($_POST["namafasilitas"]);
    if(empty($input_namafasilitas)){
        $namafasilitas_err = "Please enter a namafasilitas.";
    // } elseif(!filter_var(trim($_POST["namafasilitas"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s]+$/")))){
        $namafasilitas_err = 'Please enter a valid namafasilitas';
    } else{
        $namafasilitas = $input_namafasilitas;
    }

    // validate harga
    $input_harga = trim($_POST["harga"]);
    if(empty($input_harga)){
        $harga_err = "Please enter harga.";
    } elseif(!ctype_digit($input_harga)){
        $harga_err = 'Please enter a positive integer value.';
    } else{
        $harga = $input_harga;
    }
    
    // validate deskripsi
    $input_deskripsi = trim($_POST["deskripsi"]);
    if(empty($input_deskripsi)){
        $deskripsi_err = 'Please enter deskripsi.';
    } else{
        $deskripsi = $input_deskripsi;
    }

    // validate kode fasilitas
    $input_kodefasilitas = trim($_POST["kodefasilitas"]);
    if(empty($input_kodefasilitas)){
        $kodefasilitas_errr = "Please enter kodefasilitas.";
    } elseif(!ctype_digit($kodefasilitas)){
        $kodefasilitas_err = 'Please enter a positive integer value.';
    } else{
        $kodefasilitas = $input_kodefasilitas;
    }

    // validate photo
    
    $input_photo = $_FILES["photo"]["name"];
    $tmp_name = $_FILES["photo"]["tmp_name"];

    move_uploaded_file($tmp_name,"gambar/".$input_photo);

    if(empty($input_photo)){
        $photo_err = 'Please enter photo';
    } else{
        $photo = $input_photo;
    }

    // check input error before inserting in database
    if(empty($id_err) && empty($kodefasilitas_err) && empty($namafasilitas_err) && empty($harga_err) && empty($deskripsi_err) && empty($photo_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO fasilitas (id, kodefasilitas, namafasilitas, harga, deskripsi, photo) VALUES (:id, :kodefasilitas, :namafasilitas, :harga, :deskripsi, :photo)";
        if($stmt = $pdo->prepare($sql)){
            
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':id', $param_id);
            $stmt->bindParam(':kodefasilitas', $param_kodefasilitas);
            $stmt->bindParam(':namafasilitas', $param_namafasilitas);
            $stmt->bindParam(':harga', $param_harga);
            $stmt->bindParam(':deskripsi', $param_deskripsi);
            $stmt->bindParam(':photo', $param_photo);

            // Set parameters
            $param_id = $id;
            $param_kodefasilitas = $kodefasilitas;
            $param_namafasilitas = $namafasilitas;
            $param_harga = $harga;
            $param_deskripsi = $deskripsi;
            $param_photo = $photo;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index_fasilitas.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        unset($stmt);
    }
    unset($pdo);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Page Title</title>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="page-header">
              <h2><b><font color="green">Create Data project</h2></b></font>
            </div>
            <p>Harap diisi form dibawah ini lalu <b>Submit.</b></p>
            <hr align="left" width="100%">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            
            <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' :''; ?>">
               <label><b>id</b></label>
               <input placeholder="masukkan angka" type="text" name="id" class="form-control" value="<?php echo $id; ?>">
               <span class="hep-block"><?php echo $id_err; ?></span>
            </div>
        <!--              
            <div class="form-group <?php echo (!empty($kodeproject_err)) ? 'has-error' :''; ?>">
               <label><b>kode project</b></label>
               <input placeholder="masukkan angka 202008xxx" type="text" name="kodeproject" class="form-control" value="<?php echo $kodeproject; ?>">
               <span class="hep-block"><?php echo $kodeproject_err; ?></span>
            </div>
        -->
            <div class="form-group <?php echo (!empty($namafasilitas_err)) ? 'has-error' :''; ?>">
               <label><b>Nama Fasilitas</b></label>
               <input type="text" name="namafasilitas" class="form-control" value="<?php echo $namafasilitas; ?>">
               <span class="hep-block"><?php echo $namafasilitas_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($harga_err)) ? 'has-error' :''; ?>">
               <label><b>harga</b></label>
               <input placeholder="masukkan angka" type="text" name="harga" class="form-control" value="<?php echo $harga; ?>">
               <span class="hep-block"><?php echo $harga_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($deskripsi_err)) ? 'has-error' :''; ?>">
               <label><b>deskripsi</label></b>
               <input type="text" name="deskripsi" class="form-control" value="<?php echo $deskripsi; ?>">
               <span class="hep-block"><?php echo $deskripsi_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($photo_err)) ? 'has-error' :''; ?>">
               <label><b>Photo</label></b>
               <input type="file" name="photo" class="form-control" value="<?php echo $photo; ?>">
               <span class="hep-block"><?php echo $photo_err; ?></span>
            </div>

            <input type="hidden" name="kodefasilitas" value="<?php echo $kodefasilitas; ?>"/>
            <input type="submit" class="btn btn-primary" value="Submit">
            <a href="index_fasilitas.php" class="btn btn-danger">Cancel</a>
</form>
</div>
</div>
</div>
</div>

</body>
</html>