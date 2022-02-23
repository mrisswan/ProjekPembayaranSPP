<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Petugas</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <h3 text align="center">Tambah Petugas</h3>
    <form action="" method="POST">
        <table text align="center" cellpadding="5">
            <tr>
                <td>Username </td>
                <td><input type="text" name="user"></td>
            </tr>
            <tr>
                <td>Password </td>
                <td><input type="text" name="pass"></td>
            </tr>
            <tr>
                <td>Nama </td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr text align="center">
                <td colspan="2"><button class="btn btn-danger"><a href="petugas.php" class="link-light">Batal</button></a>
                <button type="submit" name="simpan" class="btn btn-dark">Simpan</button></td>
            </tr>
        </table>
    </form>
<hr />
            <!-- Panggil footer -->
    <?php require("footer.php"); ?>
</body>
</html>
<?php
// Proses Simpan
if(isset($_POST['simpan'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $simpan = mysqli_query($db, "INSERT INTO petugas VALUES(NULL, '$user', '$pass', '$nama', 'Petugas')");
        if($simpan){
            echo"<script>alert('Berhasil'); document.location = 'petugas.php' </script>";
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>