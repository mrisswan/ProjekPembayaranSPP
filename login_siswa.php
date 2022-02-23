<?php
session_start();
require_once("koneksi.php");
if(isset($_SESSION['nisn'])){
    header("location: index_siswa.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <link rel="stylesheet" href="cssF/assets/css/login.css">
        <title>Login</title>
    </head>
<body>
    <center>
    <h1>Silahkan Login</h1>
    </center>
<form action="" method="POST">
    <?php
    // Kita akan membuat proses login nya disini
    if(isset($_POST['login'])){
        $nisn = $_POST['nisn'];
        $cari = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisn'");
        $hasil = mysqli_fetch_assoc($cari);
            // Jika data yang dicari kosong
            if(mysqli_num_rows($cari) == 0){
                echo "<td colspan='2'><center>NISN belum terdaftar!</center></td>";
            }else{
            // Jika nisn siswa sesuai dengan database maka akan redirect ke halaman utama dan akan dibuatkan sesi
                $_SESSION['nisn'] = $_POST['nisn'];
                header("location: index_siswa.php");
            }
    }?>
    <div class="wrapper">
        <div class="logo"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/SPP_logo.jpg/330px-SPP_logo.jpg" alt=""> </div>
        <div class="text-center mt-4 name"> Pembayaran SPP</div>
        <form class="p-3 mt-3">
            <div class="form-field d-flex align-items-center"> 
                <span class="far fa-user"></span> <input type="text" name="nisn" id="userName" placeholder="NISN"> 
            </div>
            <button type="submit" value="LOG IN" name="login" class="btn mt-3">Login</button>
        </form>
    </div>
</form>
</body>
</html>