<?php
	if(!defined("INDEX")) die("---");
	
	$input = mysqli_query($koneksi, "INSERT INTO menu set
			judul 	= '$_POST[judul]',
			link	= '$_POST[link]', 
			urutan	= '$_POST[urutan]'
		") or die(mysqli_error($koneksi));
	
	if($input){
		echo"Data telah tersimpan";
		echo"<meta http-equiv='refresh' content='1; url=?tampil=menu'>";
	}
?>