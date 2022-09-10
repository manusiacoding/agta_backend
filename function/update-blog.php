<?php
include 'connection.php';
$id = $_POST['id'];
$oldfoto = $_POST['oldfoto'];
$judul = $_POST['judul'];
$content = $_POST['content'];
$author = $_POST['author'];
$status = $_POST['status'];
// $gambar = $_POST['gambar'];
if(isset($_POST['gambar']) == ""){
    $gambar = $oldfoto;
}else{
    $gambar = $_POST['gambar'];
}

$now = new DateTime();
$tanggal = $now->format('Y-m-d H:i:s');

$sql = "UPDATE `blog` SET `judul`='$judul',`isi`='$content',`tanggal_upload`='$tanggal',`author`='$author',`gambar`='$gambar',`status`='$status' WHERE id_blog='$id'";
if (mysqli_query($koneksi, $sql)) {
    echo json_encode(array("statusCode"=>200));
    // unlink('../blogs/'.$oldfoto);
    if(file_exists('../images/'.$gambar)){
        unlink('../images/'.$oldfoto);
    }
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($koneksi);
?>