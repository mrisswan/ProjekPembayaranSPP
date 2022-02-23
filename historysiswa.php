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
$siswa = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn='$nisn'");
$result = mysqli_fetch_assoc($siswa);
$pembayaran = mysqli_query($db, "SELECT * FROM pembayaran JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas JOIN spp ON pembayaran.id_spp = spp.id_spp
WHERE nisn='$nisn' ORDER BY tgl_bayar");
$cari = mysqli_query($db, "SELECT * FROM siswa WHERE nisn='$nisn'");
$hasil = mysqli_fetch_assoc($cari);
    // Jika data yang dicari kosong
    if(mysqli_num_rows($cari) == 0){
        echo "<td colspan='2'><center>NISN belum terdaftar!</center></td>";
    }else
    // {
    // // Jika nisn siswa sesuai dengan database maka akan redirect ke halaman utama dan akan dibuatkan sesi
    //     $_SESSION['nisn'] = $_POST['nisn'];
    //     header("location: index_siswa.php");
    // }
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
    <p><h2>History Pembayaran Kamu</p></h2>
    <table id="history" cellpadding="5" cellspacing="0" class="table table-striped">
        <thead>
            <tr>
                <td>No. </td>
                <td>Dibayarkan kepada</td>
                <td>Tgl. Pembayaran</td>
                <td>Tahun | Nominal yang harus dibayar</td>
                <td>Jumlah yang dibayarkan</td>
                <td>Status</td>
            </tr>
        </thead>
<?php
$no = 1;
while($r = mysqli_fetch_assoc($pembayaran)){ ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['tgl_bayar'] . "/" . $r['bulan_dibayar'] . "/" . $r['tahun_dibayar']; ?></td>
            <td><?= $r['tahun'] . " | Rp. " . $r['nominal']; ?></td>
            <td><?= $r['jumlah_bayar']; ?></td>
            <td>
<?php
// Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
if($r['jumlah_bayar'] == $r['nominal']){ ?>
                <font style="color: darkgreen; font-weight: bold;">LUNAS</font>
<?php }else{ ?>                             BELUM LUNAS <?php } ?> </td>
        </tr>
    <?php $no++; } ?>
    </table>
            <hr />
    <?php require_once("footer.php"); ?>
</body>
</html>