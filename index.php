<?php
session_start();
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


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

    <!--Footer -->
    <br><br>
    <?php
        include 'footer.php';
    ?>


</body>

</html>
