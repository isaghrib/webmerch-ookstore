<?php
session_start();
$koneksi=new mysqli("localhost","root","","tokomerch");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css' />
<link href="assets/vendor/shop-homepage.css" rel="stylesheet"/>
</head>

<body background="https://wallpapercave.com/wp/wp1852620.jpg">
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br />
                <a><img src="https://fontmeme.com/permalink/190902/caf6940d58a82d3e9c9688cec900f191.png" alt="lobster-font" border="0" width="345"></a>
                 <br/>
            </div>
        </div>
         <div class="row justify-content-center align-items-center" style="height:40vh">
           <div class="col-4">
               <div class="card">
                 <form method="post">
                   <div class="card-body">
                       <form method="post">
                           <div class="form-group">
                           <input type="text" class="form-control" name="user" placeholder="Username" />
                       </div>
                       <div class="form-group input-group">

                           <input type="password" class="form-control"  name="pass" placeholder="Password"/>
                       </div>
                   <div class="form-group">
                           <label class="checkbox-inline">
                               <input type="checkbox" /> Ingat saya
                           </label>
                       </div>
                    <button class="btn btn-primary btn-block" name="login">Login</button>
                                    </form>
                                    <?php
                                    if (isset($_POST['login']))
                                    {
                                      $ambil=$koneksi->query("SELECT*FROM admin WHERE username ='$_POST[user]'AND password='$_POST[pass]'");
                                     $yangcocok=$ambil->num_rows;
                                     if ($yangcocok==1)
                                     {
                                       $_SESSION['admin']=$ambil->fetch_assoc();
                                       echo "<div class='alert alert-info'>login sukses</div>";
                                       echo"<meta http-equiv='refresh'content='1;url=index.php'>";

                                     }
                                     else
                                     {
                                       echo "<div class='alert alert-danger'>login gagal</div>";
                                       echo"<meta http-equiv='refresh'content='1;url=login.php'>";
                                     }
                                    }
                                    ?>
                            </div>

                        </div>
                    </div>
        </div>
    </div>
     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
