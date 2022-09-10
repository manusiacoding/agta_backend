<?php
    include 'connection.php';

    $sql = "SELECT id_produk FROM products ORDER BY id_produk DESC LIMIT 1";
    $result = $koneksi->query($sql);

    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        $product_id= $data['id_produk'];
    }
    else{
        
    }
    echo $product_id;
?>