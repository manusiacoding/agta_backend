<?php
include 'connection.php';

$judul = $_POST['judul'];
$isi = $_POST['isi'];
$author = $_POST['author'];
$status = $_POST['status'];
$gambar = $_POST['gambar'];

$now = new DateTime();
$tanggal = $now->format('Y-m-d H:i:s');

$sql = "INSERT INTO `blog`(`judul`, `isi`, `tanggal_upload`, `author`,`gambar`, `status`) VALUES ('$judul','$isi','$tanggal','$author', '$gambar', '$status')";
if (mysqli_query($koneksi, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($koneksi);
?>