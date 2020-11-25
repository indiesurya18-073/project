<?php
session_start();
include("navbar.php");

if (isset($_SESSION["user"])) header("Location: index.php");
if (isset($_POST['register'])) {
	if (!empty($_POST["name"])) {
		if (!empty($_POST["username"])) {
			if (!empty($_POST["email"])) {
				if (!empty($_POST["password"])) {


					// filter data yang diinputkan
					$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
					$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
					// enkripsi password
					$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
					$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
					$level = "user";

					$sql = "SELECT * FROM user WHERE username=:username OR email=:email";
					$stmt = $db->prepare($sql);

					// bind parameter ke query
					$params = array(
						":username" => $username,
						":email" => $username
					);

					$stmt->execute($params);
					//eksekusi query
					$user = $stmt->fetch(PDO::FETCH_ASSOC);

					// jika user terdaftar
					if ($user) {
						echo '	<script> alert("Email atau username sudah terdaftar") </script>';
					} else {
						// menyiapkan query
						$sql = "INSERT INTO user (name, username, email, password, level) 
            			VALUES (:name, :username, :email, :password,:level)";
						$stmt = $db->prepare($sql);

						// bind parameter ke query
						$params = array(
							":name" => $name,
							":username" => $username,
							":password" => $password,
							":email" => $email,
							":level" => $level
						);

						// eksekusi query untuk menyimpan ke database
						$saved = $stmt->execute($params);

						// jika query simpan berhasil, maka user sudah terdaftar
						// maka alihkan ke halaman login
						if ($saved) header("Location: login.php");
					}
				}
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
					<label for="email">Email</label>
					<input class="form-control post-input" type="email" name="email" placeholder="Alamat Email" />
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control post-input" type="password" name="password" placeholder="Password" />
				</div>

				<input type="submit" class="btn post-btn btn-success btn-block" onclick="validasi()" name="register" value="Daftar" />

			</form>
		</div>
	</div>
	<script>
		/*
		let postBtn = document.querySelector('.post-btn'); //untuk input btn
		let wrapper = document.querySelector('.create-post-wrapper'); //untuk wrap div
		let inputs = [...wrapper.querySelectorAll('.post-input')]; //untuk semua input field

		function validate() {
			let isIncomplete = inputs.some(input => !input.value);
			postBtn.disabled = isIncomplete;
			postBtn.style.cursor = isIncomplete ? 'not-allowed' : 'pointer';
		}

		wrapper.addEventListener('input', validate);
		validate();
		*/

		function validasi() {
			if (document.forms["register"]["name"].value != "") {
				if (document.forms["register"]["username"].value != "") {
					if (document.forms["register"]["email"].value != "") {
						if (document.forms["register"]["password"].value != "") {
							alert("Semua data terisi dengan benar");
							document.getElementById("register").submit();
							return true;
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