<?php
    include "connection.php";
    $id = $_POST['id_transaction'];

    $query = mysqli_query($koneksi, "SELECT nama_model FROM transaction_detail WHERE id_transaksi='$id'");

    while($data = mysqli_fetch_array($query)){
        $row[] = $data['nama_model'];
    }
    $customer = array(
        'nama_model'    =>  implode("\n", $row)
    );

    echo json_encode($customer);
?>