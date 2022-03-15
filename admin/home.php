<h2 class="text-body my-4">HI Admin</h2>
                <h5>Welcome Back!</h5>
                <br>
<button type="button" class="btn btn-outline-light text-dark" data-toggle="collapse" data-target="#daftar">Tambah Admin</button>
<br>
<div id="daftar" class="collapse col-4">
            <form method="post">
                <div class="form-group input-group">
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" />
            </div>
            <form method="post">
                <div class="form-group input-group">
                <input type="text" class="form-control" name="user" placeholder="Username" />
            </div>

            <div class="form-group input-group">
                <input type="password" class="form-control"  name="pass" placeholder="Password"/>
            </div>

         <button class="btn btn-primary btn-block" name="save">Simpan</button>
         <?php
         if (isset($_POST['save'])){
           $koneksi->query("INSERT INTO admin
         		(username,nama_lengkap,password)
         		VALUES('$_POST[nama]','$_POST[user]','$_POST[pass]')");
         	echo "<div class='alert alert-info'>Data tersimpan</div>";
        }
