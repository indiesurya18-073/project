<?php
include 'akses.php';
$semuadata = [];
$ambil = $db->query("SELECT * FROM kategori");
while ($pecah = $ambil->fetch(PDO::FETCH_ASSOC)) {
    $semuadata[] = $pecah;
} ?>
<div class="panel-headline">
    <div class="panel-heading">
        <h2>Halaman Kategori</h2>
    </div>
</div>
<br>
<div class="panel-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($semuadata as $key => $value) : ?>
                <tr>
                    <th>
                        <?= $key + 1; ?>
                    </th>
                    <td>
                        <?= $value['nama_kategori']; ?>
                    </td>
                    <td><a href="index.php?halaman=hapuskategori&id=<?= $value['id_kategori'] ?>" class="btn btn-danger"><span class="lnr lnr-trash"></span>Hapus</a>
                        <a href="index.php?halaman=editkategori&id=<?= $value['id_kategori'] ?>" class="btn btn-warning"><span class="lnr lnr-pencil"></span>Edit</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="index.php?halaman=tambahkategori" class="btn btn-primary">Tambah Kategori</a>
</div>