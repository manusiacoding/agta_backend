<?php
    include "connection.php";
    $id = $_POST['idcity'];
    $idprovince = $_POST['idprovince'];
    $idsubdistrict = $_POST['idsubdistrict'];

    $tampil=mysqli_query($koneksi, "SELECT * FROM subdistrict WHERE id = '$idsubdistrict' AND province_id='$idprovince' AND city_id='$id'");
    $jml=mysqli_num_rows($tampil);

    if($jml > 0){
        // echo "<option selected>-- Select Province --</option>";

        while($r=mysqli_fetch_array($tampil)){
            echo "<option value=$r[id] selected>$r[subdistrict]</option>";

            $sql=mysqli_query($koneksi, "SELECT * FROM subdistrict WHERE id != '$idsubdistrict' AND province_id='$idprovince' AND city_id='$id'");
            $result=mysqli_num_rows($sql);

            if($result > 0){
                while($data=mysqli_fetch_array($sql)){
                    echo "<option value=$data[id]>$data[subdistrict]</option>";
                }
            }
        }
    }else{
        // echo "<option selected>- Data Wilayah Tidak Ada, Pilih Yang Lain -</option>";
        exit;
    }
?>
