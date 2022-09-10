<?php
    include "connection.php";
    $id = $_GET['id_user'];
    // $idproduk = $_GET['id_produk'];
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id'");

    $data = mysqli_fetch_array($query);
    $customer = array(
                'name'              =>  $data['name'],
                'username'          =>  $data['username'],
                'email'             =>  $data['email'],
                'id_province'       =>  $data['id_province'],
                'id_city'           =>  $data['id_city'],
                'id_subdistrict'    =>  $data['id_subdistrict'],
                'address'           =>  $data['address'],
                'phone'             =>  $data['phone']
              );
    echo json_encode($customer);
?>