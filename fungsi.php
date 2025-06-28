<?php
/* Fungsi.php */
session_start();
ob_start();

// Pengaturan Waktu Default //
date_default_timezone_set("Asia/Jakarta");

// Sertakan File koneksi.php //
include_once "koneksi.php";

// Fungsi Tanggal dan Jam Sekarang //
function tampilkanWaktu()
{
    // Tanggal //
    $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $tanggal = $hari[date("w")] . ", ";
    $tanggal .= date("d") . " ";
    $tanggal .= $bulan[date("m") - 1] . " ";
    $tanggal .= date("Y");

    // Jam //
    $jam = date("H:i") . " WIB";

    // Jadikan Satu //
    $sekarang = $tanggal . " - " . $jam;

    // Kembalikan //
    return $sekarang;
}

// Cek Login //
    function cekLogin($user_id, $sandi){
    global $koneksi;
    $sql = "SELECT * FROM pengguna WHERE user_id='$user_id' AND sandi='$sandi'";
    $query = $koneksi->prepare($sql);
    $query->execute();
    $data=$query->fetch(PDO::FETCH_OBJ);
    if(!$data) {
    echo "<b class='text-danger'>User ID atau Sandi salah!
        </b><br><br>";
    }
    else {
        $_SESSION['user_id']=$data->user_id;
        $_SESSION['nama_pengguna']=$data->nama_pengguna;
        $_SESSION['kode'] = "1niKod3ke4man@n";
        header('location:menu.php');
        }
        }   
        
    // Cek Sesi Pengguna //
    function cekSesi() {
	if((! $_SESSION['user_id']) OR (! $_SESSION['nama_pengguna']) OR ($_SESSION['kode'] <> "1niKod3ke4man@n")) {
		header('location:pesan.php');
	}
}
?>