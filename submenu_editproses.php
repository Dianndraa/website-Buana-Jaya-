<?php
	if(!defined("INDEX")) die("---");
	
	$edit = mysqli_query($koneksi, "UPDATE submenu SET 
			judul='$_POST[judul]', 
			id_menu='$_POST[induk]', 
			link='$_POST[link]', 
			urutan='$_POST[urutan]' 
		WHERE id_submenu='$_POST[id]'") or die(mysqli_error($koneksi));
	
	if($edit){
		echo"Data telah diedit";
		echo"<meta http-equiv='refresh' content='1; url=?tampil=submenu'>";
	}
?>