<?php
include 'connection.php';

    $sql = "SELECT transactions.id_transaksi,  transactions.id_user, transaction_detail.id_produk, transactions.total_harga, transactions.shipping_courier_name,  transactions.status, SUM(transaction_detail.jumlah_produk) AS jumlah_produk FROM transactions LEFT JOIN transaction_detail ON transactions.id_transaksi = transaction_detail.id_transaksi";

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
    
    echo json_encode($dataset, JSON_PRETTY_PRINT);
?>