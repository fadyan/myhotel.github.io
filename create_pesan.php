<?php

require_once 'config.php';

$id = $namalengkap =$noktp = $kodefasilitas = $namafasilitas  = $email  = $telepon = $pesan = "";
$id_err = $namalengkap_err =$noktp_err = $kodefasilitas_err = $namafasilitas_err = $email_err = $telepon_err = $pesan_err = "";

// Processing form data when form is submitted

    if(isset($_POST["id"]) && !empty($_POST["id"])){  
    // Get hidden input value
    $id = $_POST["id"];

    // validate nama lengkap
    $input_namalengkap = trim($_POST["namalengkap"]);
    if(empty($input_namalengkap)){
        $namalengkap_err = "Please enter a namalengkap.";
    } elseif(!filter_var(trim($_POST["namalengkap"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s]+$/")))){
        $namalengkap_err = 'Please enter a valid namalengkap';
    } else{
        $namalengkap = $input_namalengkap;
    }

    // validate noktp
    $input_noktp = trim($_POST["noktp"]);
    if(empty($input_noktp)){
        $noktp_err = "Please enter noktp.";
    } elseif(!ctype_digit($input_noktp)){
        $noktp_err = 'Please enter a positive integer value.';
    } else{
        $noktp = $input_noktp;
    }
    
     // Validate kodefasilitas
     $input_kodefasilitas = trim($_POST["kodefasilitas"]);
     if(empty($input_kodefasilitas)){
    } elseif(!ctype_digit($input_kodefasilitas)){
         $kodefasilitas_err = 'Please enter kodefasilitas';
     } else{
         $kodefasilitas = $input_kodefasilitas;
     }
    // validate nama fasilitas
     if(isset($_POST["namafasilitas"]) && !empty($_POST["namafasilitas"])){  
        // Get hidden input value
        $namafasilitas = $_POST["namafasilitas"];
    } else{
        $namafasilitas_err = "please select a namafasilitas";
    }

     // Validate email
     $input_email = trim($_POST["email"]);
     if(empty($input_email)){
         $email_err = 'Please enter email';
     } else{
         $email = $input_email;
     }

      // validate telepon
    $input_telepon = trim($_POST["telepon"]);
    if(empty($input_telepon)){
        $telepon_err = "Please enter telepon.";
    } elseif(!ctype_digit($input_telepon)){
        $telepon_err = 'Please enter a positive integer value.';
    } else{
        $telepon = $input_telepon;
    }

     // Validate pesan
     $input_pesan= trim($_POST["pesan"]);
     if(empty($input_pesan)){
         $pesan_err = 'Please enter pesan.';
     } else{
         $pesan = $input_pesan;
     }

    // check input error before inserting in database
    if(empty($id_err) && empty($namalengkap_err) && empty($noktp_err) && empty($kodefasilitas_err) && empty($namafasilitas_err) && empty($email_err) && empty($telepon_err) && empty($pesan_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO pemesanan (id, namalengkap, noktp, kodefasilitas, namafasilitas, email, telepon, pesan) VALUES (:id, :namalengkap, :noktp, :kodefasilitas, :namafasilitas, :email, :telepon, :pesan)";
        if($stmt = $pdo->prepare($sql)){
            
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':id', $param_id);
            $stmt->bindParam(':namalengkap', $param_namalengkap);
            $stmt->bindParam(':noktp', $param_noktp);
            $stmt->bindParam(':kodefasilitas', $param_kodefasilitas);
            $stmt->bindParam(':namafasilitas', $param_namafasilitas);
            $stmt->bindParam(':email', $param_email);
            $stmt->bindParam(':telepon', $param_telepon);
            $stmt->bindParam(':pesan', $param_pesan);

            // Set parameters
            $param_id = $id;
            $param_namalengkap = $namalengkap;
            $param_noktp = $noktp;
            $param_kodefasilitas = $kodefasilitas;
            $param_namafasilitas = $namafasilitas;
            $param_email = $email;
            $param_telepon = $telepon;
            $param_pesan = $pesan;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-widht, initial-scale=1">
    <title>Create Data Hotel</title>
    <link rel="stylesheet" type="text/css" href="css_crud/bootstrap.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="Gaya2/images/icons/favicon.ico"/>

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
                <diiv class="col-md-12">
                    <div class="page-header">
                        <h2><b><font color="green">Form Pemesanan Hotel</h2></b></font>
                        </div>
                        <p>Harap diisi form di bawah ini lalu <b>Submit</b></P>
                        <hr align="left" width="100%">

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group ">
                        <label><b>Nama Lengkap</label></b>
                        <input type="text" name="namalengkap" class="form-control"value="">
                        <span class="help-block"></spam>
                    </div>

                    <div class="form-group ">
                        <label><b>NO KTP</label></b>
                        <input type="text" name="noktp" class="form-control"value="">
                        <span class="help-block"></span>
                    </div>

                     <div class="form-group ">
                        <label><b>Kode Fasilitas</label></b>
                        <input type="text" name="kodefasilitas" class="form-control"value="">
                        <span class="help-block"></span>
                    </div> 

                    <div class="form-group ">
               <label><b>Nama Fasilitas</b></label>
                <select class="form-control" type="text" name="namafasilitas">
                    <option>Pilih Nama Fasilitas</option>
                    <option>Hotel 1</option>
                    <option>Hotel 2</option>
                    <option>Hotel 3</option>
                    <option>Hotel 4</option>
                    <option>Hotel 5</option>
                    </select>
               <span class="hep-block"></span>
            </div>

            <!-- <div class="form-group <?php echo (!empty($namafasilitas_err)) ? 'has-error' :''; ?>">
               <label><b>Nama Fasilitas</b></label>
               <select class="form-control" type="text" name="namafasilitas">
                <option value="">Pilih Fasilitas:</option>
                <option value="ASN">ASN</option>
                <option value="tenaga kontrak">tenaga kontrak</option>
                <option value="magang">magang</option>
                <option value="kursus/pelatihan">kursus/pelatihan</option>
               </select>
               <span class="hep-block"><?php echo $namafasilitas_err; ?></span>
            </div> -->

                    <div class="form-group ">
                        <label><b>Email</label></b>
                        <input type="text" name="email" class="form-control"value="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group ">
                        <label><b>Telepon</label></b>
                        <input type="text" name="telepon" class="form-control"value="">
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group ">
                        <label><b>Pesan</label></b>
                        <input type="text" name="pesan" class="form-control"value="">
                        <span class="help-block"></spam>
                    </div>

                    <input type="hidden" name="id" value="id"/>
                    <input type="submit" class="btn btn-primary" value="Kirim">
                     <a href="index.php" class="btn btn-primary">Back</a>
                    <!-- <input type="reset" class="btn btn-danger" value="Batal">
                    <a href="read_pesan.php" class="btn btn-success">Lihat Pesan</a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>