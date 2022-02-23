<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kelas</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <h3 text align="center">Tambah Kelas</h3>
    <form action="" method="POST">
        <table text align="center" cellpadding="5">
            <tr>
                <td>Nama Kelas </td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Kompetensi Keahlian</td>
                <td><input type="text" name="kk"></td>
            </tr>
            <tr text align="center">
                <td colspan="2"><button class="btn btn-danger"><a href="kelas.php" class="link-light">Batal</button></a>
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
    $nama = $_POST['nama'];
    $kk = $_POST['kk'];
    $simpan = mysqli_query($db, "INSERT INTO kelas VALUES(NULL, '$nama', '$kk')");
        if($simpan){
            echo"<script>alert('Berhasil'); document.location = 'kelas.php' </script>";
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
}
?>