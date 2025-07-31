<?php
	if(!defined("INDEX")) die("---");

	$nama_gambar 	= $_FILES['gambar']['name'];
	$lokasi_gambar 	= $_FILES['gambar']['tmp_name'];
	$tipe_gambar	= $_FILES['gambar']['type'];
	
	$tanggal	= date('Ymd');	
	$isi 		= addslashes($_POST['isi']);
	
	if($lokasi_gambar==""){
		$edit = mysqli_query($koneksi, "UPDATE artikel SET 
				judul='$_POST[judul]', 
				isi='$isi' 
			WHERE id_artikel='$_POST[id]'") or die(mysqli_error($koneksi));
	}else{
		$data = mysqli_fetch_array(mysqli_query($koneksi, "select * from artikel where id_artikel='$_POST[id]'"));
		if($data['gambar'] != "") unlink("../gambar/artikel/$data[gambar]");
		
		move_uploaded_file($lokasi_gambar,"../gambar/artikel/$nama_gambar");
		$edit = mysqli_query($koneksi, "UPDATE artikel SET 
				judul='$_POST[judul]', 
				isi='$isi',
				gambar='$nama_gambar' 
			WHERE id_artikel='$_POST[id]'") or die(mysqli_error($koneksi));
	}
	
	if($edit){
		echo"Data telah diedit";
		echo"<meta http-equiv='refresh' content='1; url=?tampil=artikel'>";
	}
?>