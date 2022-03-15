<?php session_start();
include 'koneksi.php'; ?>
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
    </head>
    <body>
    <!--navbar-->
<?php include 'navbar.php';?>

<section class="konten">
	<div class="container">
		<h1 class="text-body my-4 text-center">Detail Pembelian</h1>
<?php
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan
	ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil->fetch_assoc();
?>
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<strong>No. pembelian: <?php echo $detail['id_pembelian'] ?></strong><br>
		Tanggal: <?php echo $detail['tanggal_pembelian']; ?><br>
		Total: Rp. <?php echo number_format($detail['total_pembelian']) ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_pelanggan']; ?></strong><br>
		<?php echo $detail['telepon_pelanggan'];?><br>
		<?php echo $detail['email_pelanggan'];?>

	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['nama_kirim'] ?></strong><br>
		Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']); ?><br>
		Alamat: <?php echo $detail['alamat'] ?>
	</div>
</div>
<br>
<table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
    <?php $total = 0; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM nota join produk on nota.id_produk=produk.id_produk WHERE nota.id_pembelian='$_GET[id]'"); ?>
 		<?php while($pecah=$ambil->fetch_assoc()) { ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama_produk']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
 		</tr>
 		<?php $nomor++; ?>
    <?php $total+=$pecah['subharga'] ?>
 		<?php } ?>
 	</tbody>
  <tfoot>
    <tr>
      <th colspan="4">Total Belanja</th>
      <th>Rp. <?php echo number_format($total) ?></th>
    </tr></tfoot>
 </table>
<div class="row">
	<div class="col-md-8">
		<div class="alert alert-info">
			<p>
				Silahkan melakukan pembayaran sejumlah Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br><br>
        <img src="https://logos-download.com/wp-content/uploads/2017/03/BCA_logo_Bank_Central_Asia.png" style="width:220px;height:100px;">
      	<strong>BANK BCA 6281269973 AN. Toko OOK Store</strong><br>
        <img src="https://logos-download.com/wp-content/uploads/2016/06/Mandiri_logo.png" style="width:220px;height:100px;">
        <strong>BANK Mandiri 121-0011-258593 AN. Toko OOK Store</strong><br>
        Untuk Konfirmasi Pembayaran
        <a class="btn btn-info" href="konfirmasi.php" target="_blank">Konfirmasi</a>
			</p>
	</div>
  </div>
	</div>
</section>
</body>
</html>
