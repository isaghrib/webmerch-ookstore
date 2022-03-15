<h2 class="my-4 text-body">Data Konfirmasi</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No pembelian</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Bank</th>
			<th>Foto</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM Konfirmasi");?>
    <?php while($konf=$ambil->fetch_assoc()){ ?>
      <tr>
  			<td><?php echo $konf['id_konf']; ?></td>
  			<td><?php echo $konf['nama_konf'];?></td>
  			<td><?php echo $konf['email_konf'];?></td>
  			<td><?php echo $konf['bank'];?></td>
  			<td>
  				<a href="../foto_produk/<?php echo $konf['file_konf']?>" target="_blank">
						<img src="../foto_produk/<?php echo $konf['file_konf']?>" width="100"></a>
  			</td>
  			<td>
  				<a href="index.php?halaman=hapuskonf&id=<?php echo $konf['id_konf'];?>" class="btn-danger btn">Hapus</a>
  			</td>
  		</tr>
  		<?php $nomor++; ?>
  		<?php }?>
    </tbody>
  </table>
