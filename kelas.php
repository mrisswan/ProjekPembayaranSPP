<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Data Kelas</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <!-- Panggil script header -->
    <?php require_once("header.php"); ?>
    <!-- Isi Konten -->
    <h3>Kelas</h3>
    <table cellspacing="0"  cellpadding="5" class="table table-striped">
        <thead>
            <tr>
                <td>No. </td>
                <td>Nama Kelas</td>
                <td>Kompetensi Keahlian</td>
                <td>Aksi</td>
            </tr>
        </thead>
<?php
// Kita Konfigurasi Pagging disini
$totalDataHalaman = 5;
$data = mysqli_query($db, "SELECT * FROM kelas");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Konfigurasi Selesai
// Kita panggil tabel kelas
$sql = mysqli_query($db, "SELECT * FROM kelas ORDER BY nama_kelas LIMIT $dataAwal, $totalDataHalaman");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nama_kelas']; ?></td>
            <td><?= $r['kompetensi_keahlian']; ?></t0 d>
            <td><a href="?hapus&id=<?= $r['id_kelas']; ?>"><button class="btn btn-danger">Hapus</button></a>
                <a href="edit_kelas.php?id=<?= $r['id_kelas']; ?>"><button class=" btn btn-success">Edit</button></a</td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Tampilkan tombol halaman -->
<!-- <?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?> -->
<!-- Selesai -->
<p><a href="tambah_kelas.php"><button class="btn btn-dark">Tambah Data</button></a></p>
    <hr />
    <?php require_once("footer.php"); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM kelas WHERE id_kelas='$id'");
    if($hapus){
        echo"<script>alert('Berhasil'); document.location = 'kelas.php' </script>";
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>