<?php
include 'akses.php';
$ambil = $db->query("SELECT * FROM produk WHERE id_produk=$_GET[id]");
$pecah = $ambil->fetch(PDO::FETCH_ASSOC);
$fotoproduk = $pecah['foto_produk'];
if (file_exists("../foto_produk/$fotoproduk")) {
    unlink("../foto_produk/$fotoproduk");
}
$db->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
echo "<script>alert('Produk Terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
