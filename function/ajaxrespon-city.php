<?php
    include "connection.php";
    $id = $_POST['idprovince'];

    $tampil=mysqli_query($koneksi, "SELECT * FROM city WHERE province_id='$id'");
    $jml=mysqli_num_rows($tampil);

    if($jml > 0){
        echo "<option selected>-- Select City --</option>";

        while($r=mysqli_fetch_array($tampil)){
            echo "<option value=$r[id]>$r[city]</option>";
        }
    }else{
        // echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
        exit;
    }
?>
