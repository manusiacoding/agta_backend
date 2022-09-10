<?php
    include "connection.php";
    $id = $_POST['id_produk'];
    // $idproduk = $_GET['id_produk'];
    $query = mysqli_query($koneksi, "SELECT nama_produk FROM products WHERE id_produk='$id'");

    $data = mysqli_fetch_assoc($query);
    $customer = array(
        'nama_produk'   =>  $data['nama_produk'],
    );
    echo json_encode($customer);
?>