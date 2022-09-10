<?php
include 'connection.php';

$id = $_POST['id'];
$servicesameday = $_POST['servicesameday'];
$pricesameday = $_POST['pricesameday'];
$estimatesameday = $_POST['estimatesameday'];
$servicecargo = $_POST['servicecargo'];
$pricecargo = $_POST['pricecargo'];
$estimatecargo = $_POST['estimatecargo'];
$linkshopee = $_POST['linkshopee'];
$linkaboutus = $_POST['linkaboutus'];
$linkwhatsapp = $_POST['linkwhatsapp'];

$now = new DateTime();
$tanggal = $now->format('Y-m-d H:i:s');

$sql = "UPDATE settings SET service_kurir_agta_sameday='$servicesameday', harga_kurir_agta_sameday='$pricesameday', estimasi_kurir_agta_sameday='$estimatesameday', service_kurir_agta_cargo='$servicecargo', harga_kurir_agta_cargo='$pricecargo', estimasi_kurir_agta_cargo='$estimatecargo', link_shopee='$linkshopee', link_tentang_kami='$linkaboutus', link_whatsapp='$linkwhatsapp', updated_at='$tanggal' WHERE id_setting='$id'";
if (mysqli_query($koneksi, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($koneksi);
?>