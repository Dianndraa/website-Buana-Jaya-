<?php
	if(!defined("INDEX")) die("---");
?>

<h2 class="sub-header">Data Sub Menu</h2>

<a href="?tampil=submenu_tambah" class="btn btn-primary">Tambah Sub Menu</a><br><br>
	
<div class="table-responsive"> 
	<table class="table table-striped">
	<tr>
		<th>No</th>
		<th>Judul Sub Menu</th>
		<th>Induk</th>
		<th>Link</th>
		<th>Urutan</th>
		<th>Aksi</th>
	</tr>
	
	<?php
		$no=1;
		$sql = mysqli_query($koneksi, "SELECT * FROM submenu order by urutan") or die(mysqli_error($koneksi));
		while($data = mysqli_fetch_array($sql)){
			$sqlmenu = mysqli_query($koneksi, "SELECT * FROM menu where id_menu='$data[id_menu]'");
			$datamenu = mysqli_fetch_array($sqlmenu);
	?>
	
	<tr>
		<td> <?= $no; ?> </td>
		<td> <?= $data['judul']; ?> </td>
		<td> <?= $datamenu['judul']; ?> </td>
		<td> <?= $data['link']; ?> </td>
		<td> <?= $data['urutan']; ?> </td>
		<td> 
			<a href="?tampil=submenu_edit&id=<?= $data['id_submenu']; ?>" class="btn btn-primary btn-sm"> Edit </a> 
			<a href="?tampil=submenu_hapus&id=<?= $data['id_submenu']; ?>" class="btn btn-danger btn-sm"> Hapus </a>
		</td>
	</tr>
	
	<?php 
			$no++;
		} 
	?>
	
</table>