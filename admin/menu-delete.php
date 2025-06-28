<?php
include_once "../fungsi.php";
cekSesi();

// Tangkap id_tempat //
$id_menu = $_GET['id_menu'];

// Baca Nama File Foto //
$sql = "SELECT foto FROM menu WHERE id_menu = '$id_menu'";
$query = $koneksi->prepare($sql);
$query->execute();
$data = $query->fetch(PDO::FETCH_OBJ);

// Hapus File Foto //
if (file_exists('../aset/gambar/' . $data->foto)) {
    unlink('../aset/gambar/' . $data->foto);
}

// Hapus Data Dari Tabel Menu //
$sql = "DELETE FROM menu WHERE id_menu = '$id_menu'";
$query = $koneksi->prepare($sql);
$query->execute();

// Kembali ke menu.php //
header('location:menu.php');
