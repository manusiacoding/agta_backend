<?php 
	$koneksi = mysqli_connect("localhost", "root", "", "agta");
	$data_transaksi = mysqli_query($koneksi,"SELECT * FROM transactions WHERE status='0'");

	$jumlah_transaksi = mysqli_num_rows($data_transaksi);
?>
