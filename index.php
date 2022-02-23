<?php
session_start();
require_once("koneksi.php");
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['username'])){
    header("location: login.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Aplikasi Pembayaran SPP</title>
        <link rel="stylesheet" href="cssF/assets/css/styleK.css">
    </head>
<body>
    <!-- Kita akan panggil menu navigasi -->
    <?php require("header.php"); ?>
    <center>
    <h3>Selamat datang, <?= $username; ?></h3>
                <br />
    Silahkan dikelola dengan baik yaa :) 
                <hr />
    </center>
    <?php require_once("footer.php"); ?>
</body>
</html>