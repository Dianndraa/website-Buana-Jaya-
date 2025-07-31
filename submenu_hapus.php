<?php
	if(!defined("INDEX")) die("---");
	
	$hapus = mysqli_query($koneksi, "delete from submenu where id_submenu='$_GET[id]'") or die(mysqli_error($koneksi));
	if($hapus){
		echo"Data telah hapus";
		echo"<meta http-equiv='refresh' content='1; url=?tampil=submenu'>";
	}
?>