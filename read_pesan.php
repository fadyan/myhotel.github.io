<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UKK_RPL 2022</title>

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
        width: 850px;
        margin: 0 auto;
    }
    .page-header h2{
        margin-top: 0;
    }
    table tr td:last-child a{
        margin-right: 15px;
    }
</style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-center"><b>UKK_RPL 2022</b></h2>
                    <?php
                    // Include config file
                    require_once 'config.php';
                    // Variable nomor urut
                    $nourut= 0;

                    // Attempt select query execution
                    $sql = "SELECT * FROM pemesanan";
                    //membuat no urut data
                    $nourut++;

                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>No</th>";
                echo "<th>Nama lengkap</th>";
                echo "<th>NoKTP</th>";
                echo "<th>Kode Fasilitas</th>";
                echo "<th>Nama Fasilitas</th>";
                echo "<th>Email</th>";
                echo "<th>Telepon</th>";
                echo "<th>Pesan</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
        while($row = $result->fetch()){
                echo "<tr>";
                echo "<td>" . $nourut++. "</td>";
                echo "<td>" . $row['namalengkap'] . "</td>";
                echo "<td>" . $row['noktp'] . "</td>";
                echo "<td>" . $row['kodefasilitas'] . "</td>";
                echo "<td>" . $row['namafasilitas'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['telepon'] . "</td>";
                echo "<td>" . $row['pesan'] . "</td>";
                echo "<td>";
                echo "<a href='delete_pesan.php?id=". $row['id'] ."' title='Delete-Record'><img src='img/logo_delete.png' width='40px'></a>";
                echo "</td>";
                echo "</tr>";
}
                echo "</tbody>";
                echo "</table>";
                // Free result set
                unset($result);
                        } else{
                echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }

                    // Close connection
                    unset($pdo);
                    ?>
                    </div>
                    <p><a href="welcome.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
</body>
</html>