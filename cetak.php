<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Print Data</title>
	<link rel="stylesheet" href="cssF/assets/css/styleK.css">
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<center>
		<h2>DATA LAPORAN SPP</h2>
	</center>
	<?php 
	include 'koneksi.php';
	?>

	<table border="1" cellspacing="0"  cellpadding="5" class="table table-striped">
		<tr>
			<th width="1%">No</th>
            <th>Nama Petugas</th>
            <th>Nama Siswa</th>
			<th>Tanggal</th>
			<th>Nominal Pembayaran</th>
			<th width="5%">Status</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($db, "SELECT * FROM pembayaran JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
        JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON pembayaran.id_spp = spp.id_spp");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
            <td><?php echo $data['nama_petugas']; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['tgl_bayar']. "/" .$data['bulan_dibayar'] . "/" .$data['tahun_dibayar'];?></td>
			<td><?php echo $data['nominal']; ?></td>
			<!-- <td><?php echo $data['jumlah_bayar']; ?></td> -->
            <td>
            <?php
            // Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
            if($data['jumlah_bayar'] == $data['nominal']){ ?>
                            <font style="color: darkgreen; font-weight: bold;">LUNAS</font>
            <?php }else{ 
                ?>BELUM LUNAS <?php } ?> </td>
		</tr>
		<?php 
		}
		?>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>