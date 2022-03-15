<?php
$ambil = $koneksi->query("SELECT * FROM Konfirmasi WHERE id_konf= '$_GET[id]'");
$konf = $ambil->fetch_assoc();
$fotoproduk = $konf['foto_produk'];
if (file_exists("../foto_produk/$fotoproduk"))
{
	unlink("../foto_produk/$fotoproduk");
}

$koneksi->query("DELETE FROM Konfirmasi WHERE id_konf='$_GET[id]'");
echo "<script>alert('terhapus');</script>";
echo "<script>location='index.php?halaman=konfirmasi';</script>";
?>
