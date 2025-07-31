<link rel="stylesheet" type="text/css" href="plugin/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="plugin/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.fancybox').fancybox({
            // Optional: Add options for the fancybox
            type: 'iframe' // Set the type to iframe for video
        });
    });
</script>

<?php
if(!defined("INDEX")) die("---");
?>

<ul class="breadcrumb">
    <li class="active">Kegiatan</li>
</ul>

<div class="kegiatan">
    <div class="row">
        <?php   
        $no = 1;
        $kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan ORDER BY id_kegiatan DESC LIMIT 20");
        while($data = mysqli_fetch_array($kegiatan)){
        ?>
        <div class="col-md-3">
            <a class="fancybox" href="gambar/kegiatan/<?php echo $data['foto']; ?>" title="<?php echo htmlspecialchars($data['judul']); ?>">
                <img src="gambar/kegiatan/<?php echo $data['foto']; ?>" width="100%" class="thumbnail">
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