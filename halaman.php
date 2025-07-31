<?php
	if(!defined("INDEX")) die("---");
	
	$halaman = mysqli_query($koneksi, "select * from halaman where id_halaman='$_GET[id]'");
	$data = mysqli_fetch_array($halaman);
	$isi = $data['isi'];
?>
<ul class="breadcrumb">
	<li>Home</li>
	<li class="active"><?php echo $data['judul']; ?></li>
</ul>

	<div class="halaman">
		<h2 class="judul"><?php echo $data['judul']; ?></h2>
		<p>							
			<?php echo $isi; ?> 
		</p>
	</div>