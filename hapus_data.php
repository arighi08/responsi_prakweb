<?php
    include 'koneksi.php';
    $kode_barang = $_GET['kode_barang'];
    $query = mysqli_query($konek, "DELETE FROM inventaris WHERE kode_barang='$kode_barang'");

    if($query){
        header("location:data_inventaris.php");
    }
    else{
        echo "Data gagal dihapus!"; 
    }
?>