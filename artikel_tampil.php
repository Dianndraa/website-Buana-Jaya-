<?php
	if(!defined("INDEX")) die("---");
	
	include("../lib/fungsi_tglindonesia.php");
?>

<h2 class="sub-header">Data Artikel</h2>

<a href="?tampil=artikel_tambah" class="btn btn-primary">Tambah Artikel</a><br><br>

<div class="table-responsive"> 
	<table class="table table-striped">
	<tr>
		<th>No</th>
		<th>Judul Artikel</th>
		<th>Tanggal</th>
		<th>Aksi</th>
	</tr>
	
	<?php
		$no=1;
		$tampil = mysqli_query($koneksi, "SELECT * FROM artikel") or die(mysqli_error($koneksi));
		while($data = mysqli_fetch_array($tampil)){
			$tanggal = tgl_indonesia($data['tanggal']);
	?>
	
	<tr>
		<td> <?= $no; ?> </td>
		<td> <?= $data['judul']; ?> </td>
		<td> <?= $tanggal; ?> </td>
		<td> 
			<a href="?tampil=artikel_edit&id=<?= $data['id_artikel']; ?>" class="btn btn-primary btn-sm"> Edit </a> 
			<a href="?tampil=artikel_hapus&id=<?= $data['id_artikel']; ?>" class="btn btn-danger btn-sm"> Hapus </a>
		</td>
	</tr>
	
	<?php 
			$no++;
		} 
	?>
	
</table>