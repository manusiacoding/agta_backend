<?php
include 'connection.php';

$id_produk = $_POST['id_produk'];
$model = $_POST['model'];
$stock = $_POST['stock'];
$berat = $_POST['berat'];
$size = $_POST['size'];
$image = $_POST['images'];

$now = new DateTime();
$tanggal = $now->format('Y-m-d H:i:s');

$sql = "INSERT INTO modelproducts(`id_produk`,`nama_model`, `stok_produk`, `ukuran_produk`, `berat_produk`,`gambar_produk`,`created_at`,`updated_at`) VALUES ('$id_produk','$model','$stock','$size','$berat','$image','$tanggal','$tanggal')";
if (mysqli_query($koneksi, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($koneksi);
?>