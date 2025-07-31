<div class="reviews-container">
    <?php
    $no = 1;
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
               <form action="ulasan_hapus.php" method="GET">
                <input type="hidden" name="id" value="<?= $data['id_ulasan']; ?>">
                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?');" class="delete-button">Hapus</button>
                </form>
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
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.review {
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 15px;
    background-color: #ffffff;
    transition: box-shadow 0.3s;
}

.review:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.review-header {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
    margin-bottom: 10px;
}

.review-product,
.review-text {
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

.delete-button {
    background-color: #dc3545; /* Bootstrap danger color */
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.delete-button:hover {
    background-color: #c82333; /* Darker red on hover */
}
</style>
