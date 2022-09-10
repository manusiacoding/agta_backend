<?php
    include "connection.php";
    $id = $_GET['id_blog'];
    // $idproduk = $_GET['id_produk'];
    $query = mysqli_query($koneksi, "SELECT * FROM blog WHERE id_blog='$id'");

    $data = mysqli_fetch_array($query);
    $customer = array(
                'judul'     =>  $data['judul'],
                'isi'       =>  $data['isi'],
                'author'    =>  $data['author'],
                'gambar'    =>  $data['gambar'],
                'status'    =>  $data['status'],
              );
    echo json_encode($customer);
?>
