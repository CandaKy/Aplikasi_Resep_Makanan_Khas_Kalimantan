<?php
include_once "../fungsi.php";
cekSesi();
include_once "header.php";
?>

<!-- Tabel Menu-->
<center>
<h2>Data Resep Menu</h2>
    <a href="menu-add.php" class="paper-btn btn-success" style="width: 90px; height: 40px; display: inline-block; text-align: center; line-height: 10px;">Tambah</a>
    <a href="keluar.php" class="paper-btn btn-danger" style="width: 90px; height: 40px; display: inline-block; text-align: center; line-height: 10px;">Keluar</a>
    <br><br>
</center>

<table>
    <thead>
        <tr>
            <th>No:</th>
            <th>Nama Makanan:</th>
            <th>Makanan Khas:</th>
            <th>Bahan:</th>
            <th>Bahan Halus:</th>
            <th>Cara Membuat:</th>
            <th>Foto:</th>
            <th>Aksi:</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $nomor ="1";
        $sql = "SELECT * FROM view_resep_menu ORDER BY id_menu DESC";
        $query = $koneksi->prepare($sql);
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_OBJ)) {
        ?>
            <tr>
                <td><?php echo $nomor;?></td>
                <td style="white-space: nowrap;"><?php echo $data->nama_menu; ?></td>
                <td style="white-space: nowrap;"><?php echo $data->nama_wilayah; ?></td>
                <td><?php echo $data->bahan;?></td>
                <td><?php echo $data->bahan_halus;?></td>
                <td><?php echo $data->cara_membuat;?></td>
                <td><img src="../aset/gambar/<?php echo $data->foto; ?>" width="350"></td>
                <td>
                    <a href="menu-edit.php?id_menu=<?php echo $data->id_menu;?>" class="paper-btn btn-success" style="width: 90px; height: 40px; display: flex; align-items: center; justify-content: center;">Edit</a>                    
                    <a href="menu-delete.php?id_menu=<?php echo $data->id_menu;?>" class="paper-btn btn-danger" style="width: 90px; height: 40px; display: flex; align-items: center; justify-content: center;" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php
        $nomor++;
        }
        ?>
    </tbody>
</table>
<!-- Tabel Menu -->
