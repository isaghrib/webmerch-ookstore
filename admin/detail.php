<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
	ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
 ?>
 <h2 class="my-4 text-body">Detail Pembelian</h2>
 <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
 <p>
 	<?php echo $detail['telepon_pelanggan']; ?> <br>
 	<?php echo $detail['email_pelanggan']; ?>
 </p>

 <p>
	No Pembelian : <?php echo $detail['id_pembelian']; ?><br>
	Jenis Pengiriman : <?php echo $detail['nama_kirim'];?> <br>
	Tarif	: Rp. <?php echo number_format( $detail['tarif']);?> <br>
 	Tanggal Pembelian:	<?php echo $detail['tanggal_pembelian']; ?> <br>
 	Total  :	Rp. <?php echo number_format ($detail['total_pembelian']); ?><br>
	Alamat: <?php echo $detail['alamat'] ?>
 </p>

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama produk</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM nota JOIN produk ON nota.id_produk=produk.id_produk
 		WHERE nota.id_pembelian='$_GET[id]'"); ?>
 		<?php while($pecah=$ambil->fetch_assoc()) { ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama_produk']; ?></td>
 			<td><?php echo number_format ($pecah['harga_produk']); ?></td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td>
 				<?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?>
 			</td>
 		</tr>
 		<?php $nomor++; ?>
 		<?php } ?>
 	</tbody>
 </table>
<a href="index.php?halaman=pembelian" class="btn btn-info">Kembali</a>
