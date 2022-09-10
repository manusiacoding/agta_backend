<?php
    include 'connection.php';

    $id = $_POST['ids'];

    $sql = "SELECT gambar_produk FROM model_products WHERE id_produk='$id'";
    $result = mysqli_query($koneksi, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        unlink('../images/'.$row['gambar_produk']);
    }

    $query  = "DELETE FROM products WHERE id_produk='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Berhasil";
    }else{
        echo "Gagal";
    }
?>