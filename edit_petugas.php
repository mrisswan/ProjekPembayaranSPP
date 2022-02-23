<?php
require("require.php");
$id = $_GET['id'];
$petugas = mysqli_query($db, "SELECT * FROM petugas WHERE id_petugas='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit data Petugas</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <h3 text align="center">Edit data Petugas</h3>
<?php
while($row = mysqli_fetch_assoc($petugas)){?>
    <form action="" method="POST">
        <table text align="center" cellpadding="5">
            <input type="hidden" name="id" value="<?= $row['id_petugas']; ?>">
            <tr>
                <td>Username </td>
                <td><input type="text" name="user" value="<?= $row['username']; ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="pass" value="<?= $row['password']; ?>"></td>
            </tr>
            <tr>
                <td>Nama Petugas </td>
                <td><input type="text" name="nama" value="<?= $row['nama_petugas']; ?>"></td>
            </tr>
            <tr text align="center">
                <td colspan="2"><button class="btn btn-danger"><a href="petugas.php" class="link-light">Batal</button></a>
                <button type="submit" name="simpan" class="btn btn-dark">Simpan</button></td>
            </tr>
        </table>
    </form>
<?php } ?>
<hr />
    <!-- Panggil footer -->
    <?php require("footer.php"); ?>
</body>
</html>
<?php
// Proses update
error_reporting(0);
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $update = mysqli_query($db, "UPDATE petugas SET username='$user', password='$pass', nama_petugas='$nama' WHERE petugas.id_petugas='$id'");
        if($update){
            echo"<script>alert('Berhasil'); document.location = 'petugas.php' </script>";
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>