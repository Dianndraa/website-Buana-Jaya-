<?php
	if(!defined("INDEX")) die("---");
	
	include "konten/slideshow.php";
	
	$hal 	= isset($_GET['hal']) ? $_GET['hal'] : 1;
	
	$batas	= 3;
	$posisi = ($hal-1) * $batas ;
	
	$artikel = mysqli_query($koneksi, "select * from artikel order by id_artikel desc limit $posisi, $batas");
	while($data = mysqli_fetch_array($artikel)){
		$isi = substr($data['isi'],0,500);
		$isi = substr($data['isi'],0,strrpos($isi," "));
?>
	<div class="artikel">
		<h3 class="judul"><?php echo $data['judul']; ?></h3>
		<div class="row">
			<div class="col-md-4">
			<?php if($data['gambar']!="") ?> <img src="gambar/artikel/<?php echo $data['gambar']; ?>" class="thumbnail" width="100%" height="150px">
			</div>
			<div class="col-md-8">
				<?php echo $isi; ?> ... 
				<a href="?tampil=artikel_detail&id=<?php echo $data['id_artikel']; ?>" class="btn btn-primary btn-xs">Selengkapnya</a>
			</div>
		</div>
	</div>
<?php
	}
	
	$semua = mysqli_query($koneksi, "select * from artikel");
	$jmldata = $semua->num_rows;
	$jmlhal	 = ceil($jmldata/$batas);	
	$sebelumnya = $hal - 1;
	$berikutnya = $hal + 1;
	
	echo "<br><div class='paging'>";
	
	if($hal > 1){
		echo "<span class='btn btn-default'><a  href='?tampil=home&hal=1'> Pertama</a></span> ";
		echo "<span class='btn btn-default'><a href='?tampil=home&hal=$sebelumnya'> Sebelumnya</a></span> ";
	}else{
		echo "<span class='btn btn-default'> Pertama</span> ";
		echo "<span class='btn btn-default'> Sebelumnya</span> ";
	}
	
	for($i=1; $i<=$jmlhal; $i++){
		if($i == $hal) echo "<span class='btn btn-default'> <b>$i</b> </span> ";
		else echo "<span class='btn btn-default'><a href='?tampil=home&hal=$i'> $i </a></span> ";
	}
	
	if($hal < $jmlhal){
		echo "<span class='btn btn-default'><a href='?tampil=home&hal=$berikutnya'> Berikutnya </a></span> ";
		echo "<span class='btn btn-default'><a href='?tampil=home&hal=$jmlhal'> Terakhir </a></span> ";
	}else{
		echo "<span class='btn btn-default'> Berikutnya </span> ";
		echo "<span class='btn btn-default'> Terakhir </span> ";		
	}
	
	echo "</div><br>";
?>