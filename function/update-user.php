<?php
include 'connection.php';

$id = $_POST['id'];
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$province = $_POST['province'];
$city = $_POST['city'];
$subdistrict = $_POST['subdistrict'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$now = new DateTime();
$tanggal = $now->format('Y-m-d H:i:s');

$sql = "UPDATE users SET username='$username', name='$name', email='$email', password='$password', province_id='$province', city_id='$city', subdistrict_id='$subdistrict', phone='$phone', address='$address', updated_at='$tanggal' WHERE id_user='$id'";
if (mysqli_query($koneksi, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($koneksi);
?>