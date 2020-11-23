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

	$user = $stmt->fetch(PDO::FETCH_ASSOC);

	// jika user terdaftar
	if ($user) {
		// verifikasi password
		if (password_verify($password, $user["password"])) {
			// buat Session
			session_start();
			$_SESSION["user"] = $user;
			// login sukses, alihkan ke halaman timeline
			header("Location: index.php?pesan=sukses");
		}
	} else {
		header("location:index.php?pesan=gagal");
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
			<form action="" method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" type="text" name="username" placeholder="Username atau email" />
				</div>


				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" type="password" name="password" placeholder="Password" />
				</div>

				<input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />

			</form>
		</div>
	</div>
</body>

</html>