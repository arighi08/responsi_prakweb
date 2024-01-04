<?php
    include 'koneksi.php';

    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $tgl_datang = $_POST['tgl_datang'];
    $kategori = $_POST['kategori'];
    $status_barang = $_POST['status_barang'];
    $harga = $_POST['harga'];

    $query = mysqli_query($konek, "UPDATE inventaris SET kode_barang='$kode_barang', nama_barang='$nama_barang', jumlah='$jumlah',
    satuan='$satuan', tgl_datang='$tgl_datang', kategori='$kategori', status_barang='$status_barang', harga='$harga' 
    WHERE kode_barang='$kode_barang'");
    if ($query){
        header("location:data_inventaris.php");
    }
    else{
        echo "Data Gagal Diubah";
    }
?>