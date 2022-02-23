<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah SPP</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <h3 text align="center">Tambah SPP</h3>
    <form action="" method="POST">
        <table text align="center" cellpadding="5">
            <tr>
                <td>Tahun </td>
                <td><input type="text" name="tahun"></td>
            </tr>
            <tr>
                <td>Nominal </td>
                <td><input type="text" name="nominal"></td>
            </tr>
            <tr text align="center">
                <td colspan="2"><button class="btn btn-danger"><a href="spp.php" class="link-light">Batal</button></a>
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
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $simpan = mysqli_query($db, "INSERT INTO spp VALUES(NULL, '$tahun', '$nominal')");
        if($simpan){
            echo"<script>alert('Berhasil'); document.location = 'spp.php' </script>";
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>