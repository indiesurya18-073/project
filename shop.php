<?php
session_start();
include 'koneksi.php';
$semuakategori = [];
$ambilkategori = $koneksi->query("SELECT * FROM kategori");
while($pecahkategori = $ambilkategori->fetch_assoc()){
    $semuakategori[]= $pecahkategori;
}
include 'navbar.php';
?>

<body class="bg-secondary">
    <!--Slide foto-->
    <br><br>
    <div class="container">
        <div id="demo" class="carousel slide bg-color-black" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="shop.php">
                        <img src="img/banner.jpg" width="1100" height="400">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="shop.php">
                        <img src="img/banner1.jpg" width="1100" height="400">
                    </a>
                </div>

            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-3">
            <h3 class="my-4">Kategori</h3>
                <div class="list-group">
                    <?php foreach($semuakategori as $key => $tiapkategori): 
                    ?>
                    <a href="kategoriproduk.php?id=<?=$tiapkategori['id_kategori']?>" class="list-group-item"><?= $tiapkategori['nama_kategori']?></a>
                    <?php endforeach?>
                </div>
        </div>
        <br>
        <h2>Produk Terbaru</h2>
        <div class="container mt-3">
            <div class="row">
                <?php $i=1;
                $ambil = $koneksi->query("SELECT * FROM produk ORDER BY id_produk DESC ");?>
                <?php  while($perproduk = $ambil->fetch_assoc()){?>
                <?php if($i<=8): ?>
                <div class="col-lg-3 col-xs-12 col-sm-6 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="foto_produk/<?= $perproduk['foto_produk']?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a href="detail.php?&id=<?=$perproduk['id_produk']?>"><?= $perproduk['nama_produk']?></a></h5>
                            <h6 class="card-title">Rp. <?= number_format($perproduk['harga_produk'])?></h6>
                            <?php if($perproduk['stok_produk']!=='0'):?>
                            <a href="beli.php?id=<?=$perproduk['id_produk']?>"><button class="btn btn-primary">Beli</button></a>
                            <a href="detail.php?&id=<?=$perproduk['id_produk']?>" class="btn btn-secondary">Detail</a>
                            <?php else :?>
                            <p class="text-danger">Stok Produk Kosong</p>
                            <?php endif?>
                        </div>
                    </div>
                </div>
                <?php $i++;
                endif;
                } ?>
            </div>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--Footer -->
    <br><br>
    <?php 
        include 'footer.php';
     ?>

</body>
</html>