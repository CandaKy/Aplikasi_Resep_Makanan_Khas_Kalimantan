<?php
include_once "../fungsi.php";
cekSesi();
include_once "header.php";

// Tangkap id_menu //
$id_menu = $_GET['id_menu'];

// Baca Data Berdasarkan id_menu //
$sql = "SELECT * FROM menu WHERE id_menu='$id_menu'";
$query = $koneksi->prepare($sql);
$query->execute();
$data_menu = $query->fetch(PDO::FETCH_OBJ);
?>

<!-- Form Menu -->
<center>
    <h2>Edit Resep Menu</h2>
    <a href="menu.php" class="paper-btn btn-success" style="width: 90px; height: 40px; display: inline-block; text-align: center; line-height: 10px;">Kembali</a>
    <a href="keluar.php" class="paper-btn btn-danger" style="width: 90px; height: 40px; display: inline-block; text-align: center; line-height: 10px;">Keluar</a>
    <br><br>
</center>

<div class="row col margin-none">
    <div class="alert alert-secondary padding">
        Semua kolom wajib diisi.
    </div>
</div>

<form action="menu-update.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="sm-6 col">
            <div class="form-group">
                <label>Nama Menu</label>
                <input class="input-block" type="text" value="<?php echo $data_menu->nama_menu; ?>" name="nama_menu" required>
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input class="input-block" type="file" name="foto">
            </div>

            <div class="form-group">
                <label>Makanan Khas</label>
                <select name="id_wilayah" class="input-block" required>
                    <option value="">Pilih Wilayah</option>
                    <?php

                    // include_once "../fungsi.php"; //
                    $sql = "SELECT * FROM wilayah";
                    $query = $koneksi->prepare($sql);
                    $query->execute();
                    while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                        $terpilih = ($data_menu->id_wilayah == $data->id_wilayah) ? "selected" : "";
                    ?>
                        <option value="<?php echo $data->id_wilayah; ?>" <?php echo $terpilih; ?>><?php echo $data->nama_wilayah; ?></option><?php
                                                                                                                                            }
                                                                                                                                                ?>
                </select>
            </div>

            <div class="form-group">
                <label>Bahan</label>
                <textarea rows="3" class="input-block" name="bahan" placeholder="Masukkan bahan yang dibutuhkan, dll..."> <?php echo $data_menu->bahan; ?> </textarea>
            </div>
        </div>

        <div class="sm-6 col">
            <div class="form-group">
                <label>Bahan Halus</label>
                <textarea rows="4" class="input-block" name="bahan_halus" placeholder="Masukkan bahan halus yang dibutuhkan, dsb..."> <?php echo $data_menu->bahan_halus; ?> </textarea>
            </div>

            <div class="form-group">
                <label>Cara Membuat</label>
                <textarea rows="5" class="input-block" name="cara_membuat" placeholder="Masukkan cara membuat, dsb..."> <?php echo $data_menu->cara_membuat; ?> </textarea>
                <input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>">
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col sm-12">
                        <input class="paper-btn btn-success btn-block" type="submit" value="Simpan" name="simpan">
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
<!-- Form menu -->