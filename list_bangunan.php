<?php
  session_start();
  $username = $_SESSION['username'];
  if (empty($_SESSION['username'])){
    header("location:login.php?pesan=belum_login");
  }
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Kategori Bangunan</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="index.php" class="logo">
        <?php echo $username ?>
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <div class="judul">
        <center><h2>Aplikasi Inventaris Berbasis Web</h2></center>
    </div>
    <ul class="nav pull-right top-menu">
        <!-- user logout dropdown start-->
        <li class="extended">
                <a href="login.php"><i class="fa fa-key"></i> Log Out</a>
        </li>
        <!-- user logout dropdown end -->
    </ul>
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="data_inventaris.php">
                        <i class="fa fa-th"></i>
                        <span>Data Inventaris</span>
                    </a>
                    
                </li>
                <li class="sub-menu">
                    <a class="active" href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>List per Kategori</span>
                    </a>
                    <ul class="sub">
                        <li><a class="active" href="list_bangunan.php">Bangunan</a></li>
                        <li><a href="list_kendaraan.php">Kendaraan</a></li>
						<li><a href="list_alat_tulis.php">Alat Tulis Kantor</a></li>
                        <li><a href="list_elektronik.php">Elektronik</a></li>
                    </ul>
                </li>
                
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        <div class="col-6">
            <a class="btn btn-success" class="btn btn-primary" href="tambah_inventaris.php" role="button"><i class="icon_plus_alt2"></i>Tambah</a> 
        </div>
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th>No</th>
            <th>Kode barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Tanggal Datang</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'koneksi.php';
            $query = mysqli_query($konek, "SELECT * FROM inventaris WHERE kategori IN ('Bangunan')");
            $nomor = 0;
            $total_harga = 0;
            $total_inventaris = 0;
            while($data=mysqli_fetch_array($query))
            {$nomor++;
            $total_harga = $data['jumlah'] * $data['harga'];
            $total_inventaris += $total_harga;
            $harga = "Rp. " . number_format($data['harga'], 2, ",",".");
            $total_harga = "Rp. " . number_format($total_harga, 2, ",",".");
            ?>
            <tr>
              <th><?php echo $nomor?></th>
              <th><?php echo $data['kode_barang'];?></th>
              <th><?php echo $data['nama_barang'];?></th>
              <th><?php echo $data['jumlah'];?></th>
              <th><?php echo $data['satuan'];?></th>
              <th><?php echo $data['tgl_datang'];?></th>
              <th><?php echo $data['kategori'];?></th>
              <th><?php echo $data['status_barang'];?></th>
              <th><?php echo $harga;?></th>
              <th><?php echo $total_harga?></th>
              <th><a class="btn btn-success" href=edit_data.php?kode_barang=<?php echo $data['kode_barang'];?>><i>Edit</i></a> 
              <a class="btn btn-danger" href=hapus_data.php?kode_barang=<?php echo $data['kode_barang'];?> onclick="return confirm('Yakin Ingin Menghapus <?php echo $data['nama_barang'];?>?')"><i>Hapus</i></a>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <b>Total Inventaris = <?php echo " Rp. " . number_format($total_inventaris, 2, ",", ".");?></b>
    </div>
  </div>
</div>
</section>
 <!-- footer -->
 <div class="footer">
    <div class="wthree-copyright">
      <p>© 2021 Responsi Praktikum Web | Design by <a href="http://w3layouts.com">W3layouts</a></p>
    </div>
  </div>
<!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
