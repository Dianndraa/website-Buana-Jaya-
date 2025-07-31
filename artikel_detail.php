<?php
	if(!defined("INDEX")) die("---");
	
	mysqli_query($koneksi, "update artikel set hits=hits+1 where id_artikel='$_GET[id]'");
	
	$artikel = mysqli_query($koneksi, "select * from artikel where id_artikel='$_GET[id]'");
	$data = mysqli_fetch_array($artikel);
	$isi = $data['isi'];
?>
	<ul class="breadcrumb">
		<li>Home</li>
		<li class="active">Artikel detail</li>
	</ul>
	
	<div class="artikel">
		<h2 class="judul"><?php echo $data['judul']; ?></h2>
		<p>			
			<?php if($data['gambar']!="") ?> <img src="gambar/artikel/<?php echo $data['gambar']; ?>" class="thumbnail" width="100%">
				
			<?php echo $isi; ?> 
		</p>
	</div>

<?php
	$komentar = mysqli_query($koneksi, "select * from komentar where id_artikel='$_GET[id]'");
	$jmlkomentar = $komentar->num_rows;
?>
	