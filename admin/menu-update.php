<?php
include_once "../fungsi.php";
cekSesi();
// Tangkap Kiriman //
$id_menu = $_POST['id_menu'];
$nama_menu = $_POST['nama_menu'];
$id_wilayah = $_POST['id_wilayah'];
$bahan = $_POST['bahan'];
$bahan_halus = $_POST['bahan_halus'];
$cara_membuat = $_POST['cara_membuat'];
$foto = $_FILES['foto']['name'];

// Cek Foto //
if (!$_FILES['foto']['name']) {

    // Jika Foto Tidak Diganti //
    $sql = "UPDATE menu SET nama_menu='$nama_menu', id_wilayah='$id_wilayah', bahan='$bahan', bahan_halus='$bahan_halus', Cara_membuat='$cara_membuat' WHERE id_menu='$id_menu'";
} else { 
    // Jika Foto Diganti //
    // Baca Nama File Gambar Kemudian Hapus //
    $sql = "SELECT foto FROM menu WHERE id_menu='$id_menu'";
    $query = $koneksi->prepare($sql);
    $query->execute();
    $data = $query->fetch(PDO::FETCH_OBJ);
    if (file_exists('../aset/gambar/' . $data->foto)) {
        unlink('../aset/gambar/' . $data->foto);
    }

    // Upload File Baru //
    move_uploaded_file($_FILES['foto']['tmp_name'], '../aset/gambar/' . $foto);
    
    // Simpan ke Tabel //
    $sql = "UPDATE menu SET nama_menu='$nama_menu', id_wilayah='$id_wilayah', bahan='$bahan', bahan_halus='$bahan_halus', Cara_membuat='$cara_membuat', foto='$foto' WHERE id_menu='$id_menu'";
}

// Update Data Tabel Menu //
$query = $koneksi->prepare($sql);
$query->execute();

// kembali ke menu.php //
header('location:menu.php');
