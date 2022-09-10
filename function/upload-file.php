<?php
$oldfoto = $_POST['oldfoto'];

if (!file_exists('../images')) {
    mkdir('../images', 0777);
    move_uploaded_file($_FILES['file']['tmp_name'], '../images/' . $_FILES['file']['name']);
    
    // if(!file_exists('../images/'.$_FILES['file']['tmp_name'][0])){
    //     unlink('../images/'.$oldfoto);
    //     move_uploaded_file($_FILES['file']['tmp_name'], '../images/' . $_FILES['file']['name']);
    // }
}else{
    move_uploaded_file($_FILES['file']['tmp_name'], '../images/' . $_FILES['file']['name']);
}  
// echo "success";
die();
?>