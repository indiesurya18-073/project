<?php
$ambildata = [];
$ambil = $db->query("SELECT * FROM kategori");
while ($pecah = $ambil->fetch(PDO::FETCH_ASSOC)) {
    $ambildata[] = $pecah;
}
?>
<div class="panel-headline">
    <div class="panel-heading">
        <h2>Tambah Produk</h2>
    </div>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="kategori">Nama Kategori</label>
                    <select name="kategori" required class="form-control">
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($ambildata as $key => $value) :
                        ?>
                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_Produk">Nama Produk</label>
                    <input type="text" required class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="harga_Produk">Harga Produk (Rp)</label>
                    <input type="number" required min="0" class="form-control" name="harga">
                </div>
                <div class="form-group">
                    <label for="stok_Produk">Stok Produk</label>
                    <input type="number" min="0" required class="form-control" name="stok">
                </div>
                <div class="form-group">
                    <label for="berat_Produk">Berat Produk(Gr)</label>
                    <input type="number" min="0" required class="form-control" name="berat">
                </div>
                <div class="form-group">
                    <label for="spesifikasi_Produk">Spesifikasi Produk</label>
                    <textarea name="spesifikasi" required class="form-control" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="foto_Produk">Foto Produk</label>
                    <div class="letak-input" style="margin-bottom: 10px;">
                        <input type="file" required class="form-control" name="foto[]">
                    </div>
                    <span class="btn btn-primary btn-tambah"><a class="fa fa-plus"></a></span>
                </div>
                <button name="simpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>
<?php if (isset($_POST["simpan"])) {
    $namanamafoto = $_FILES['foto']['name'];
    $lokasilokasifoto = $_FILES['foto']['tmp_name'];
    //mengganti nama foto 
    $nama_foto_baru = [];
    foreach ($namanamafoto as $key => $value) {
        $nama_foto_baru[] = date("YmdHis") . $value;
    }
    move_uploaded_file($lokasilokasifoto[0], "../foto_produk/" . $nama_foto_baru[0]);

    $db->query("INSERT INTO produk (id_kategori,nama_produk,harga_produk,stok_produk,berat_produk,spesifikasi_produk,foto_produk) VALUES('$_POST[kategori]','$_POST[nama]','$_POST[harga]','$_POST[stok]','$_POST[berat]','$_POST[spesifikasi]','$nama_foto_baru[0]')");

    //mendapatkan id produk barusan
    $idprodukbaru = $db->lastInsertId();

    foreach ($nama_foto_baru as $key => $tiap_nama) {
        $tiap_lokasi = $lokasilokasifoto[$key];
        move_uploaded_file($tiap_lokasi, "../foto_produk/" . $tiap_nama);

        //simpan ke database sesuai dengan id produk
        $db->query("INSERT INTO produk_foto (id_produk,nama_produk_foto) VALUES ('$idprodukbaru','$tiap_nama')");
    }

    echo '<div class="alert alert-info">Data Tersimpan</div>';
    #echo '<meta http-equiv="refresh" content="1;url=index.php?halaman=produk">';
}
?>
<!-- <pre><?php print_r($nama_foto_baru) ?></pre> -->
<script>
    $(document).ready(function() {
        $(".btn-tambah").on('click', function() {
            $(".letak-input").append("<input type='file' class='form-control' name='foto[]'>")
        })
    })
</script>