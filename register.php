<?php
session_start();
include("navbar.php");
require_once("koneksi.php");

if (isset($_SESSION["user"])) header("Location: index.php");
if (isset($_POST['register'])) {

	// filter data yang diinputkan
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	// enkripsi password
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


	// menyiapkan query
	$sql = "INSERT INTO user (name, username, email, password) 
            VALUES (:name, :username, :email, :password)";
	$stmt = $db->prepare($sql);

	// bind parameter ke query
	$params = array(
		":name" => $name,
		":username" => $username,
		":password" => $password,
		":email" => $email
	);

	// eksekusi query untuk menyimpan ke database
	$saved = $stmt->execute($params);

	// jika query simpan berhasil, maka user sudah terdaftar
	// maka alihkan ke halaman login
	if ($saved) header("Location: login.php");
}

?>

<body>
	<br>
	<div class="card mx-auto d-block" style="width: 520px; height: 480px;">
		<div class="card mx-auto d-block border-0" style="width: 500px; height: 460px;">
			<br>
			<h3 class="text-center ">Register</h3>

			<form action="" method="POST">

				<div class="form-group">
					<label for="name">Nama Lengkap</label>
					<input class="form-control" type="text" name="name" placeholder="Nama kamu" />
				</div>

				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control" type="text" name="username" placeholder="Username" />
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input class="form-control" type="email" name="email" placeholder="Alamat Email" />
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" type="password" name="password" placeholder="Password" />
				</div>

				<input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

			</form>
		</div>
	</div>
</body>

</html>