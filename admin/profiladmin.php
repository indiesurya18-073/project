<?php 
include 'akses.php';
$akun = $_SESSION['admin']; 

?>
<style type="text/css">
	h4{
		padding-top: 3px;
		border-bottom: 2px;

	}



</style>
<div align="center" style="padding-bottom: 50px; padding-top: 50px;">
<h1>DATA PROFIL ADMIN</h1>
<br><br>
<h4>Nama: <?php echo $akun['name'];?></h4>
<h4>Username : <?php echo $akun['username'];?> </h4>
<h4>Email : <?php echo $akun['email'];?></h4>
<h4>Alamat : <?php echo $akun['alamat_user'];?></h4>
<h4>No. Telepon : <?php echo $akun['tlp_user'];?></h4>
<h4>Level : <?php echo $akun['level'];?></h4>
</div>	

