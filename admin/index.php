<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","tokomerch");
if (!isset($_SESSION['admin']))
{
  echo "<script>alert('anda harus login');</script>";
  echo "<script>location='login.php';</script>";
  exit();
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin OOK</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">OOK Store</a>
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
                    <li><a  href="index.php"><i class="fa fa-home fa-4x"></i> Home</a></li>
                    <li><a  href="index.php?halaman=produk"><i class="fa fa-dashboard fa-4x"></i> Produk</a></li>
                    <li><a  href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart fa-4x"></i> Pembelian</a></li>
                    <li><a  href="index.php?halaman=pelanggan"><i class="fa fa-users fa-4x"></i> Pelanggan</a></li>
                    <li><a  href="index.php?halaman=konfirmasi"><i class="fa fa-users fa-4x"></i> Konfirmasi</a></li>
                    <li><a  href="index.php?halaman=logout"><i class="fas fa-sign-out-alt fa-4x"></i> Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php
                if(isset($_GET['halaman']))
                 {
                   if ($_GET['halaman']=="produk")
                   {
                    include'produk.php';
                   }
                   elseif ($_GET['halaman']=="pembelian")
                   {
                   include 'pembelian.php';
                   }
                   elseif ($_GET['halaman']=="pelanggan")
                   {
                   include 'pelanggan.php';
                   }
                   elseif ($_GET['halaman']=="konfirmasi")
                   {
                   include 'konfirmasi.php';
                   }
                   elseif ($_GET['halaman']=="tambahproduk")
                   {
                   include 'tambahproduk.php';
                   }
                   elseif ($_GET['halaman']=="hapusproduk")
                   {
                   include 'hapusproduk.php';
                   }
                 elseif ($_GET['halaman']=="ubahproduk")
                   {
                   include 'ubahproduk.php';
                   }
                   elseif ($_GET['halaman']=="tambahpelanggan")
                   {
                   include 'tambahpelanggan.php';
                  }
                  elseif ($_GET['halaman']=="hapuspelanggan")
                   {
                   include 'hapuspelanggan.php';
                  }
                   elseif ($_GET['halaman']=="ubahpelanggan")
                   {
                   include 'ubahpelanggan.php';
                   }
                   elseif ($_GET['halaman']=="hapuspembelian")
                   {
                   include 'hapuspembelian.php';
                  }
                  elseif ($_GET['halaman']=="hapuskonf")
                  {
                  include 'hapuskonf.php';
                  }
                  elseif ($_GET['halaman']=="logout")
                   {
                   include 'logout.php';
                  }
                  elseif ($_GET['halaman']=="detail")
                   {
                   include 'detail.php';
                   }
                 }
                 else
                 {
                    include'home.php';
                 }
                 ?>
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
