<?php
	if(!defined("INDEX")) die("---");

	$isi = addslashes($_POST['isi']);
	$edit = mysqli_query($koneksi, "UPDATE halaman SET 
			judul	= '$_POST[judul]', 
			isi		= '$isi' 
		WHERE id_halaman='$_POST[id]'") or die(mysqli_error($koneksi));
	
	if($edit){
		echo"Data telah diedit";
		echo"<meta http-equiv='refresh' content='1; url=?tampil=halaman'>";
	}
?>