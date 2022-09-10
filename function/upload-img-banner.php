<?php
if (!file_exists('../banners')) {
    mkdir('../banners', 0777);
    move_uploaded_file($_FILES['file']['tmp_name'], '../banners/' . $_FILES['file']['name']);
}else{
    move_uploaded_file($_FILES['file']['tmp_name'], '../banners/' . $_FILES['file']['name']);
}  
// echo "success";
die();
?>