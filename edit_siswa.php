<?php
require_once("require.php");
$nisnSiswa = $_GET['nisn'];
$siswa = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisnSiswa'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit data Siswa</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <center>
        <!-- Panggil header -->
    <?php require("header.php"); ?>
    <!-- Konten -->
    <h3 text align="center">Edit data Siswa</h3>
<?php
while($row = mysqli_fetch_assoc($siswa)){?>
    <form action="" method="POST">
        <table text align="center" cellpadding="5">
            <input type="hidden" name="nisn" value="<?= $row['nisn']; ?>">
            <tr>
                <td>Nama </td>
                <td><input type="text" name="nama" value="<?= $row['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Kelas </td>
                <td><select name="kelas">
<?php
$kelas = mysqli_query($db, "SELECT * FROM kelas");
while($r = mysqli_fetch_assoc($kelas)){ ?>
                        <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | " 
                    . $r['kompetensi_keahlian']; ?></option>
<?php } ?>          </select></td>
            </tr>
            <tr>
                <td>Alamat </td>
                <td><input type="text" name="alamat" value="<?= $row['alamat']; ?>"></td>
            </tr>
            <tr>
                <td>No. Telp </td>
                <td><input type="tel" name="no" value="<?= $row['no_telp']; ?>"></td>
            </tr>
            <tr text align="center">
                <td colspan="2"><button class="btn btn-danger"><a href="siswa.php" class="link-light">Batal</button></a>
                <button type="submit" name="simpan" class="btn btn-dark">Simpan</button></td>
            </tr>
        </table>
    </form>
<?php } ?>
<hr />
    <!-- Panggil footer -->
    <?php require("footer.php"); ?>
    </center>
</body>
</html>
<?php
error_reporting(0);
// Proses update
if(isset($_POST['simpan'])){
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $update = mysqli_query($db, "UPDATE siswa SET nama='$nama', id_kelas='$kelas', alamat='$alamat', no_telp='$no' WHERE siswa.nisn='$nisn'");
        if($update){
            echo"<script>alert('Berhasil'); document.location = 'siswa.php'; </script>";
        }else{
            echo "<script>alert('Gagal'); </script>";
        }
}
?>