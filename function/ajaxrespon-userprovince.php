<?php
    include "connection.php";
    $id = $_POST['idprovince'];

    $tampil=mysqli_query($koneksi, "SELECT * FROM province WHERE id = '$id'");
    $jml=mysqli_num_rows($tampil);

    if($jml > 0){
        // echo "<option selected>-- Select Province --</option>";

        while($r=mysqli_fetch_array($tampil)){
            echo "<option value=$r[id] selected>$r[province]</option>";

            $sql=mysqli_query($koneksi, "SELECT * FROM province WHERE id != '$id'");
            $result=mysqli_num_rows($sql);

            if($result > 0){
                while($data=mysqli_fetch_array($sql)){
                    echo "<option value=$data[id]>$data[province]</option>";
                }
            }
        }
    }else{
        // echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
        exit;
    }
?>
