<?php
include 'connection.php';

$judul = $_POST['judul'];
$isi = $_POST['isi'];
$gambar = $_POST['gambar'];

$now = new DateTime();
$tanggal = $now->format('Y-m-d H:i:s');

$sql = "INSERT INTO `banners`(`id_model_produk`, `gambar`, `judul`, `deskripsi`,`created_at`, `updated_at`) VALUES (NULL,'$gambar','$judul','$isi', '$tanggal', '$tanggal')";
if (mysqli_query($koneksi, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($koneksi);
?>