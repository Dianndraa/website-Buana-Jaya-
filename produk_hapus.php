<?php
if(!defined("INDEX")) die("---");
	
$data=mysqli_fetch_array(mysqli_query($koneksi, "select * from produk where id_produk='$_GET[id]'"));
if($data['gambar'] != "") unlink("../gambar/produk/$data[gambar]");

$hapus = mysqli_query($koneksi, "delete from produk where id_produk='$_GET[id]'") or die(mysqli_error($koneksi));
if($hapus){
	echo"Data telah hapus";
	echo"<meta http-equiv='refresh' content='1; url=?tampil=produk'>";
}
?>