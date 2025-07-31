<link rel="stylesheet" type="text/css" href="plugin/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="plugin/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.fancybox').fancybox();
    });
</script>

<?php
    if(!defined("INDEX")) die("---");
?>
<ul class="breadcrumb">
    <li>Home</li>
    <li class="active">Galeri foto</li>
</ul>

<div class="galeri">
    <div class="row">
        <?php   
            $no = 1;
            $galeri = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id_galeri DESC LIMIT 30");
            while($data = mysqli_fetch_array($galeri)){
        ?>
        <div class="col-md-3">
            <a class="fancybox" href="gambar/galeri/<?php echo $data['gambar']; ?>" title="<?php echo htmlspecialchars($data['judul']); ?>">
                <img src="gambar/galeri/<?php echo $data['gambar']; ?>" width="100%" class="thumbnail">
                <p align="center"><?php echo htmlspecialchars($data['judul']); ?></p>
            </a>
        </div>
        <?php
            if($no % 4 == 0) echo "</div><div class='row'>";
            $no++;
        }
        ?>
    </div>
</div>