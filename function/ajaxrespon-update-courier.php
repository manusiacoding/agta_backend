<?php
    include "connection.php";
    $id = $_GET['id_transaction'];
    // $idproduk = $_GET['id_produk'];
    $query = mysqli_query($koneksi, "SELECT * FROM transactions WHERE id_transaksi='$id'");

    $data = mysqli_fetch_assoc($query);
    $customer = array(
                'no_resi'       =>  $data['no_resi'],
                'status'        =>  $data['status']
              );
    echo json_encode($customer);
?>