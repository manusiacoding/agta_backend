<?php
include 'connection.php';

$id = $_POST['id'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);


$now = new DateTime();
$tanggal = $now->format('Y-m-d H:i:s');

$sql = "UPDATE users SET username='$username', password='$password', updated_at='$tanggal' WHERE id_user='$id'";
if (mysqli_query($koneksi, $sql)) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($koneksi);
?>