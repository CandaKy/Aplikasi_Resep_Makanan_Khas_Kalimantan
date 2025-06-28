<?php
 include_once "../fungsi.php";
 cekSesi();

 // Tangkap Kiriman //
 $nama_menu = $_POST['nama_menu'];
 $id_wilayah = $_POST['id_wilayah'];
 $bahan= $_POST['bahan'];
 $bahan_halus = $_POST['bahan_halus'];
 $cara_membuat = $_POST['cara_membuat'];
 $foto = $_FILES['foto']['name'];

 // Simpan ke Tabel // 
 $sql = "INSERT INTO menu (nama_menu, id_wilayah, bahan, bahan_halus, cara_membuat, foto) VALUES ('$nama_menu', '$id_wilayah', '$bahan', '$bahan_halus', '$cara_membuat', '$foto')";
 $query = $koneksi->prepare($sql);
 $query->execute();

 // Simpan Foto ke Folder Gambar //
 move_uploaded_file($_FILES['foto']['tmp_name'], '../aset/gambar/'.$foto);

 // Kembali ke menu.php //
 header('location:menu.php');
 ?>