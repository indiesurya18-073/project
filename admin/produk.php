<?php
include 'akses.php';
$semuadata = [];
$ambil = $db->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori");
while ($pecah = $ambil->fetch(PDO::FETCH_ASSOC)) {
    $semuadata[] = $pecah;
}
?>
<!-- <pre><?php print_r($semuadata) ?></pre> -->
<div class="panel-headline">
    <div class="panel-heading">
        <h2>Halaman Produk</h2>
    </div>
</div>
<br>
<div class="panel-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Nama Kamera</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Berat Kamera</th>
                <th scope="col">Spesifikasi</th>
                <th scope="col">Gambar Kamera</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($semuadata as $key => $value) :
            ?>
                <tr>
                    <th style="width: 3%;">
                        <?= $key + 1; ?>
                    </th>
                    <td style="width: 10%;">
                        <?= $value['nama_kategori']; ?>
                    </td>
                    <td style="width: 10%;">
                        <?= $value['nama_produk']; ?>
                    </td>
                    <td>
                        Rp.<?= number_format($value['harga_produk']) ?>
                    </td>
                    <td>
                        <?= $value['stok_produk']; ?>
                    </td>
                    <td>
                        <?= number_format($value['berat_produk']); ?> Gram
                    </td>
                    <td style="width: 30%;">
                        <?= $value['spesifikasi_produk']; ?>
                    </td>
                    <td>
                        <img src="../foto_produk/<?= $value['foto_produk']; ?>" width="150px">
                    </td>
                    <td><a href="index.php?halaman=detailproduk&id=<?= $value['id_produk']; ?>" class="btn btn-info btn-sm"><span class="lnr lnr-magnifier"></span>Detail</a>
                        <a href="index.php?halaman=hapusproduk&id=<?= $value['id_produk']; ?>" class="btn btn-danger btn-sm"><span class="lnr lnr-trash"></span>Hapus</a>
                        <a href="index.php?halaman=editproduk&id=<?= $value['id_produk']; ?>" class="btn btn-warning btn-sm" style="margin-top:10px"><span class="lnr lnr-pencil"></span>Edit</a></td>
                </tr>

            <?php endforeach ?>
        </tbody>
    </table>
    <a href="index.php?halaman=tambahproduk" class="btn btn-primary btn-lg">Tambah Produk</a>
</div>