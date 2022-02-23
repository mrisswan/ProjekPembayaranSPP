<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: index.php");
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
<form action="proseslogin.php" method="POST">
<div class="wrapper">
    <div class="logo"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/SPP_logo.jpg/330px-SPP_logo.jpg" alt=""> </div>
    <div class="text-center mt-4 name"> Pembayaran SPP </div>
    <form class="p-3 mt-3">
        <div class="form-field d-flex align-items-center"> 
            <span class="far fa-user"></span> <input type="text" name="username" id="userName" placeholder="Username"> 
        </div>
        <div class="form-field d-flex align-items-center"> 
            <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password"> 
        </div> 
        <button type="submit" value="LOG IN" name="login" class="btn mt-3">Login</button>
    </form>
    <div class="text-center fs-6"> <center>Apakah anda seorang siswa? <br><a href="login_siswa.php">Login siswa</a></center> </div>
</div>
</form>
</body>
</html>