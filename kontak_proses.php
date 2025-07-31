<?php
	if(!defined("INDEX")) die("---");
	
	$nama	= $_POST['nama'];
	$email	= $_POST['email'];
	$pesan	= $_POST['pesan'];
	
	$subjek	= "Pesan dari pengunjung website";
	$dari	= "pemilik.website@gmail.com";
	$tgl	= date('Ymd');
	
	//mail($email,$subjek,$pesan,$dari);
	
	mysqli_query($koneksi, "insert into pesan set nama='$nama', email='$email', pesan='$pesan', tanggal='$tgl'") or die(mysqli_error($koneksi));
	
	echo"Pesan telah terkirim";
	echo"<meta http-equiv='refresh' content='1; url=?tampil=kontak'>";
?>