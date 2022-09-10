<?php
include 'connection.php';

$sql = "SELECT * FROM products LEFT JOIN modelproducts ON products.id_produk = modelproducts.id_produk";
$result = mysqli_query($koneksi, $sql);

while($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

$dataset = array(
    "echo" => 1,
    "totalrecords" => count($array),
    "totaldisplayrecords" => count($array),
    "data" => $array
);

echo json_encode($dataset);
?>