<?php
header('Content-Type: application/json');

require_once('connection.php');

$sqlQuery = "SELECT SUM(total_pembayaran) FROM transaction ORDER BY id_transaksi";

$result = mysqli_query($koneksi, $sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($koneksi);

echo json_encode($data);
?>