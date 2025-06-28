<?php
/* Koneksi php */
// Pengaturan Server //
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'resep_makanan';
// Membuat Koneksi // 
$koneksi = new PDO("mysql:host=$db_host; port=3306; dbname=$db_name", $db_user, $db_pass);
