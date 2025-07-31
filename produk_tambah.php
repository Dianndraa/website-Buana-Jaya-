<?php 
if (!defined("INDEX")) die("---");
?>
<h2 class="sub-header">Tambah Produk</h2>
<form name="tambah" method="post" action="?tampil=produk_tambahproses" enctype="multipart/form-data" class="form-horizontal">
	
	<div class="form-group">
		<label class="label-control col-md-2">Nama Produk</label>	
		<div class="col-md-4"> 
			<input type="text" class="form-control" name="judul" size="50" required>
		</div>
	</div>
	
	<div class="form-group">
		<label class="label-control col-md-2">Harga</label>	
		<div class="col-md-4"> 
			<input type="text" class="form-control" name="harga" placeholder="Masukkan harga" required>
		</div>
	</div>
	
	<div class="form-group">
		<label class="label-control col-md-2">Gambar</label>	
		<div class="col-md-4"> 
			<input type="file" name="gambar" class="form-control" required>
		</div>
	</div>
	
	<div class="form-group">
		<label class="label-control col-md-2"></label>				
		<div class="col-md-4"> 
			<input type="submit" name="tambah" value="Tambah" class="btn btn-primary">
		</div>
	</div>
	
</form>