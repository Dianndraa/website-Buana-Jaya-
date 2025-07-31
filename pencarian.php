<?php
	if(!defined("INDEX")) die("---");
	
	$hal 	= isset($_GET['hal']) ? $_GET['hal'] : 1;
	$batas	= 5;
	$posisi = $hal - 1;
	
	
	$artikel = mysqli_query($koneksi, "SELECT * FROM artikel WHERE  isi LIKE '%$_REQUEST[kata]%' order by id_artikel desc limit $posisi, $batas");

	$semua = mysqli_query($koneksi, "SELECT * FROM artikel");
	$jmldata = mysqli_num_rows($semua);
	if($jmldata > 0){

		echo "Hasil pencarian dari <b>$_REQUEST[kata]</b>";
		while($data = mysqli_fetch_array($artikel)){
			$isi = substr($data['isi'],0,800);
			$isi = substr($data['isi'],0,strrpos($isi," "));
	?>
	
	<div class="artikel">
		<h2 class="judul"><?= $data ['judul']; ?></h2>
		<p>
			<?php if ($data['gambar']!="") ?>
			<img src="gambar/artikel/<?= $data['gambar'];
			?>" class="gambar-artikel" width="200">

			<?= $isi; ?> ...
			<a href="?tampil=artikel_detail&id=<?= $data['id_artikel']; ?>"Selengkapnya </a>
		</p>
	</div>

	<?php 
	}

	$jmlhal	 = ceil($jmldata/$batas);	
	$sebelumnya = $hal - 1;
	$berikutnya = $hal + 1;
	
	echo "<br><div class='paging'>";
	
	if($hal > 1){
		echo "<span><a  href='?tampil=pencarian&kata=$_REQUEST[kata]&hal=1'> Pertama</a></span> ";
		echo "<span><a href='?tampil=pencarian&kata=$_REQUEST[kata]&hal=$sebelumnya'> Sebelumnya</a></span> ";
	}else{
		echo "<span> Pertama</span> ";
		echo "<span> Sebelumnya</span> ";
	}
	
	for($i=1; $i<=$jmlhal; $i++){
		if($i == $hal) echo "<span> <b>$i</b> <span "; 
		else echo "<span><a href='?tampil=pencarian&kata=$_REQUEST[kata]&hal=$i'> $i </a></span> ";
	}
	
	if($hal < $jmlhal){
		echo "<span><a href='?tampil=pencarian&kata=$_REQUEST[kata]&hal=$berikutnya'> Berikutnya </a></span> ";
		echo "<span><a href='?tampil=pencarian&kata=$_REQUEST[kata]&hal=$jmlhal'> Terakhir </a></span> ";
	}else{
		echo "<span> Berikutnya </span> ";
		echo "<span> Terakhir </span> ";		
	}
	
	echo "</div>";
	
	}else{
		echo "Kata yang dicari tidak ada";
	}
?>