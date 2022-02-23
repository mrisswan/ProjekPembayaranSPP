<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Data SPP</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <!-- Panggil script header -->
    <?php require_once("header.php"); ?>
    <!-- Isi Konten -->
    <h3>SPP</h3>
    <table cellspacing="0"  cellpadding="5" class="table table-striped">
        <thead>
            <tr>
                <td>No. </td>
                <td>Tahun</td>
                <td>Nominal</td>
                <td>Aksi</td>
            </tr>
        </thead>
<?php
// Kita Konfigurasi Pagging disini
$totalDataHalaman = 5;
$data = mysqli_query($db, "SELECT * FROM spp");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Konfigurasi Selesai
// Kita panggil tabel spp
$sql = mysqli_query($db, "SELECT * FROM spp ORDER BY tahun ASC LIMIT $dataAwal, $totalDataHalaman");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['tahun']; ?></td>
            <td><?= "Rp. " . $r['nominal']; ?></td>
            <td><a href="?hapus&id=<?= $r['id_spp']; ?>"><button class="btn btn-danger">Hapus</button></a>
                <a href="edit_spp.php?id=<?= $r['id_spp']; ?>"><button class=" btn btn-success">Edit</button></a</td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Tampilkan tombol halaman -->
<!-- <?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?> -->
<!-- Selesai -->
    <p><a href="tambah_spp.php"><button class="btn btn-dark">Tambah Data</button></a></p>
    <hr />
    <?php require_once("footer.php"); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM spp WHERE id_spp='$id'");
    if($hapus){
        echo"<script>alert('Berhasil'); document.location = 'spp.php' </script>";
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');</script>";
    }
}
?>