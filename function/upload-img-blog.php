<?php
if (!file_exists('../blogs')) {
    mkdir('../blogs', 0777);
    move_uploaded_file($_FILES['file']['tmp_name'], '../blogs/' . $_FILES['file']['name']);
}else{
    move_uploaded_file($_FILES['file']['tmp_name'], '../blogs/' . $_FILES['file']['name']);
}  
// echo "success";
die();
?>