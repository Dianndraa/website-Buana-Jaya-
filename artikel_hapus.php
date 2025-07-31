<?php
	if(!defined("INDEX")) die("---");

	$data=mysqli_fetch_array(mysqli_query($koneksi, "select * from artikel where id_artikel='$_GET[id]'"));
	if($data['gambar'] != "") unlink("../gambar/artikel/$data[gambar]");

	mysqli_query($koneksi, "delete from artikel where id_artikel='$_GET[id]'") or die(mysqli_error($koneksi));
	echo"Data telah hapus";
	echo"<meta http-equiv='refresh' content='1; url=?tampil=artikel'>";
?>