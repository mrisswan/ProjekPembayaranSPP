<?php
require_once("require.php");
$id = $_GET['id'];
$kelas = mysqli_query($db, "SELECT * FROM kelas WHERE id_kelas='$id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit data Kelas</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <h3 text align="center" >Edit data Kelas</h3>
<?php
while($row = mysqli_fetch_assoc($kelas)){?>
    <form action="" method="POST">
        <table text align="center" cellpadding="5">
            <input type="hidden" name="id" value="<?= $row['id_kelas']; ?>">
            <tr>
                <td>Nama Kelas </td>
                <td><input type="text" name="nama" value="<?= $row['nama_kelas']; ?>"></td>
            </tr>
            <tr>
                <td>Kompetensi Keahlian </td>
                <td><input type="text" name="kk" value="<?= $row['kompetensi_keahlian']; ?>"></td>
            </tr>
            <tr text align="center">
                <td colspan="2"><button class="btn btn-danger"><a href="kelas.php" class="link-light">Batal</button></a>
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
error_reporting(0);
// Proses update
if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $update = mysqli_query($db, "UPDATE kelas SET nama_kelas='$nama', kompetensi_keahlian='$kk'
                                 WHERE kelas.id_kelas='$id'");
        if($update){
            echo"<script>alert('Berhasil'); document.location = 'kelas.php' </script>";
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>