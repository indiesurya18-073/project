<?php

session_start();

require_once("koneksi.php");

include 'navbar.php';
if (isset($_SESSION["user"])) header("Location: index.php");
if (isset($_POST['login'])) {

	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

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
		// verifikasi password
		if (password_verify($password, $user["password"])) {
			// buat Session
			session_start();
			// login sukses, alihkan ke halaman timeline
			if ($user['level'] == "admin") {
				$_SESSION["admin"] = $user;
				header("Location: admin/index.php?pesan=admin");
			}
			if ($user['level'] == "user") {
				$_SESSION["user"] = $user;

				header("Location: index.php?pesan=user");
			}
		}
	} else {
		header("location:login.php?pesan=gagal");
	}
}
?>

<body>

	<?php
	if (isset($_GET['pesan'])) {
		if ($_GET['pesan'] == "gagal") {
			echo "<div class='alert alert-danger'> Username dan Password tidak sesuai !</div>";
		}
	}

	?>

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