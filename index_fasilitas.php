<!DOCTYPE html>
<html lang="en">
<head>
	<title>Page Titel</title>
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

    <style type="text/css">
.wrapper{
width: 1300px;
margin: 0 auto;
}
.page-header h2{
margin-top: 0;
}
table tr td:last-child a{
margin-right: 5px;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
    <br>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <diiv class="col-md-12">
                    <h2 class="full-left">Fasilitas</h2>
                    <a href="create_fasilitas.php" class="btn btn-success full-right">Baru/Tambah Failitas</a>
                <hr>
                <?php
                // include config file s
                require_once 'config.php';
                //variabel no urut 
                $nourut= 0;

                // Attempt select query execution
                $sql = "SELECT * FROM fasilitas";
                //membuat no urut data
                $nourut++;

                if($result = $pdo->query($sql)){
                    if($result->rowCount() > 0){

                    echo "<table class='table table-bordered table-striped'>";

                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>No</th>";
                        echo "<th>Prototype</th>";
                        echo "<th>Kode Fasilitas</th>";
                        echo "<th>Nama fasilitas</th>";
                        echo "<th>Harga</th>";
                        echo "<th>Deskripsi</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                    while($row = $result->fetch()){
                        echo "<tr>";
                        echo "<td>" . $nourut++. "</td>";
                        echo "<td><img src='gambar/".$row['photo'] ."'widht='50' height='65'></td>";
                        echo "<td>" . $row['kodefasilitas'] . "</td>";
                        echo "<td>" . $row['namafasilitas'] . "</td>";
                        echo "<td>" . $row['harga'] . "</td>";
                        echo "<td>" . $row['deskripsi'] . "</td>";
                        echo "<td>";
                        echo "<a href='read_fasilitas.php?id=". $row['id'] ."' title='View-Record'><img src='img/view.jpg' width='43px'></a>";
                        echo "<a href='edit_fasilitas.php?id=". $row['id'] ."' title='Update-Record'><img src='img/logo_edit.jpg' width='28px'></a>";
                        echo "<a href='delete_fasilitas.php?id=". $row['id'] ."' title='Delete-Record'><img src='img/logo_delete.png' width='28px'></a>";
                        
                        echo "</td>";
                        echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";

                        // Free result set
                        unset($result);
                        }else{
                        echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                        }else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                        }
                        // Close connection
                        unset($pdo);
                        ?>
                    </div>
                    <a href="welcome.php" class="btn btn-primary">Back to Dashboard</a>
                </div>
                    </div>
                 </div>
    <script src="Gaya/vendor/jquery/jquery-3.2.1min.js"></script>
	<script src="Gaya/vendor/bootstrap/js/popper.js"></script>
	<script src="Gaya/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="Gaya/vendor/select2/select2.min.js"></script>
	<script src="Gaya/js/main.js"></script>
 </body>
 </html>