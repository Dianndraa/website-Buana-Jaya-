<!-- Display Reviews -->
<?php 
if(!defined("INDEX")) die("---");
?>
<h2 class="sub-header">Ulasan Pelanggan</h2>

<div class="reviews-container">
    <?php
    $no = 1;
    // Use mysqli_query instead of mysql_query
    $tampil = mysqli_query($koneksi, "SELECT * FROM ulasan") or die(mysqli_error($koneksi));
    
    while ($data = mysqli_fetch_array($tampil)) {
        ?>
        <div class="review">
            <div class="review-header">
                <span class="review-number"><?= $no; ?>.</span>
                <span class="review-name"><?= htmlspecialchars($data['nm_pelanggan']); ?></span>
                <span class="review-date"><?= htmlspecialchars($data['tanggal']); ?></span>
            </div>
            <div class="review-product">
                <strong>Produk:</strong> <?= htmlspecialchars($data['produk']); ?>
            </div>
            <div class="review-rating">
                <strong>Rating:</strong>
                <?php
                $rating = (int)$data['rating'];
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        echo '<span class="star filled">&#9733;</span>'; // Filled star
                    } else {
                        echo '<span class="star">&#9734;</span>'; // Empty star
                    }
                }
                ?>
            </div>
            <div class="review-text">
                <strong>Ulasan:</strong> <?= htmlspecialchars($data['ulasan']); ?>
            </div>
            <div class="review-actions">
              
            </div>
        </div>
        <?php
        $no++;
    }
    ?>
</div>

<!-- CSS for styling -->
<style>
.reviews-container {
    margin: 20px;
}

.review {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 15px;
    background-color: #f9f9f9;
}

.review-header {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
}

.review-product,
.review-text,
.review-response {
    margin-top: 10px;
}

.review-rating {
    margin-top: 10px;
}

.star {
    font-size: 20px;
    color: #ccc; /* Default color for empty stars */
}

.star.filled {
    color: gold; /* Color for filled stars */
}

.review-actions {
    margin-top: 10px;
}

.review-actions a {
    margin-right: 10px;
    text-decoration: none;
    color: blue;
}

.review-actions a:hover {
    text-decoration: underline;
}
</style>

<?php
if (!defined("INDEX")) die("---");

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama    = $_POST['nm_pelanggan'];
    $produk  = $_POST['produk'];
    $rating  = $_POST['rating'];
    $ulasan  = $_POST['ulasan'];
    $tanggal = date('Y-m-d');

    // Query untuk memasukkan data
    $sql = "INSERT INTO ulasan (nm_pelanggan, produk, rating, ulasan, tanggal)
            VALUES ('$nama', '$produk', '$rating', '$ulasan', '$tanggal')";

    // Eksekusi query dan cek hasilnya
    if ($koneksi->query($sql)) {
        echo "<p style='color:green;'>Ulasan berhasil dikirim pada tanggal: " . date('d-m-Y', strtotime($tanggal)) . "!</p>";
    } else {
        echo "<p style='color:red;'>Gagal: " . $koneksi->error . "</p>";
    }
}
?>

<!-- Form HTML -->
<form method="post" action="">
    <label>Nama:</label><br>
    <input type="text" name="nm_pelanggan" required><br><br>

    <label>Produk:</label><br>
    <textarea name="produk" required></textarea><br><br>

    <label>Rating:</label><br>
    <div class="star-rating">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
    </div>
    <input type="hidden" name="rating" id="rating" required><br><br>

    <label>Ulasan:</label><br>
    <textarea name="ulasan" required></textarea><br><br>

    <label>Tanggal:</label><br>
    <input type="date" name="tanggal" value="<?php echo date('Y-m-d'); ?>" readonly><br><br>

    <button type="submit">Kirim</button>
</form>

<!-- CSS untuk Bintang -->
<style>
.star-rating {
    font-size: 24px;
    cursor: pointer;
    color: #ccc;
}
.star-rating .star.selected,
.star-rating .star:hover,
.star-rating .star:hover ~ .star {
    color: gold;
}
.reviews-container {
    margin-top: 20px;
}
.review {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
    background-color: #f9f9f9;
}
.review-rating {
    margin-top: 5px;
}
</style>

<!-- JavaScript untuk Efek Bintang -->
<script>
const stars = document.querySelectorAll('.star');
const ratingInput = document.getElementById('rating');

stars.forEach((star, index) => {
    star.addEventListener('click', () => {
        // Simpan nilai ke input hidden
        ratingInput.value = star.getAttribute('data-value');

        // Update tampilan bintang
        stars.forEach(s => s.classList.remove('selected'));
        for (let i = 0; i <= index; i++) {
            stars[i].classList.add('selected');
        }
    });
});
</script>