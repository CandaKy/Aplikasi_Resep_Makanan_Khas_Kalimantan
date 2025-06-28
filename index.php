<?php
include_once "fungsi.php";
include_once "header-deskripsi.php";
?>
<!-- Foto Menu -->
<div class="row">
    <?php
    $sql = "SELECT * FROM view_resep_menu";
    $query = $koneksi->prepare($sql);
    $query->execute();
    while ($data = $query->fetch(PDO::FETCH_OBJ)) {
    ?>
        <div class="sm-6 md-4 col mb0">
            <a href="detail-menu.php?id_menu=<?php echo $data->id_menu; ?>">
                <img src="aset/gambar/<?php echo $data->foto; ?>">
            </a>
        </div>
    <?php
    }
    include_once "footer.php";
    ?>
</div>