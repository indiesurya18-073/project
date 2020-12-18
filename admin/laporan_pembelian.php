<?php 
$semuadata=[];
$tglselesai="-";
$tglmulai="-";
if(isset($_POST['lihat'])){
    $tglmulai = $_POST['tanggal_mulai'];
    $tglselesai = $_POST['tanggal_selesai'];
    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN user us ON pm.id_user=us.id_user WHERE tanggal_pembelian BETWEEN '$tglmulai' AND '$tglselesai' ");
    while($pecah = $ambil->fetch_assoc()){
        $semuadata[]=$pecah;
    }
    // echo "<pre>";
    // print_r($semuadata);
    // echo "</pre>";
}
?>
<div class="panel-headline">
    <div class="panel-heading">
        <h2>Halaman Laporan Pembelian</h2>
    </div>
</div>
<div class="panel-body">
    <form action="" method="post">  
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" value="<?=$tglmulai?>" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                   <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" value="<?=$tglselesai?>" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <br>
                <button class="btn btn-primary" name="lihat">Lihat Laporan</button>
            </div>
        </div>
    </form>
    <h4>Laporan Pembelian Dari <?=$tglmulai?> Hingga <?=$tglselesai?></h4>  
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0;
            foreach($semuadata as $key =>$value):
            $status = $value['status_pembelian'];
            ?>
            <tr>
                <th><?=$key+1?></th>
                <td><?=$value['name']?></td>
                <td><?=$value['tanggal_pembelian']?></td>
                <td>Rp.<?=number_format($value['total_pembelian'])?></td>
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
            </tr>
            <?php 
            $total +=$value['total_pembelian'];
            endforeach ?>
        </tbody>
        <br>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th>Rp.<?=number_format($total)?></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>