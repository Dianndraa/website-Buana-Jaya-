<?php
	if(!defined("INDEX")) die("---");
	
	$tgl	= date('Ymd');
		
	mysqli_query($koneksi, "insert into komentar set 
			id_artikel 	= '$_POST[id]',
			nama		='$_POST[nama]', 
			email		='$_POST[email]', 
			komentar	='$_POST[komentar]', 
			tanggal		='$tgl'
		") or die(mysqli_error($koneksi));
	
	echo"Komentar telah terkirim";
	echo"<meta http-equiv='refresh' content='1; url=?tampil=artikel_detail&id=$_POST[id]'>";
?>