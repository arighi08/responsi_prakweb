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
<title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Form_validation :: w3layouts</title>
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

    <a href="index.html" class="logo">
        <?php echo $username;?>
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
                    <a class="active" href="data_inventaris.php">
                        <i class="fa fa-th"></i>
                        <span>Data Inventaris</span>
                    </a>
                    
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>List per Kategori</span>
                    </a>
                    <ul class="sub">
                        <li><a href="list_bangunan.php">Bangunan</a></li>
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
		<div class="form-w3layouts">
            <!-- page start-->           
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Data Inventaris
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                             </span>
                        </header>
                        <?php
                            include 'koneksi.php';
                            $kode_barang = $_GET['kode_barang'];
                            $data = mysqli_query($konek,"SELECT * FROM inventaris WHERE kode_barang='$kode_barang'");
                            while ($hasil = mysqli_fetch_array($data)){
                        ?>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal" method="post" action="proses_edit_inventaris.php">
                                    <div class="form-group ">
                                        <label for="kode_barang" class="control-label col-lg-3">Kode Barang</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="kode_barang" name="kode_barang" type="text" value="<?php echo $hasil['kode_barang']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="nama_barang" class="control-label col-lg-3">Nama Barang</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="nama_barang" name="nama_barang" type="text" value="<?php echo $hasil['nama_barang']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="jumlah" class="control-label col-lg-3">Jumlah</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="jumlah" name="jumlah" type="text" value="<?php echo $hasil['jumlah']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="satuan" class="control-label col-lg-3">Satuan</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="satuan" name="satuan" type="text" value="<?php echo $hasil['satuan']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="tgl_datang" class="control-label col-lg-3">Tanggal Datang</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="tgl_datang" name="tgl_datang" type="date" value="<?php echo $hasil['tgl_datang']?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                    <label class="col-sm-3 control-label col-lg-3" for="kategori">Kategori</label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" name="kategori">
                                            <option value="Bangunan"<?php if($hasil['kategori']=="Bangunan") :?> selected <?php endif; ?>>Bangunan</option>
                                            <option value="Kendaraan"<?php if($hasil['kategori'] == "Kendaraan") :?> selected <?php endif; ?>>Kendaraan</option>
                                            <option value="Alat Tulis Kantor"<?php if($hasil['kategori'] == "Alat Tulis Kantor") :?> selected <?php endif; ?>>Alat Tulis Kantor</option>
                                            <option value="Elektronik" <?php if($hasil['kategori'] == "Elektronik") :?> selected <?php endif; ?>>Elektronik</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Status</label>
                                        <div class="col-lg-6">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status_barang" id="status_barang1" value="Baik" <?php if($hasil['status_barang'] == "Baik") :?> checked <?php endif; ?>>
                                                    Baik
                                                </label>
                                                <label>
                                                    <input type="radio" name="status_barang" id="status_barang2" value="Perawatan" <?php if($hasil['status_barang'] == "Perawatan") :?> checked <?php endif; ?>>
                                                    Perawatan
                                                </label>
                                                <label>
                                                    <input type="radio" name="status_barang" id="status_barang2" value="Rusak" <?php if($hasil['status_barang'] == "Rusak") :?> checked <?php endif; ?>>
                                                    Rusak
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="harga" class="control-label col-lg-3">Harga Satuan</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="harga" name="harga" type="text" value="<?php echo $hasil['harga']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
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
