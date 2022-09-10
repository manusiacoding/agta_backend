<?php
include 'connection.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$jenis = $_POST['jenis'];

$now = new DateTime();
$tanggal = $now->format('Y-m-d H:i:s');

$sql = "INSERT INTO `products`(`nama_produk`, `harga_produk`, `deskripsi_produk`, `jenis_produk`, `created_at`, `updated_at`) VALUES ('$nama','$harga','$deskripsi','$jenis', '$tanggal', '$tanggal')";
if (mysqli_query($koneksi, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($koneksi);
?>