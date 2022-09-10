<?php
include 'connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$province = $_POST['province'];
$city = $_POST['city'];
$subdistrict = $_POST['subdistrict'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$now = new DateTime();
$tanggal = $now->format('Y-m-d H:i:s');

$sql = "INSERT INTO users(id_role, name, username, email, email_verified_at, password, id_province, id_city, id_subdistrict, phone, address, remember_token, created_at, updated_at) VALUES ('1', '$name', '', '$email', '$tanggal', '$password', '$province', '$city', '$subdistrict', '$phone', '$address', NULL, '$tanggal', '$tanggal')";
if (mysqli_query($koneksi, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($koneksi);
?>