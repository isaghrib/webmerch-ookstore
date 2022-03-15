<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
	<ul class="nav navbar-nav">
		<li><a class="nav-link" href="index.php ">Home</a></li>
		<li><a  class="nav-link" href="keranjang.php">Keranjang</a></li>
		<?php  if (isset($_SESSION["pelanggan"])):?>
			<li><a  class="nav-link" href="logout.php">Logout</a></li>
		<?php  else: ?>
			<li><a  class="nav-link" href="login1.php">Login</a></li>
			<?php  endif?>
		<li><a  class="nav-link" href="konfirmasi.php">Konfirmasi Pembayaran</a></li>
		<li><a hidden class="nav-link" href="modal1.html" data-toggle="modal" data-target="#onphpidLogin">Login baru</a></li>
	</ul>
	</div>
</nav>
