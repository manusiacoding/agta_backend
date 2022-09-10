<?php
include 'connection.php';

    $sql = "SELECT * FROM transactions WHERE status='2'";

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
    // echo json_encode($json, JSON_PRETTY_PRINT);
?>