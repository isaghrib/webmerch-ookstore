<h2 class="my-4 text-body">Tambah Pelanggan</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="number" class="form-control" name="telepon">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" class="form-control" name="password">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
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
  echo "<div class='alert alert-danger'>login no telepon</div>";
  echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=pelanggan'>";
}
elseif (empty($_POST["password"])){
  echo "<div class='alert alert-danger'>login password</div>";
  echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=pelanggan'>";
}
  else
{
	$koneksi->query("INSERT INTO pelanggan
		(nama_pelanggan,email_pelanggan,telepon_pelanggan,password_pelanggan)
		VALUES('$_POST[nama]','$_POST[email]','$_POST[telepon]','$_POST[password]')");
	echo "<div class='alert alert-info'>Data tersimpan</div>";
		echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=pelanggan'>";
}}
?>
