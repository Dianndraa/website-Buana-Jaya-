<?php 
	if(!defined("INDEX")) die("---");

	$nama_gambar 	= $_FILES['gambar']['name'];
	$lokasi_gambar 	= $_FILES['gambar']['tmp_name'];
	$tipe_gambar	= $_FILES['gambar']['type'];
	
	$tanggal	= date('Ymd');	
	
	if($lokasi_gambar==""){
		$input = mysqli_query($koneksi, "INSERT INTO galeri SET
				judul 	= '$_POST[judul]',
				tanggal	= '$tanggal'
			") or die(mysqli_error($koneksi));
	}else{
		move_uploaded_file($lokasi_gambar,"../gambar/galeri/$nama_gambar");
		$input = mysqli_query($koneksi, "INSERT INTO galeri SET
				judul 	= '$_POST[judul]',
				tanggal	= '$tanggal',
				gambar	= '$nama_gambar'
			") or die(mysqli_error($koneksi));
	}
	
	if($input){
		echo"Data telah tersimpan";
		echo"<meta http-equiv='refresh' content='1; url=?tampil=galeri'>";
	}
?>