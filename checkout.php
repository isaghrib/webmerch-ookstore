<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('silahkan login');</script>";
	echo "<script>location='login1.php';</script>";
}
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
    </head>
    <body>
    <!--navbar-->
<?php include 'navbar.php';?>


<section class="konten">
	<div class="container">
		<h1 class="my-4">Selesaikan Belanja Anda</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>

				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $totalbelanja = 0; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):?>
				<!--menampilkan produk yang sedang diperulangkan berdasarkan id_produk-->
				<?php
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$pecah = $ambil-> fetch_assoc();
				$subharga = $pecah["harga_produk"]*$jumlah;

				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>

				</tr>
				<?php $nomor++; ?>
				<?php $totalbelanja+=$subharga; ?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th>Rp. <?php echo number_format($totalbelanja) ?></th>
				</tr>
			</tfoot>
		</table>


		<form method="post">
			<div class="form-group">
							<textarea  class="form-control" name="catatan" placeholder="Catatan Pembelian seperti ukuran atau warna"></textarea>
			</div>
			Isi Alamat
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
				<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
			</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
				<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
			</div>
				</div>
				<div class="col-md-4">
					<select required class="form-control" name="id_ongkir">
						<option value="">Pilih ongkos kirim</option>
						<?php
						$ambil = $koneksi->query("SELECT * FROM ongkir");
						while($perongkir = $ambil->fetch_assoc()){
						 ?>
						<option value="<?php echo $perongkir["id_ongkir"] ?>">
							<?php echo $perongkir['nama_kirim'] ?>
							Rp. <?php echo number_format($perongkir['tarif']) ?>
						</option>
						<?php } ?>
					</select>
				</div>

				<div class="col-md-3">
					<select  required class ="form-control" name="prov">
						<option value="">Pilih Provinsi</option>
						<option value="Jakarta Utara">Jakarta Utara</option>
						<option value="Jakarta Timur">Jakarta Timur</option>
						<option value="Jakarta Barat">Jakarta Barat</option>
						<option value="Jakarta Pusat">Jakarta Pusat</option>
						<option value="Jakarta Selatan">Jakarta Selatan</option>
						</select>
						</div>
				<div class="col-md-3">
					<input type="text" required class="form-control" name="kec" placeholder="Kecamatan">
					</div>
					<div class="col-md-3">
						<input type="text" required class="form-control" name="kel" placeholder="Kelurahan">
						</div>
						<div class="col-md-3">
							<input type="text" required class="form-control" name="kdpos" placeholder="Kode Pos">
							</div>
			</div>
<br>
			<div class="form-group">
							<textarea  required class="form-control" name="alamat" placeholder="Alamat selanjutnya"></textarea>
			</div>
			<button class="btn btn-primary" name="checkout">Checkout</button>
		</form>
<?php
if (isset($_POST["checkout"]))
{
	if (empty($_POST["id_ongkir"])){
    echo "<div class='alert alert-danger'>Pilih Ongkir</div>";
    echo "<meta http-equiv='refresh' content='l;url=checkout.php'>";
	}elseif  (empty($_POST["alamat"])){
    echo "<div class='alert alert-danger'>Isi Alamat</div>";
    echo "<meta http-equiv='refresh' content='l;url=checkout.php'>";
	}else{
	$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
	$id_ongkir = $_POST["id_ongkir"];
	$tanggal_pembelian = date("Y-m-d");
	$spc = ' ';
	$kel = $_POST['kel'];
	$kec = $_POST['kec'];
	$prov = $_POST['prov'];
	$kdpos = $_POST['kdpos'];
	$alamat1 = $_POST['alamat'];
	$alamat= $alamat1 .$spc. $kel .$spc. $kec .$spc. $prov .$spc. $kdpos;

	$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
	$arrayongkir = $ambil->fetch_assoc();
	$nama_kirim = $arrayongkir['nama_kirim'];
	$tarif = $arrayongkir['tarif'];
	$catatanbel = $_POST['catatan'];
	$total_pembelian = $totalbelanja + $tarif;

	$koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kirim,tarif,alamat,catatanbel)
		VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kirim','$tarif','$alamat','$catatanbel') ");

	$id_pembelian_barusan = $koneksi->insert_id;

	foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
	{
		$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
		$perproduk=$ambil->fetch_assoc();
		$nama=$perproduk['nama_produk'];
		$harga=$perproduk['harga_produk'];



		$subharga=$perproduk['harga_produk']*$jumlah;
		$koneksi->query("INSERT INTO nota (id_pembelian,id_produk,nama,subharga,jumlah)
			VALUES ('$id_pembelian_barusan','$id_produk','$nama','$subharga','$jumlah')");
	}
	unset($_SESSION["keranjang"]);

	echo "<script>alert('pembelian sukses');</script>";
	echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
}}

 ?>
	</div>
</section>
</body>
</html>
