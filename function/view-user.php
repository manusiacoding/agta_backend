<?php
include 'connection.php';

$sql = "SELECT users.id_user, users.name, users.email, users.address, users.phone, province.province, city.city, subdistrict.subdistrict FROM users
LEFT JOIN province ON users.id_province = province.id
LEFT JOIN city ON users.id_city = city.id
LEFT JOIN subdistrict ON users.id_subdistrict = subdistrict.id
WHERE users.id_role = '1'";

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