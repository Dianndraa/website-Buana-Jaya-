<?php 
if (!defined("INDEX")) die("---");

$nama_gambar = $_FILES['gambar']['name'];
$lokasi_gambar = $_FILES['gambar']['tmp_name'];
$tipe_gambar = $_FILES['gambar']['type'];
$tanggal = date('Ymd');	

// Mengambil harga dari form dan sanitasi input
$harga_produk = mysqli_real_escape_string($koneksi, $_POST['harga']); // Pastikan harga diambil dari form
$judul_produk = mysqli_real_escape_string($koneksi, $_POST['judul']); // Sanitasi judul produk

if (empty($lokasi_gambar)) {
    // Jika tidak ada gambar yang diupload, hanya simpan nama dan harga
    $input = mysqli_query($koneksi, "INSERT INTO produk (judul, harga, tanggal) VALUES ('$judul_produk', '$harga_produk', '$tanggal')") or die(mysqli_error($koneksi));
} else {
    // Pindahkan file gambar yang diupload
    if (move_uploaded_file($lokasi_gambar, "../gambar/produk/$nama_gambar")) {
        $input = mysqli_query($koneksi, "INSERT INTO produk (judul, harga, tanggal, gambar) VALUES ('$judul_produk', '$harga_produk', '$tanggal', '$nama_gambar')") or die(mysqli_error($koneksi));
    } else {
        die("Gagal mengupload gambar.");
    }
}

if ($input) {
    echo "Data telah tersimpan";
    echo "<meta http-equiv='refresh' content='1; url=?tampil=produk'>";
} else {
    echo "Terjadi kesalahan saat menyimpan data.";
}
?>