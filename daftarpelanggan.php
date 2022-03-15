<?php
session_start();
$koneksi = new mysqli("localhost","root","","tokomerch");
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

      <?php include 'navbar.php';?>


<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel -heading">
					<h3 class="my-4">Daftar</h3>
				</div>
				<div class="panel -body">
					<form method="post">
						<div class="panel-body">
							<form method="post">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">

	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" name="email" placeholder="Masukkan Email">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="number" class="form-control" name="telepon" placeholder="Masukkan nomor telepon">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" class="form-control" name="password" placeholder="Password">
	</div>
	<button class="btn btn-primary" name="save">Daftar</button>
</form>
<?php
if (isset($_POST['save'])){
  if (empty($_POST["nama"])){
    echo "<div class='alert alert-danger'>Isi Nama</div>";
    echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=pelanggan'>";
}
elseif (empty($_POST["email"])){
  echo "<div class='alert alert-danger'>Isi Email</div>";
  echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=pelanggan'>";
}
elseif  (empty($_POST["telepon"])){
  echo "<div class='alert alert-danger'>Isi no telepon</div>";
  echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=pelanggan'>";
}
elseif (empty($_POST["password"])){
  echo "<div class='alert alert-danger'>Isi password</div>";
  echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=pelanggan'>";
}
  else
{
  $koneksi->query("INSERT INTO pelanggan
  		(nama_pelanggan,email_pelanggan,telepon_pelanggan,password_pelanggan)
  		VALUES('$_POST[nama]','$_POST[email]','$_POST[telepon]','$_POST[password]')");
      echo "<script>alert('Daftar berhasil, silahkan login');</script>";
      echo "<script>location='login1.php';</script>";
}}
?>

</body>
</html>
