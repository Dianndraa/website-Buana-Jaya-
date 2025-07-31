<?php 
    if(!defined("INDEX")) die("---");

    $nama_foto    = $_FILES['foto']['name'];
    $lokasi_foto  = $_FILES['foto']['tmp_name'];
    $tipe_foto    = $_FILES['foto']['type'];
    
    $tanggal    = date('Ymd');  
    
    if($lokasi_foto==""){
        $input = mysqli_query($koneksi, "INSERT INTO kegiatan SET
                judul   = '$_POST[judul]',
                tanggal = '$tanggal'
            ") or die(mysqli_error($koneksi));
    }else{
        move_uploaded_file($lokasi_foto,"../gambar/kegiatan/$nama_foto");
        $input = mysqli_query($koneksi, "INSERT INTO kegiatan SET
                judul   = '$_POST[judul]',
                tanggal = '$tanggal',
                foto  = '$nama_foto'
            ") or die(mysqli_error($koneksi));
    }
    
    if($input){
        echo"Data telah tersimpan";
        echo"<meta http-equiv='refresh' content='1; url=?tampil=kegiatan'>";
    }
?>