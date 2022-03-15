<?php
session_start();
$koneksi=new mysqli("localhost","root","","tokomerch");
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
    <body background="https://wallpapercave.com/wp/wp1852620.jpg">
    <!--navbar-->
<?php include 'navbar.php';?>

    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <h1 class="my-4"> Masuk </h1>
            </div>
        </div>
         <div class="row justify-content-center align-items-center" style="height:40vh">
              <div class="col-4">
              <div class="card">
              <form method="post">
              <div class="card-body">
              <form method="post">
              <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="Email" />
              </div>
              <div class="form-group input-group">
              <input type="password" class="form-control"  name="pass" placeholder="Password"/>
              </div>
              <div class="form-group">
              <label class="checkbox-inline">
              <input type="checkbox" /> Ingat saya
              </label>
              </div>
              <button class="btn btn-primary btn-block" name="login" >Login</button>
                <hr />
                    Tidak terdaftar? <a href="daftarpelanggan.php" >Klik disini </a>
                  </form>
                          <?php
															if (isset($_POST["login"]))
																{
																	$email = $_POST["email"];
																		$password = $_POST["pass"];
																		$ambil =$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
																		$akunyangcocok = $ambil->num_rows;
																		if ($akunyangcocok==1)
																		{
																		$akun = $ambil->fetch_assoc();
																		$_SESSION["pelanggan"]=$akun;
																		echo "<script>alert('anda sukses login');</script>";
																		echo "<script>location='index.php';</script>";
																		}
																		else
																		{
																		echo "<script>alert('anda gagal login, periksa akun anda');</script>";
																		echo "<script>location='login1.php';</script>";
								  									}
																		}
                                    ?>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
