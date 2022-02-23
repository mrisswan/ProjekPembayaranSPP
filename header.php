<!-- <h1>Selamat datang di Aplikasi Pembayaran SPP</h1> -->
<!-- Logika kita, Jika Level Admin Maka Fitur apa saja yang dapat diakses -->
<?php
$panggil = mysqli_query($db, "SELECT * FROM petugas WHERE username='$username'");
$hasil = mysqli_fetch_assoc($panggil);
?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- assets/css/ -->
        <link rel="stylesheet" href="cssF/assets/css/animated.css">
        <link rel="stylesheet" href="cssF/assets/css/fontawesome.css">
        <link rel="stylesheet" href="cssF/assets/css/owl.css">
        <link rel="stylesheet" href="cssF/assets/css/templatemo-digimedia-v1.css">
        <link rel="stylesheet" href="cssF/assets/css/templatemo-digimedia-v2.css">
        <link rel="stylesheet" href="cssF/assets/css/templatemo-digimedia-v3.css">
        <!-- fonts -->
        <link rel="stylesheet" href="cssF/assets/fonts/">
        <!-- images -->
        <link rel="stylesheet" href="cssF/assets/images/">
        <!-- js -->
        <link rel="stylesheet" href="cssF/assets/js/animation.js">
        <link rel="stylesheet" href="cssF/assets/js/custom.js">
        <link rel="stylesheet" href="cssF/assets/js/imagesloaded.js">
        <link rel="stylesheet" href="cssF/assets/js/isotope.js">
        <link rel="stylesheet" href="cssF/assets/js/owl-carousel.js">
        <link rel="stylesheet" href="cssF/assets/js/tabs.js">
        <!-- assets/vendor/boostrap/js -->
        <link rel="stylesheet" href="cssF/vendor/bootstrap/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="cssF/vendor/bootstrap/js/bootstrap.bundle.min.js.map">
        <link rel="stylesheet" href="cssF/vendor/bootstrap/js/bootstrap.min.js">
        <!-- assets/vendor/boostrap/css -->
        <link rel="stylesheet" href="cssF/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="cssF/vendor/bootstrap/css/bootstrap.min.css.map">
        <!-- assets/vendor/jquerry -->
        <link rel="stylesheet" href="cssF/vendor/jquery/jquery.js">
        <link rel="stylesheet" href="cssF/vendor/jquery/jquery.min.js">
        <link rel="stylesheet" href="cssF/vendor/jquery/jquery.min.map">
        <link rel="stylesheet" href="cssF/vendor/jquery/jquery.slim.js">
        <link rel="stylesheet" href="cssF/vendor/jquery/jquery.slim.min.js">
        <link rel="stylesheet" href="cssF/vendor/jquery/jquery.slim.min.map">
        <!-- homepagae -->
        <link rel="stylesheet" href="cssF/homepage_1.html">
        <link rel="stylesheet" href="cssF/homepage_2.html">
        <link rel="stylesheet" href="cssF/homepage_3.html">
        <link rel="stylesheet" href="cssF/index.html">
    </head>
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
              <img src="cssF/assets/images/logo-v1.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
                <?php
            if($hasil['level'] == "Administrator"){ ?>
                <li class="scroll-to-section"><a href="siswa.php">Data Siswa</a></li>
                <li class="scroll-to-section"><a href="petugas.php">Data Petugas</a></li>
                <li class="scroll-to-section"><a href="kelas.php">Data Kelas</a></li>
                <li class="scroll-to-section"><a href="spp.php">Data SPP</a></li>
                <li class="scroll-to-section"><a href="transaksi.php">Transaksi</a></li>
                <li class="scroll-to-section"><a href="history.php">History Pembayaran</a></li>
            <?php
                }else{ ?>
                <li class="scroll-to-section"><a href="transaksi.php">Transaksi</a></li>
                <li class="scroll-to-section"><a href="history.php">History Pembayaran</a></li>
            <?php } ?>
              <li class="scroll-to-section"><div class="border-first-button"><a href="logout.php">Log Out</a></div></li> 
            </ul>        
            <!-- <a class='menu-trigger'>
                <span>Menu</span>
            </a> -->
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  </html>