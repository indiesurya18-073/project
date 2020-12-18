<div class="panel-headline">
    <div class="panel-heading">
        <h2>Halaman Pembelian</h2>
    </div>
</div>
<br>
<div class="panel-body">
<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Total</th>
                <th scope="col">Status Pembelian</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php $nomor=1;?>
            <?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN user ON pembelian.id_user=user.id_user"); ?>
            <?php while($pecah = $ambil->fetch_assoc()){ 
                $status=$pecah['status_pembelian'];?>
            <tr>
                <th scope="row"><?php echo $nomor?></th>
                <td>
                    <?php echo $pecah['id_user'];?>
                </td>
                <td>
                    <?php echo $pecah['tanggal_pembelian'];?>
                </td>
                <td>
                    Rp.<?= number_format($pecah['total_pembelian']) ;?>
                </td>
               
                <?php if($status=="pending"):
                ?>
                <td>
                    <span class="label label-info"><?=$status?></span>
                </td>
                <?php elseif($status=="Sudah mengirim pembayaran"): ?>
                <td>
                    <span class="label label-primary"><?=$status?></span>
                </td>
                <?php elseif($status=="Batal"): ?>
                <td>
                    <span class="label label-danger"><?=$status?></span>
                </td>

                <?php else:?>
                 <td>
                    <span class="label label-success"><?=$status?></span>
                </td>
                <?php endif ?>
                <td><a href="index.php?halaman=detailpembelian&id=<?=$pecah['id_pembelian']?>" class="btn btn-primary"><span class="lnr lnr-trash"></span>Detail</a>
            <?php $nomor++;?>
            <?php }?>
        </tbody>
    </table>
</div>