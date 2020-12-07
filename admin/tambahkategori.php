<?php
include 'akses.php';
?>
<div class="panel-headline">
    <div class="panel-heading">
        <h2>Halaman Tambah Kategori</h2>

    </div>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <button name="tambah" class="btn btn-primary">Tambah</button>
                <?php if (isset($_POST["tambah"])) {
                    $db->query("INSERT INTO kategori (nama_kategori) VALUES ('$_POST[nama]')");
                    echo '<div class="alert alert-info">Data Tersimpan</div>';
                    echo '<meta http-equiv="refresh" content="1;url=index.php?halaman=kategori">';
                }
                ?>
            </form>
        </div>
    </div>
</div>