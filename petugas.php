<?php
require("require.php");
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
    <?php require("header.php"); ?>
    <!-- Isi Konten -->
    <h3>Petugas</h3>
    <table cellspacing="0"  cellpadding="5" class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <td>No. </td>
                <td>Username</td>
                <td>Password</td>
                <td>Nama Petugas</td>
                <td>Level</td>
                <td>Aksi</td>
            </tr>
        </thead>
<?php
// Kita buat konfigurasi pagging
$jmlhDataHal = 5;
$data = mysqli_query($db, "SELECT * FROM petugas");
$jmlhData = mysqli_num_rows($data);
$jmlhHal = ceil($jmlhData / $jmlhDataHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($jmlhData * $halAktif) - $jmlhData;
// Konfigurasi Selesai
// Kita panggil tabel petugas
$sql = mysqli_query($db, "SELECT * FROM petugas LIMIT $dataAwal, $jmlhDataHal");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['username']; ?></td>
            <td><?= $r['password']; ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['level']; ?></td>
            <td><a href="?hapus&id=<?= $r['id_petugas']; ?>" ><button class="btn btn-danger">Hapus</button></a>
                <a href="edit_petugas.php?id=<?= $r['id_petugas']; ?>"> <button class=" btn btn-success">Edit</button></a</td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Sekarang kita buat tombol halamannya -->
<!-- <?php for($i=1; $i <= $jmlhHal; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?> -->
<!-- Selesai -->
    <p><a href="tambah_petugas.php"><button class="btn btn-dark">Tambah Data</button></a></p>
    <hr />
    <?php require_once("footer.php"); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $id = $_GET['id'];
    $hapus = mysqli_query($db, "DELETE FROM petugas WHERE id_petugas='$id'");
    if($hapus){
        echo"<script>alert('Berhasil'); document.location = 'petugas.php' </script>";
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>