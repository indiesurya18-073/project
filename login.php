<?php

session_start();

require_once("koneksi.php");

include 'navbar.php';
if (isset($_SESSION["user"])) header("Location: index.php");
if (isset($_POST['login'])) {

	$ambil = $koneksi->query("SELECT * FROM user WHERE username='$_POST[username]' AND password='$_POST[password]'");
	$akunyangcocok = $ambil->num_rows;

	if($akunyangcocok==1){
        $akun= $ambil->fetch_assoc();
        $_SESSION['user'] = $akun;
        echo "<script>alert('Login Berhasil');</script>";
        if(isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])){
        echo "<script>location='checkout.php'</script>";
      }
      else{
        echo "<script>location='index.php'</script>";
      }
    }
    else{
        echo "<script>alert('Anda Gagal Login');</script>";
        echo "<script>location='login.php'</script>";
    }
     }
?>

<body>
	<br>
	<div class="card mx-auto d-block" style="width: 520px; height: 350px;">
		<div class="card mx-auto d-block border-0" style="width: 500px; height: 330px;">
			<br>
			<h3 class="text-center ">Login</h3>
			<br>
			<form action="" name="login" method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" type="text" name="username" placeholder="Username atau email" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" type="password" name="password" placeholder="Password" />
				</div>
				<input type="submit" class="btn btn-success btn-block" onclick="validasi()" name="login" value="Masuk" />

			</form>
		</div>
	</div>

	<script>
	
		function validasi() {
			if (document.forms["register"]["username"].value != "") {
				if (document.forms["register"]["password"].value != "") {
					alert("Semua data terisi dengan benar");
					document.getElementById("login").submit();
					return true;
				} else {
					alert("Password tidak boleh kosong");
					return false;
				}
			} else {
				alert("Username masih kosong");
				return false;
			}
		}
	</script>
</body>

</html>
