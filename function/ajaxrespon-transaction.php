<?php
    include "connection.php";
    $id = $_GET['id_transaction'];
    // $idproduk = $_GET['id_produk'];
    $query = mysqli_query($koneksi, "SELECT transactions.status, transaction_detail.id_produk, transactions.id_transaksi, transaction_detail.nama_model, transactions.total_harga, transactions.bukti_transfer FROM transactions, transaction_detail WHERE transactions.id_transaksi = transaction_detail.id_transaksi");

    $data = mysqli_fetch_assoc($query);
    $customer = array(
                'id_produk'         =>  $data['id_produk'],
                'id_transaksi'      =>  $data['id_transaksi'],
                'total_harga'       =>  $data['total_harga'],
                'bukti_transfer'    =>  $data['bukti_transfer'],
                'status'            =>  $data['status']
              );
    echo json_encode($customer);
?>