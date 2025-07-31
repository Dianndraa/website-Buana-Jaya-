<?php
// Perbaiki path koneksi
include "../koneksi.php";

// Cek apakah parameter ID dikirim dan valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Siapkan prepared statement untuk keamanan
    $stmt = mysqli_prepare($koneksi, "DELETE FROM ulasan WHERE id_ulasan = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('Ulasan berhasil dihapus.');
                    window.location.href = 'admin.php?tampil=ulasan';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menghapus ulasan.');
                    window.history.back();
                  </script>";
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>
                alert('Error saat menyiapkan statement: " . mysqli_error($koneksi) . "');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('ID ulasan tidak valid atau tidak ditemukan.');
            window.history.back();
          </script>";
}

// Tutup koneksi (opsional, karena PHP otomatis menutup koneksi di akhir script)
mysqli_close($koneksi);
?>
