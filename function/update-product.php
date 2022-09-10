<?php
include 'connection.php';
$id = $_POST['id'];
$idmodel = $_POST['idmodel'];
$oldfoto = $_POST['oldfoto'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$jenis = $_POST['jenis'];
$model = $_POST['model'];
$stock = $_POST['stock'];
$berat = $_POST['berat'];
$size = $_POST['size'];
// $gambar = $_POST['gambar'];

if(isset($_POST['gambar']) == ""){
    $gambar = $oldfoto;
}else{
    $gambar = $_POST['gambar'];
}

$now = new DateTime();
$tanggal = $now->format('Y-m-d H:i:s');

$sql = "UPDATE products, modelproducts SET products.id_produk='$id', products.nama_produk='$nama', products.harga_produk='$harga', products.deskripsi_produk='$deskripsi', products.jenis_produk='$jenis', products.updated_at='$tanggal', modelproducts.nama_model='$model', modelproducts.stok_produk='$stock', modelproducts.berat_produk='$berat', modelproducts.ukuran_produk='$size', modelproducts.gambar_produk='$gambar', modelproducts.updated_at='$tanggal' WHERE products.id_produk ='$id' AND modelproducts.id_model='$idmodel'";
if (mysqli_query($koneksi, $sql)) {
    echo json_encode(array("statusCode"=>200));
    // unlink('../images/'.$oldfoto);
    
    if(file_exists('../images/'.$gambar)){
        unlink('../images/'.$oldfoto);
    }
} 
else {
    echo json_encode(array("statusCode"=>201));
}
mysqli_close($koneksi);
?>