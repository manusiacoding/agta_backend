<?php
    include 'connection.php';

    $id = $_POST['ids'];

    $query  = "DELETE FROM users WHERE id_user='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Berhasil";
    }else{
        echo "Gagal";
    }
?>