<?php session_start();
include 'koneksi.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OOK Store</title>
    <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="admin/assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="admin/assets/vendor/shop-homepage.css" rel="stylesheet"/>
    </head>
    <body>
    <!--navbar-->
<?php include 'navbar.php';?>

<div class="container">
					<h1 class="my-4 text-center">Konfirmasi Pembayaran Anda</h1>
							<form class="form" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>No Pembelian</label>
		<input required type="number" class="form-control" name="id" >
	</div>
	<div class="form-group">
		<label>Nama Pemilik Rekening</label>
		<input required type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input required type="text" class="form-control" name="email">
	</div>
  <div class="form-group">
    <label>Bank</label>
    <select class="form-control" name="bank">
      <option value="bca">BCA</option>
      <option value="mandiri">Mandiri</option>
    </select>
  </div>
  <div class="form-group">
    <label>Bukti Pembayaran</label>
    <input required type="file" class="form-control" name="foto">
  </div>

	<button class="btn btn-outline-primary" name="save">Konfirmasi</button>
</form>
<br>
<?php
if (isset($_POST['save'])){
  $nama = $_FILES['foto']['name'];
  $lokasi =$_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasi,"foto_produk/". $nama);

  $koneksi->query("INSERT INTO Konfirmasi
  		(id_konf,nama_konf,email_konf,bank,file_konf)
  		VALUES('$_POST[id]','$_POST[nama]','$_POST[email]','$_POST[bank]', '$nama')");
	echo "<script>alert('Konfirmasi berhasil silahkan cek email!');</script>";
		echo "<meta http-equiv='refresh' content='konfirmasi.php'>";
}
?>
</body>
</html>
