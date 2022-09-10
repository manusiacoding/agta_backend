<?php
include 'connection.php';

$id = $_POST['idtransaction'];


$now = new DateTime();
$tanggal = $now->format('Y-m-d H:i:s');

$sql = "UPDATE transactions SET status='3', updated_at='$tanggal' WHERE id_transaksi='$id'";
if (mysqli_query($koneksi, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($koneksi);
?>