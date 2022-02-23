<?php
require_once("require.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Entry Transaksi</title>
    <link rel="stylesheet" href="cssF/assets/css/styleK.css">
</head>
<body>
    <!-- Panggil script header -->
    <?php require_once("header.php"); ?>
    <!-- Isi Konten -->
    <h3>Transaksi</h3>
    <table cellspacing="0"  cellpadding="5" class="table table-striped">
        <thead>
            <tr>
                <td>No. </td>
                <td>Nama Petugas</td>
                <td>Nama Siswa</td>
                <td>Tgl/Bulan/Tahun dibayar</td>
                <td>Tahun / Nominal harus dibayar</td>
                <td>Jumlah yang dibayar</td>
                <td>Status</td>
                <td>Aksi</td>
            </tr>
        </thead>
<?php
$totalDataHalaman = 5;
$data = mysqli_query($db, "SELECT * FROM pembayaran");
$hitung = mysqli_num_rows($data);
$totalHalaman = ceil($hitung / $totalDataHalaman);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;
// Kita panggil tabel pembayaran
// Setelah kita panggil, JOIN tabel yang ter relasi ke tabel pembayaran
$sql = mysqli_query($db, "SELECT * FROM pembayaran
JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
JOIN siswa ON pembayaran.nisn = siswa.nisn
JOIN spp ON pembayaran.id_spp = spp.id_spp ORDER BY tahun_dibayar DESC, bulan_dibayar DESC, tgl_bayar DESC");
$no = 1;
while($r = mysqli_fetch_assoc($sql)){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nama_petugas']; ?></td>
            <td><?= $r['nama']; ?></td>
            <td><?= $r['tgl_bayar'] . "/" . $r['bulan_dibayar'] . "/" . $r['tahun_dibayar']; ?></td>
            <td><?= $r['tahun'] . " | Rp. " . $r['nominal']; ?></td>
            <td><?= $r['jumlah_bayar']; ?></td>
            <td>
<?php
// Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
if($r['jumlah_bayar'] == $r['nominal']){ ?>
                <font style="color: darkgreen; font-weight: bold;">LUNAS</font>
<?php }else{ 
    ?>BELUM LUNAS <?php } ?> </td>
            <td>
<?php
// Jika siswa ingin membayar lunas sisa pembayaran
if($r['jumlah_bayar'] == $r['nominal']){ echo "-";
}else{ ?>
    <a href="?lunas&id=<?= $r['id_pembayaran']; ?>"><button class=" btn btn-danger">Bayar Lunas</button></a>
<?php } ?>  </td>
        </tr>
<?php $no++; } ?>
    </table>
<!-- Tampilkan tombol halaman -->
<!-- <?php for($i=1; $i <= $totalHalaman; $i++): ?>
        <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
<?php endfor; ?> -->
<!-- Selesai -->
    <p><a href="tambah_transaksi.php"><button class="btn btn-dark">Tambah Data</button></a>
    <a href="cetak.php" target="_blank"><button class="btn btn-dark">Cetak</button></a></p>
    <hr />
    <?php require_once("footer.php"); ?>
</body>
</html>
<?php
// Ada siswa yang ingin membayar sisa pembayaran
if(isset($_GET['lunas'])){
    $id = $_GET['id'];
    $ambilData = mysqli_query($db, "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp WHERE id_pembayaran = '$id'");
    $row = mysqli_fetch_assoc($ambilData);
    $sisa = $row['nominal'] - $row['jumlah_bayar'];
    $hasil = $row['jumlah_bayar'] + $sisa;
    $update = mysqli_query($db, "UPDATE pembayaran SET jumlah_bayar='$hasil' WHERE id_pembayaran='$id'");
    if($update){
        header("location: transaksi.php");
    }
}
?>