<div class="galeri">
    <div class="row">
<?php    
    $no = 1;
    $produk = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 50");
    
    if ($produk) {
        while ($data = mysqli_fetch_array($produk)) {
            $judul = htmlspecialchars($data['judul']);
            $gambar = 'gambar/produk/' . htmlspecialchars($data['gambar']);
?>
            <div class="col-md-3">
                <a class="fancybox" href="<?php echo $gambar; ?>" title="<?php echo $judul; ?>">
                    <img src="<?php echo $gambar; ?>" width="100%" class="thumbnail" alt="<?php echo $judul; ?>">
                </a>
                
                <p align="center" style="margin-top: 10px; font-weight: bold;"><?php echo $judul; ?></p>
                <p align="center" style="margin-top: 5px; color: green; font-weight: bold;">
                    <?php 
                    $harga_produk = floatval(str_replace(['Rp', '.', ' '], '', $data['harga']));
                    echo "Rp " . number_format($harga_produk, 0, ',', '.'); 
                    ?>
                </p>
                <div style="text-align: center; margin-top: 10px;">
                    <button onclick="showVisitorForm('<?php echo $judul; ?>', '<?php echo $gambar; ?>')" class="buy-button">Pesan</button>
                </div>
            </div>
<?php
            if ($no % 4 == 0) echo "</div><div class='row'>";
            $no++;
        }
    } else {
        echo "<p>Tidak ada produk yang ditemukan.</p>";
    }
?>
    </div>
</div>

<!-- Form Pengunjung Modal -->
<div id="visitor-form-modal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background-color:white; padding:20px; border:1px solid #ccc; z-index:1000;">
    <h3>Form Konsumen</h3>
    <p>Silakan isi data di bawah ini:</p>
    <form id="visitor-form">
        <label for="name">Nama:</label><br>
        <input type="text" id="name" required><br><br>
        <label for="alamat">Alamat:</label><br>
        <input type="text" id="alamat" required><br><br>
        <label for="phone">Nomor Telepon:</label><br>
        <input type="text" id="phone" required><br><br>
        <label for="tanggal">Tanggal:</label><br>
        <input type="date" id="tanggal" required><br><br>
        <label for="ket">Keterangan:</label><br>
        <input type="text" id="ket" required><br><br>
        <button type="submit">Kirim</button>
        <button type="button" onclick="closeVisitorFormModal()">Tutup</button>
    </form>
</div>

<script>
    let selectedProduct = {
        title: '',
        imageUrl: ''
    };

    function showVisitorForm(title, imageUrl) {
        selectedProduct.title = title;
        selectedProduct.imageUrl = imageUrl;
        document.getElementById('visitor-form-modal').style.display = 'block';
    }

    function closeVisitorFormModal() {
        document.getElementById('visitor-form-modal').style.display = 'none';
    }

    document.getElementById('visitor-form').onsubmit = function(event) {
        event.preventDefault();
        const name = document.getElementById('name').value;
        const alamat = document.getElementById('alamat').value;
        const phone = document.getElementById('phone').value;
        const tanggal = document.getElementById('tanggal').value;
        const keterangan = document.getElementById('ket').value;
        redirectToWhatsApp(name, alamat, phone, tanggal, keterangan);
    };

    function redirectToWhatsApp(name, alamat, phone, tanggal, keterangan) {
        const phoneNumber = "6281324995335";
        const message = `Hallo,\n\nKeterangan: ${keterangan}\nProduk: ${selectedProduct.title}\n${location.origin}/${selectedProduct.imageUrl}\nNama: ${name}\nAlamat: ${alamat}\nTelepon: ${phone}\nTanggal: ${tanggal}`;
        const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank');
        closeVisitorFormModal();
    }
</script>

<style>
    .buy-button {
        background-color: #28a745
         color: white;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 10px;
    }

    .buy-button:hover {
        background-color: #218838;
    }
</style>