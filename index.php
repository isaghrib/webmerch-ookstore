<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>OOK Store</title>
	<link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" />
	 <!-- FONTAWESOME STYLES-->
	<link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
			<!-- CUSTOM STYLES-->
	<link href="admin/assets/css/custom.css" rel="stylesheet" />
	 <!-- GOOGLE FONTS-->
 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
 <link href="admin/assets/vendor/shop-homepage.css" rel="stylesheet"/>
 <style>
  .border {
    display: inline-block;
    width: 70px;
    height: 70px;
    margin: 6px;
  }
  </style>
</head>
<body>
<!--navbar-->
<?php include 'navbar.php';?>
<!--konten-->
<section class="konten">
	<div class="container">
		<h1 class="my-4">Produk Terbaru</h1>
<div class="row">
			<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){?>
			    <div class="col-lg-3 col-md-4  mb-4">
			      <div class="card h-100">
			        <a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>"><img  style="height:200px" class="card-img-top" src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt=""></a>
			        <div class="card-body">
			          <h5 class="card-title">
			            <a href="detail.php?id=<?php echo $perproduk["id_produk"]; ?>"><?php echo $perproduk['nama_produk']; ?></a></h5>
									<p>Rp. <?php echo number_format($perproduk['harga_produk']); ?></p>
									<a href="beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-primary">Beli</a>
			        </div>
			      </div>
			    </div>
			<?php } ?>
	</div>
	</div>
</section>
</body>
</html>
