<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <center>
        <!-- Panggil header -->
        <?php require("header.php"); ?>
        <!-- Konten -->
        <h3 text align="center">Tambah Siswa</h3>
        <form action="" method="POST">
            <table text align="center" cellpadding="5">
                <tr>
                    <td>NISN</td>
                    <td><input type="text" name="nisn"></td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td><input type="text" name="nis"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td><select name="kelas">
        <?php
        $kelas = mysqli_query($db, "SELECT * FROM kelas");
        while($r = mysqli_fetch_assoc($kelas)){ ?>
                            <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | "
                            . $r['kompetensi_keahlian']; ?></option>
        <?php } ?>      </select></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td>No. Telp</td>
                    <td><input type="tel" name="no"></td>
                </tr>
                <tr text align="center">
                <td colspan="2"><button class="btn btn-danger"><a href="petugas.php" class="link-light">Batal</button></a>
                <button type="submit" name="simpan" class="btn btn-dark">Simpan</button></td>
            </tr>
            </table>
        </form>
    </center>
<hr />
            <!-- Panggil footer -->
    <?php require("footer.php"); ?>
</body>
</html>
<?php
// Proses Simpan
if(isset($_POST['simpan'])){
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no'];
    $simpan = mysqli_query($db, "INSERT INTO siswa VALUES ('$nisn', '$nis', '$nama', '$kelas', '$alamat', '$no')");
    if(empty($nisn)){
        echo "<script>alert('biodata tidak boleh kosong');location.href='tambah_siswa.php';</script>";
    }else{
        if($simpan){
            echo"<script>alert('Berhasil'); document.location = 'siswa.php' </script>";
        }else{
            echo "<script>alert('Data sudah ada');</script>";
        }
    }
}
?>