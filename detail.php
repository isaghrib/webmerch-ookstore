<?php session_start(); ?>
<?php include 'koneksi.php'; ?>
<?php
$id_produk=$_GET["id"];
$ambil= $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
 $detail= $ambil->fetch_assoc();

 ?>
 <!DOCTYPE html>
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
     p.dotted {border-style: dotted;}
     </style>
     </head>

     <body>
<?php include 'navbar.php';?>

<section class="kontent">
	<div class="container">
    <h1 class="my-4"><?php echo $detail["nama_produk"] ?>
      </h1>
      <div class="row">
          <div class="col-md-4">
            <img class="img-fluid" src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt=""  class="img-fluid" style="width:300px">
          </div>
          <div class="col-md-5">
            <h3 >Deskripsi</h3><br>
            <p class="dotted"><?php echo $detail["deskripsi_produk"];?></p>
            <h5><kbd>Harga Rp.<?php echo number_format($detail["harga_produk"]);?></kbd></h5>
				<form method="post">
					<div class="form-group">
						<div class="input-group">
              <select class="form-control" name="jumlah">
    						<option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                </select>						
								<button class="btn btn-primary" name="beli">Beli</button>
              </div>
						</div>
					</div>
          	</div>

				</form>

				<?php
				if (isset($_POST["beli"]))
        {
                $jumlah= $_POST["jumlah"];
                $_SESSION["keranjang"][$id_produk]+=$jumlah;
					echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
					echo "<script>location='keranjang.php';</script>";
				}
				?>

</section>

</body>
</html>
