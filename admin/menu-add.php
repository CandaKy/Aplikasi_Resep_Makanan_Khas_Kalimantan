<?php
include_once "../fungsi.php";
cekSesi();
include_once "header.php";
?>

<!-- Form Menu -->
<center>
    <h2>Tambah Resep Menu</h2>
    <a href="menu.php" class="paper-btn btn-success">Kembali</a>
    <a href="keluar.php" class="paper-btn btn-danger">Keluar</a>
    <br><br>
</center>

<div class="row col margin-none">
    <div class="alert alert-secondary padding">
        Semua kolom wajib diisi.
    </div>
</div>

<form action="menu-save.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="sm-6 col">
            <div class="form-group">
                <label>Nama Menu</label>
                <input class="input-block" type="text" placeholder="Nama Menu" name="nama_menu" required>
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input class="input-block" type="file" name="foto" required>
            </div>

            <div class="form-group">
                <label>Makanan Khas</label>
                <select name="id_wilayah" class="input-block" required>
                    <option value="">Pilih Wilayah</option>
                    <?php
                    $sql = "SELECT * FROM wilayah";
                    $query = $koneksi->prepare($sql);
                    $query->execute();
                    while ($data = $query->fetch(PDO::FETCH_OBJ)) {
                    ?>
                        <option value="<?php echo $data->id_wilayah; ?>"><?php echo $data->nama_wilayah; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Bahan</label>
                <textarea rows="3" class="input-block" name="bahan" placeholder="Masukkan bahan yang dibutuhkan, dll..."></textarea>
            </div>
        </div>

        <div class="sm-6 col">
            <div class="form-group">
                <label>Bahan Halus</label>
                <textarea rows="4" class="input-block" name="bahan_halus" placeholder="Masukkan bahan halus yang dibutuhkan, dll..."></textarea>
            </div>

            <div class="form-group">
                <label>Cara Membuat</label>
                <textarea rows="5" class="input-block" name="cara_membuat" placeholder="Masukkan cara membuat, dll..." ></textarea>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col sm-6">
                        <input class="paper-btn btn-success btn-block" type="submit" value="Simpan" name="simpan">
                    </div>
                    <div class="col sm-6">
                        <input class="paper-btn btn-primary btn-block" type="reset" value="Kosongkan">
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
<!-- Form Menu -->
