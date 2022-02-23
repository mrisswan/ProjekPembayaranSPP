<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Data Siswa</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <!-- Panggil script header -->
    <?php require_once("header.php"); ?>
    <!-- Isi Konten -->
    <h3>Siswa</h3>
    <table cellspacing="0"  cellpadding="5" class="table table-striped">
        <thead>
            <tr>
                <td>No. </td>
                <td>NISN</td>
                <td>NIS</td>
                <td>Nama Siswa</td>
                <td>Kelas</td>
                <td>Alamat</td>
                <td>No. Telp</td>
                <td>Aksi</td>
            </tr>
        </thead>
<?php
// Kita Konfigurasi Pagging disini
$totalDataHalaman = 5;
$data = mysqli_query($db, "SELECT * FROM siswa");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Konfigurasi Selesai
// Kita panggil tabel siswa
// Setelah kita panggil, JOIN tabel yang ter relasi ke tabel siswa
$sql = mysqli_query($db, "SELECT * FROM siswa
JOIN kelas ON siswa.id_kelas = kelas.id_kelas
ORDER BY nama LIMIT $dataAwal, $totalDataHalaman ");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nisn']; ?></td>
            <td><?= $r['nis']; ?></td>
            <td><?= $r['nama']; ?></td>
            <td><?= $r['nama_kelas'] . " | " . $r['kompetensi_keahlian']; ?></td>
            <td><?= $r['alamat']; ?></td>
            <td><?= $r['no_telp']; ?></td>
            <td><a href="?hapus&nisn=<?= $r['nisn']; ?>"><button class="btn btn-danger">Hapus</button></a> 
                <a href="edit_siswa.php?nisn=<?= $r['nisn']; ?>"><button class=" btn btn-success">Edit</button></a</td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Tampilkan tombol halaman -->
<!-- <?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?> -->
<!-- Selesai -->
<p><a href="tambah_siswa.php"><button class="btn btn-dark">Tambah Data</button></a></p>
    <hr />
    <?php require_once("footer.php"); ?>
</body>
</html>
<?php
// Tombol Hapus ditekan
if(isset($_GET['hapus'])){
    $nisn = $_GET['nisn'];
    $hapus = mysqli_query($db, "DELETE FROM siswa WHERE nisn='$nisn'");
    if($hapus){
        echo"<script>alert('Berhasil'); document.location = 'siswa.php' </script>";
    }else{
        echo "<script>alert('Maaf, data tersebut masih terhubung dengan data yang lain');
        </script>";
    }
}
?>