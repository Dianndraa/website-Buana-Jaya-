<?php
	if(!defined("INDEX")) die("---");
	
	$tampil = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE id_kegiatan='$_GET[id]'") or die(mysqli_error($koneksi));
	$data  	= mysqli_fetch_array($tampil);
?>
<h2 class="sub-header">Edit kegiatan</h2>
<form name="edit" method="post" action="?tampil=kegiatan_editproses" enctype="multipart/form-data" class="form-horizontal">
	<input type="hidden" name="id" value="<?= $data['id_kegiatan']; ?>">
	
	<div class="form-group"> 
		<label class="label-control col-md-2">Judul Kegiatan</label>	
		<div class="col-md-4"> 
			<input type="text" class="form-control" name="judul" size="50" value="<?= $data['judul']; ?>">
		</div> 
	</div>

	<div class="form-group"> 
		<label class="label-control col-md-2">Foto</label>
		<div class="col-md-4">
			<img src="../gambar/kegiatan/<?= $data['foto']; ?>" width="300" class="thumbnail"> 
			<input type="file" class="form-control" name="foto">
		</div> 
	</div>
	
	<div class="form-group"> 
		<label class="label-control col-md-2"></label>				
		<div class="col-md-4"> 
			<input type="submit" name="edit" value="Edit" class="btn btn-primary">
		</div>
	</div>
</form>