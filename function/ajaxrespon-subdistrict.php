<?php
    include "connection.php";
    $id = $_POST['idprovince'];
    $idcity = $_POST['idcity'];

    $tampil=mysqli_query($koneksi, "SELECT * FROM subdistrict WHERE province_id='$id' AND city_id='$idcity'");
    $jml=mysqli_num_rows($tampil);

    if($jml > 0){
        echo "<option selected>-- Select Sub District --</option>";

        while($r=mysqli_fetch_array($tampil)){
            echo "<option value=$r[id]>$r[subdistrict]</option>";
        }
    }else{
        // echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
        exit;
    }
?>
