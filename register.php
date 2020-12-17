<?php
session_start();
include("navbar.php");

if(isset($_POST['register'])){
          //mengambil isi dari inputan user
          $name = $_POST['name'];
          $email = $_POST['email'];
          $username = $_POST['username'];
          $password = $_POST['password'];
          $level = "user";
          $tlp = $_POST['tlp'];
          $alamat = $_POST['alamat'];
          //cek apakah email username, dan nomor telepon sudah ada
          $ambil1 = $koneksi->query("SELECT * FROM  user WHERE email='$email'");
          $sama1 = $ambil1->num_rows;
          if($sama1==1){
              echo "<script>alert('Gagal registrasi, email sudah pernah digunakan')</script>";
              echo "<script>location='register.php'</script>";
          }else{
                $ambil2 = $koneksi->query("SELECT * FROM  user WHERE username='$username'");
                $sama2 = $ambil2->num_rows;
                if($sama2==1){
                    echo "<script>alert('Gagal registrasi, username sudah pernah digunakan')</script>";
                    echo "<script>location='register.php'</script>";
                }else{
                    $ambil3 = $koneksi->query("SELECT * FROM  user WHERE tlp_user='$tlp'");
                    $sama3 = $ambil3->num_rows;
                    if($sama3==1){
                        echo "<script>alert('Gagal registrasi, Nomor Telepon sudah pernah digunakan')</script>";
                        echo "<script>location='register.php'</script>";
                    }else{
                        //masukan ke dalam database
                        $koneksi->query("INSERT INTO user (name,username, email,password,alamat_user,tlp_user,level) VALUES ('$name','$username','$email','$password','$alamat','$tlp','$level')");
                        echo "<script>alert('Registrasi berhasil!!, silahkan login')</script>";
                        echo "<script>location='login.php'</script>";
                    }
                }
            }
      }
?>

<body>
	<br>
	<div class="card mx-auto d-block" style="width: 520px; height: 480px;">
		<div class="card mx-auto d-block border-0 create-post-wrapper" style="width: 500px; height: 460px;">
			<br>
			<h3 class="text-center ">Register</h3>
			<form action="" name="register" method="POST">

				<div class="form-group">
					<label for="name">Nama Lengkap</label>
					<input class="form-control post-input" type="text" name="name" placeholder="Nama kamu" />
				</div>

				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control post-input" type="text" name="username" placeholder="Username" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control post-input" type="password" name="password" placeholder="Password" />
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input class="form-control post-input" type="email" name="email" placeholder="Alamat Email" />
				</div>

				<div class="form-group">
					<label for="tlp">Nomer Telepon</label>
					<input class="form-control post-input" type="text" name="tlp" placeholder="Nomer Telepon" />
				</div>

				<div class="form-group">
					<label for="alamat">Alamat</label>
					<textarea name="alamat" class="form-control" required cols="30" rows="5"></textarea>
				</div>
				<input type="submit" class="btn post-btn btn-success btn-block" onclick="validasi()" name="register" value="Daftar" />

			</form>
		</div>
	</div>
	<script>
	function validasi() {
		if (document.forms["register"]["name"].value != "") {
			if (document.forms["register"]["username"].value != "") {
				if (document.forms["register"]["email"].value != "") {
					if (document.forms["register"]["password"].value != "") {
						if (document.forms["register"]["tlp"].value != "") {
							if (document.forms["register"]["alamat"].value != "") {
								alert("Semua telah terisi");
								document.getElementById("register").submit();
								return true;
							} else {
								alert("Alamat tidak boleh kosong");
							}
						}else {
							alert("Nomor Telepon tidak boleh kosong");``
						}
					} else {
						alert("Password tidak boleh kosong");
						return false;
					}
				} else {
					alert("Email masih kosong");
					return false;
				}

			} else {
				alert("Username masih kosong");
				return false;
			}


		} else {
			alert("Nama masih kosong");
			return false;
		}
	}
	</script>
</body>

</html>
