<?php
    include 'connection.php';

    $id = $_POST['ids'];

    $sql = "SELECT gambar FROM blog WHERE id_blog='$id'";
    $result = mysqli_query($koneksi, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        unlink('../blogs/'.$row['gambar']);
    }

    $query  = "DELETE FROM blog WHERE id_blog='$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Berhasil";
    }else{
        echo "Gagal";
    }
?>