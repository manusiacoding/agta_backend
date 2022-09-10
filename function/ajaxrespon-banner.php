<?php
    include "connection.php";
    $id = $_GET['id_blog'];
    // $idproduk = $_GET['id_produk'];
    $query = mysqli_query($koneksi, "SELECT * FROM banners WHERE id_banner='$id'");

    $data = mysqli_fetch_array($query);
    $customer = array(
                'judul'     =>  $data['judul'],
                'isi'       =>  $data['deskripsi'],
                'gambar'    =>  $data['gambar'],
              );
    echo json_encode($customer);
?>
