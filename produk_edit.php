<?php
if (!defined("INDEX")) die("---");

// Pastikan id_produk ada dan valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_produk = intval($_GET['id']);
    $tampil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$id_produk'") or die(mysqli_error($koneksi));
    $data = mysqli_fetch_array($tampil);

    // Cek apakah data produk ditemukan
    if (!$data) {
        die("Produk tidak ditemukan.");
    }
} else {
    die("ID produk tidak valid.");
}
?>
<h2 class="sub-header">Edit Produk</h2>
<form name="edit" method="post" action="?tampil=produk_editproses" enctype="multipart/form-data" class="form-horizontal">
    <input type="hidden" name="id" value="<?= htmlspecialchars($data['id_produk']); ?>">
    
    <div class="form-group"> 
        <label class="label-control col-md-2">Nama Produk</label>    
        <div class="col-md-4"> 
            <input type="text" class="form-control" name="judul" size="50" value="<?= htmlspecialchars($data['judul']); ?>" required>
        </div> 
    </div>
    
    <div class="form-group"> 
        <label class="label-control col-md-2">Harga</label>    
        <div class="col-md-4"> 
            <input type="text" class="form-control" name="harga" size="50" value="<?= htmlspecialchars($data['harga']); ?>" required>
        </div> 
    </div>
    
    <div class="form-group"> 
        <label class="label-control col-md-2">Foto</label>
        <div class="col-md-4">
            <img src="../gambar/produk/<?= htmlspecialchars($data['gambar']); ?>" width="300" class="thumbnail"> 
            <input type="file" class="form-control" name="gambar">
        </div> 
    </div>
    
    <div class="form-group"> 
        <label class="label-control col-md-2"></label>                
        <div class="col-md-4"> 
            <input type="submit" name="edit" value="Edit" class="btn btn-primary">
        </div>
    </div>
</form>