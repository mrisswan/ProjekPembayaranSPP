<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah data transaksi</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <?php require("header.php"); ?>
    <h3 text align="center">Tambah data transaksi</h3>
    <form action="" method="POST">
        <table cellpadding="5" text align="center">
            <tr>
                <td>Petugas </td>
                <td><select name="petugas">
                    <?php
                    // Kita akan ambil Nama Petugas yang ada pada tabel Petugas
                    $petugas = mysqli_query($db, "SELECT * FROM petugas");
                    while($r = mysqli_fetch_assoc($petugas)){ ?>
                                            <option value="<?= $r['id_petugas']; ?>"><?= $r['nama_petugas']; ?></option>
                    <?php } ?>          
                </select></td>
            </tr>
            <tr>
                <td>Nama siswa </td>
                <td><select name="siswa">
                    <?php
                    // Sekarang kita ambil NISN Siswa 
                    $siswa = mysqli_query($db, "SELECT * FROM siswa");
                    while($r = mysqli_fetch_assoc($siswa)){ ?>
                                            <option value="<?= $r['nisn']; ?>"><?= $r['nama']; ?></option>
                    <?php } ?>          
                </select></td>
            </tr>   
            <tr>
                <td>Tgl. / Bulan / Tahun bayar </td>
                <td><input type="text" name="tgl" size="5" placeholder="Tanggal.">
                    <input type="text" name="bulan" size="10" placeholder="Bulan.">
                    <input type="text" name="tahun" size="5" placeholder="Tahun."></td>
            </tr>
            <tr>
                <td>SPP / Nominal yang harus dibayar</td>
                <td>
                    <select name="spp">
                        <?php
                        // Ambil juga data SPP
                        $spp = mysqli_query($db, "SELECT * FROM spp");
                        while($r = mysqli_fetch_assoc($spp)){
                            ?><option value="<?= $r['id_spp']; ?>"><?= $r['tahun'] . " | " . $r['nominal']; ?></option>
                        <?php } ?>          
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah bayar</td>
                <td><input type="text" name="jumlah" placeholder="1000000"></tdd>
            </tr>
            <tr text align="center">
                <td colspan="2"><button class="btn btn-danger"><a href="transaksi.php" class="link-light">Batal</button></a>
                <button type="submit" name="simpan" class="btn btn-dark">Simpan</button></td>
            </tr>
        </table>
    </form>
<hr />
    <?php require("footer.php"); ?>
</body>
</html>
<?php
error_reporting(0);
// Kita simpan proses simpan datanya disini
if(isset($_POST['simpan'])){
    $petugas = $_POST['petugas'];
    $nama = $_POST['siswa'];
    $tgl = $_POST['tgl']; $bulan = $_POST['bulan']; $tahun = $_POST['tahun'];
    $spp = $_POST['spp'];
    $cek = mysqli_query($db, "SELECT * FROM transaksi WHERE nama='$nama'");
    $ambil = ($cek);
    $jumlah = $_POST['jumlah'];
    if($spp == $ambil['id_spp']){
        echo "<script>alert('Tahun spp tersebut sudah ada pada siswa');</script>";
    }else{
    $s = mysqli_query($db,"INSERT INTO pembayaran VALUES(NULL, '$petugas', '$nama', '$tgl', '$bulan', '$tahun', '$spp', '$jumlah')");
    // Arahkan ke menu transaksi
    if($s){
        echo"<script>alert('Berhasil'); document.location = 'transaksi.php' </script>";
    }else{
        echo "<script>alert('gagal');</script>";
    }}}
?>