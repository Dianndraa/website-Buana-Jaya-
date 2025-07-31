<?php 
    if(!defined("INDEX")) die("---");
?>
<h2 class="sub-header">Data Kegiatan</h2>

<a href="?tampil=kegiatan_tambah" class="btn btn-primary">Tambah Kegiatan</a><br><br>

<div class="table-responsive"> 
    <table class="table table-striped">
    <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Judul Kegiatan</th>
        <th>Tanggal</th>
        <th>Aksi</th>
    </tr>
    
    <?php
        $no=1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM kegiatan") or die(mysqli_error($koneksi));
        while($data = mysqli_fetch_array($tampil)){
    ?>
    
    <tr>
        <td> <?= $no; ?> </td>
        <td> <img src="../gambar/kegiatan/<?= $data['foto']; ?>" width="100"> </td>
        <td> <?= $data['judul']; ?> </td>
        <td> <?= $data['tanggal']; ?> </td>
        <td> 
            <a href="?tampil=kegiatan_edit&id=<?= $data['id_kegiatan']; ?>" class="btn btn-primary btn-sm"> Edit </a> 
            <a href="?tampil=kegiatan_hapus&id=<?= $data['id_kegiatan']; ?>" class="btn btn-danger btn-sm"> Hapus </a>
        </td>
    </tr>
    
    <?php 
            $no++;
        } 
    ?>
    
</table>