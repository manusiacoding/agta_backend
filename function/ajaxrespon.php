<?php
    include "connection.php";
    $idmodel = $_GET['id_model'];
    // $idproduk = $_GET['id_produk'];
    $query = mysqli_query($koneksi, "SELECT * FROM products LEFT JOIN modelproducts ON products.id_produk = modelproducts.id_produk WHERE modelproducts.id_model='$idmodel'");

    $data = mysqli_fetch_array($query);
    $customer = array(
                'nama_produk'               =>  $data['nama_produk'],
                'harga_produk'              =>  $data['harga_produk'],
                'deskripsi_produk'          =>  $data['deskripsi_produk'],
                'jenis_produk'              =>  $data['jenis_produk'],
                'nama_model'                =>  $data['nama_model'],
                'stock_produk'              =>  $data['stok_produk'],
                'berat_produk'              =>  $data['berat_produk'],
                'ukuran_produk'             =>  $data['ukuran_produk'],
                'gambar_produk'             =>  $data['gambar_produk'],
              );
    echo json_encode($customer);
?>
