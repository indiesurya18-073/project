<?php
include 'akses.php';
?>
<div class="panel-headline">
    <div class="panel-heading">
        <h2>Halaman User</h2>
    </div>
</div>
<br>
<div class="panel-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>
            <?php $ambil = $db->query("SELECT * FROM user");
            while ($pecah = $ambil->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <th><?= $nomor ?></th>
                    <td><?= $pecah['name']; ?></td>
                    <td><?= $pecah['username']; ?></td>
                    <td><?= $pecah['email']; ?></td>
                    <td><?= $pecah['tlp_user']; ?></td>
                    <td><?= $pecah['alamat_user']; ?></td>
                    <td><a href="index.php?halaman=hapususer&id=<?= $pecah['id_user']; ?>" class="btn btn-danger btn-sm"><span class="lnr lnr-trash"></span>Hapus</a>
                        <a href="index.php?halaman=edituser&id=<?= $pecah['id_user']; ?>" class="btn btn-warning btn-sm"><span class="lnr lnr-pencil"></span>Edit</a></td>

                </tr>

            <?php
                $nomor++;
            } ?>
        </tbody>
    </table>
</div>