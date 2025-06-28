<?php
include_once "fungsi.php";
include_once "header.php";

/* Tangkap Kiriman id_menu */
$id_menu = $_GET['id_menu'];
$sql = "SELECT * FROM view_resep_menu WHERE id_menu ='$id_menu'";
$query = $koneksi->prepare($sql);
$query->execute();
$data = $query->fetch(PDO::FETCH_OBJ);
?>

<!-- Detail Menu -->
<h2 class="text-secondary text-center"><?php echo $data->nama_menu; ?></h2>
<div class="row">
    <div class="sm-6 md-6 col mb0">
        <a href="#">
            <img src="aset/gambar/<?php echo $data->foto; ?>">
        </a>
    </div>
    <div class="sm-6 md-6 col mb0">
        <dl>
            <dt><b>Makanan Khas :</b></dt>
            <dd><?php echo $data->nama_wilayah; ?></dd>
            <br>

            <dt><b>Bahan :</b></dt>
            <dd><?php echo nl2br($data->bahan); ?></dd>
            <br>

            <dt><b>Bahan Halus :</b></dt>
            <dd><?php echo nl2br($data->bahan_halus); ?></dd>
            <br>

            <dt><b>Cara Membuat:</b></dt>
            <dd><?php echo nl2br($data->cara_membuat); ?></dd>
            <br>
            
        </dl>
    </div>
</div>

<?php
include_once "footer.php";
?>
