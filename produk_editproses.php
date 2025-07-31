<?php 
if (!defined("INDEX")) die("---");

// Mengambil data dari form
$nama_gambar = $_FILES['gambar']['name'];
$lokasi_gambar = $_FILES['gambar']['tmp_name']; // Perbaiki dari 'tmp_judul' menjadi 'tmp_name'
$tanggal = date('Ymd');	

// Mengambil harga dari form dan sanitasi input
$harga_produk = mysqli_real_escape_string($koneksi, $_POST['harga']); // Pastikan harga diambil dari form
$judul_produk = mysqli_real_escape_string($koneksi, $_POST['judul']); // Sanitasi judul produk

if (empty($lokasi_gambar)) {
    // Jika tidak ada gambar yang diupload, hanya update nama dan harga
    $edit = mysqli_query($koneksi, "UPDATE produk SET judul='$judul_produk', harga='$harga_produk' WHERE id_produk='$_POST[id]'") or die(mysqli_error($koneksi));
} else {
    // Ambil data produk yang ada
    $data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_POST[id]'"));
    
    // Hapus gambar lama jika ada
    if ($data['gambar'] != "") {
        unlink("../gambar/produk/" . $data['gambar']);
    }
    
    // Pindahkan file gambar yang diupload
    if (move_uploaded_file($lokasi_gambar, "../gambar/produk/$nama_gambar")) {
        // Update database dengan nama gambar baru, nama, dan harga
        $edit = mysqli_query($koneksi, "UPDATE produk SET judul='$judul_produk', gambar='$nama_gambar', harga='$harga_produk' WHERE id_produk='$_POST[id]'") or die(mysqli_error($koneksi));
    } else {
        die("Gagal mengupload gambar.");
    }
}

// Cek apakah edit berhasil
if ($edit) {
    echo "Data telah diedit";
    echo "<meta http-equiv='refresh' content='1; url=?tampil=produk'>";
} else {
    echo "Gagal mengedit data.";
}
?>