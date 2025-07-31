<?php 
if (!defined("INDEX")) die("---");
?>
<h2 class="sub-header">Data Produk</h2>

<a href="?tampil=produk_tambah" class="btn btn-primary">Tambah Produk</a><br><br>

<div class="table-responsive"> 
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama Produk</th>
            <th>Harga</th> <!-- Tambahkan kolom Harga -->
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        
        <?php
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM produk") or die(mysqli_error($koneksi));
        while ($data = mysqli_fetch_array($tampil)) {
        ?>
        
        <tr>
            <td><?= $no; ?></td>
            <td><img src="../gambar/produk/<?= htmlspecialchars($data['gambar']); ?>" width="100"></td>
            <td><?= htmlspecialchars($data['judul']); ?></td>
            <td>Rp <?= htmlspecialchars($data['harga']); ?></td>
            <td><?= $data['tanggal']; ?></td>
            <td> 
                <a href="?tampil=produk_edit&id=<?= $data['id_produk']; ?>" class="btn btn-primary btn-sm"> Edit </a> 
                <a href="?tampil=produk_hapus&id=<?= $data['id_produk']; ?>" class="btn btn-danger btn-sm"> Hapus </a>
            </td>
        </tr>
        
        <?php 
            $no++;
        } 
        ?>
        
    </table>
</div>