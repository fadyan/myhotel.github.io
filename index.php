<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>UKK_Fadli</title>

    <link rel="canonical" href="Bootstrap5/carousel/carousel.css">

    

    <!-- Bootstrap core CSS -->
<link href="Bootstrap5/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      section{
        padding-top: 4rem;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="img/photo2.jpg" width=40" class =" rounded-circle"/>UKK-RPL 2022</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#aboutme">Tentang kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#fasilitas">fasilitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#kontakkami">Kontak Kami</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/1.jpeg" width="100%" >
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Harga Promo.</h1>
            <p>Some representative placeholder content for the first slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
       <img src="images/2.jpeg" width="100%">
        <div class="container">
          <div class="carousel-caption">
            <h1>Kualitas Terbaik.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/3.jpeg" width="100%">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Hanya Ada di sini.</h1>
            <p>Some representative placeholder content for the third slide of this carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- about -->
<section id="aboutme">
  <div class="container">
    <div class="row text-center m-4">
      <div class="col">
        <h2>Tentang kami</h2>
      </div>
    </div>
    <div class="row fs-5 justify-content-center fs-5 text-center">
      <div class="col-md-5">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut dolorem ratione doloremque vitae aspernatur? Sint atque tenetur voluptatum soluta voluptas!</p>
      </div>
      <div class="col-md-5">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam officiis atque nulla sit omnis deleniti mollitia inventore est error consectetur.</p>
      </div>
      </div>
    </div>
  </div>
    
</section>
<!-- Akhir about -->
<!-- fasilitas -->
<!-- Fasilitas -->
<!-- <section id="fasilitas" style="background-color: #c0c0c0"> -->
<section id="fasilitas">
  <div class="container">
    <div class="row text-center mb-3">
      <div class="col">
        <br>
        <br>
        <br>
        <h2>Fasilitas</h2>
      </div>
    </div>
  </div>
  
<!-- Akhir fasilitas-->

<!--pemesanan-->

<!-- kode untuk fasilitas -->
<div class="row justify-content-center">
<div calss="container">


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
                        echo "<th>Nama Fasilitas</th>";
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

                        echo" <a href='create_pesan.php?kodefasilitas=".$row['kodefasilitas']."'title='view=record' class='btn btn-primary'>Order</a>";
                        
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
<!-- projek akhir -->

    
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#6c757d"
          fill-opacity="1"
          d="M0,128L48,138.7C96,149,192,171,288,165.3C384,160,480,128,576,144C672,160,768,224,864,240C960,256,1056,224,1152,181.3C1248,139,1344,85,1392,58.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>

    
    </section>
    <!--Akhir Contact-->

    <!--Footer-->
    <section id="kontakkami" style="background-color: #6c757d">
            <footer class="bg-secondary shadow-sm text-white text-center pb-5">
    <div class="row justify-content-center fs-5 text-center">
    <div class="col-md-4">
    <br>
        <br>
    
    <h2>Kontak Kami</h2>
      <p><font size="-1" >Alamat : Jalan Maros-Pangkep </font></p>
      <p><font size="-1" >Humas : HOTEL OYO </font></h4></p>
      <p>Created with  by <a href="loginGaya.php" class="text-white fw-bold">M.Fadli Idrus @2021</a></p>
    </footer>
          </div>
        </div>
        <div class="row justify-content-center fs-5 text-center">
          <div class="col-md-5">
                      
    <!--Akhir Footer-->

    
    <script src="bootstrap5/assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
