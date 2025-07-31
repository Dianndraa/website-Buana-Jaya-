<?php
	if(!defined("INDEX")) die("---");
	
	$isi = addslashes($_POST['isi']);
	$input = mysqli_query($koneksi, "INSERT INTO halaman SET
			judul 	= '$_POST[judul]',
			isi		= '$isi'
		") or die(mysqli_error($koneksi));
	
	if($input){
		echo"Data telah tersimpan";
		echo"<meta http-equiv='refresh' content='1; url=?tampil=halaman'>";
	}
?>