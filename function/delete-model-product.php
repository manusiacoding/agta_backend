<?php
    include 'connection.php';

    $id = $_POST['id'];
    $gambar = $_POST['gambar'];

    $query  = "DELETE FROM modelproducts WHERE id_model='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        unlink('../images/'.$gambar);
        echo "Berhasil";
    }else{
        echo "Gagal";
    }
?>