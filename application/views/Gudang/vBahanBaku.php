<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Informasi Bahan Baku Produk</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bahan Baku</li>
                    </ol>
                </div>

            </div>

        </div><!-- /.container-fluid -->
        <!-- <a href="#" class="btn btn-app" data-toggle="modal" data-target="#small-modal" type="button">
            <i class="fas fa-plus"></i> Tambah Informasi Harga
        </a> -->
        <?php
        if ($this->session->userdata('success')) {
        ?>
            <div class="callout callout-success">
                <h5>Sukses!</h5>
                <p><?= $this->session->userdata('success') ?></p>
            </div>
        <?php
        }
        ?>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Transaksi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Gambar Produk</th> -->
                                        <th>Nama Produk</th>
                                        <th>Harga Supplier</th>
                                        <th>Stok Gudang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($harga_produk as $key => $value) {
                                        if ($value->sisa_bb != '0') {
                                            # code...

                                    ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <!-- <td><img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>"></td> -->
                                                <td><?= $value->nama_bb ?></td>
                                                <td>Rp. <?= number_format($value->harga_bb)  ?></td>
                                                <td><?= $value->sisa_bb  ?></td>
                                                <!-- <td class="text-center"> <a href="#" class="btn btn-app" data-toggle="modal" data-target="#edit<?= $value->id_produk ?>" type="button">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a></td> -->
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Gambar Produk</th> -->
                                        <th>Nama Produk</th>
                                        <th>Harga Supplier</th>
                                        <th>Harga Gudang</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<!-- 
<form action="<?= base_url('Gudang/cBahanBaku/create') ?>" method="POST">
    <div class="modal fade" id="small-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Pilih Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>Silahkan Untuk Memilih Produk Untuk menambahkan Harga</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Nama Produk</label>
                            <select name="produk" class="form-control" required>
                                <option value="" selected="">Choose...</option>
                                <?php
                                foreach ($produk as $key => $value) {
                                ?>
                                    <option value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-lg-12 mt-2">
                            <label>Harga Gudang</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">OK</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
foreach ($harga_produk as $key => $item) {
?>

    <form action="<?= base_url('Gudang/cBahanBaku/create') ?>" method="POST">
        <input type="text" name="produk" value="<?= $item->id_produk ?>">
        <div class="modal fade" id="edit<?= $item->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Pilih Supplier</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <p>Silahkan Untuk Memilih Supplier Untuk melakukan Transaksi</p>
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Nama Produk</label>
                                <select name="produk" class="form-control" disabled>
                                    <option><?= $item->nama_produk ?></option>
                                </select>

                            </div>
                            <div class="col-lg-12 mt-2">
                                <label>Harga Gudang</label>
                                <input type="number" value="<?= $item->price_gudang ?>" name="harga" class="form-control" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php
    # code...
}
?> -->