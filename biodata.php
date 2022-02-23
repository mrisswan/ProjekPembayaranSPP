<?php
session_start();
require_once("koneksi.php");
// Jika sesi dari login belum dibuat maka akan kita kembalikan ke halaman login
if(!isset($_SESSION['nisn'])){
    header("location: login_siswa.php");
}else{
    // Jika sudah dibuatkan sesi maka akan kita masukkan kedalam variabel
    $nisn = $_SESSION['nisn'];
}
$siswa = mysqli_query($db, "SELECT * FROM siswa 
JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
WHERE nisn='$nisn'");
$result = mysqli_fetch_assoc($siswa);
$pembayaran = mysqli_query($db, "SELECT * FROM pembayaran 
JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas JOIN spp ON pembayaran.id_spp = spp.id_spp
WHERE nisn='$nisn' ORDER BY tgl_bayar");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
<?php require_once("headersiswa.php"); ?>
    <h2>>> Hallo, <?= $result['nama']; ?></h2>
    <h3>Biodata Kamu</h3>
            <hr />
    <table cellpadding="5" id="biodata">
        <tr>
            <td>NISN</td>
            <td>:</td>
            <td><?= $result['nisn']; ?></td>
        </tr>
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><?= $result['nis']; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $result['nama']; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $result['nama_kelas'] . " | " . $result['kompetensi_keahlian']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?= $result['alamat']; ?></td>
        </tr>
    </table>
            <hr />
    <?php require_once("footer.php"); ?>
</body>
</html>