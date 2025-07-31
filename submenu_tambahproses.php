<?php
	if(!defined("INDEX")) die("---");
	
	$input = mysqli_query($koneksi, "INSERT INTO submenu set
			judul 	= '$_POST[judul]',
			id_menu ='$_POST[induk]', 
			link	= '$_POST[link]',
			urutan	= '$_POST[urutan]'
		") or die(mysqli_error($koneksi));
	
	if($input){
		echo"Data telah tersimpan";
		echo"<meta http-equiv='refresh' content='1; url=?tampil=submenu'>";
	}
?>