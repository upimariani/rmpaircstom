<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Informasi Produk Jadi</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk Jadi</li>
                    </ol>
                </div>

            </div>

        </div><!-- /.container-fluid -->
        <a href="#" class="btn btn-app" data-toggle="modal" data-target="#desain_baru" type="button">
            <i class="fas fa-plus"></i> Desain Baru
        </a>
        <a href="<?= base_url('Gudang/cManufacturing/manufactur') ?>" class="btn btn-app">
            <i class="fas fa-plus"></i> Manufacturing
        </a>
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
                            <h3 class="card-title">Informasi Produk Jadi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Size Produk</th>
                                        <th>Harga Gudang</th>
                                        <th>Stok Gudang</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($harga_produk as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>"></td>
                                            <td><?= $value->nama_produk ?></td>
                                            <td><?= $value->size ?></td>

                                            <td>Rp. <?= number_format($value->price_gudang)  ?></td>
                                            <td><?= $value->stok_gudang ?></td>
                                            <td class="text-center"> <a href="<?= base_url('Gudang/cManufacturing/delete_produk/' . $value->id_produk) ?>" class="btn btn-app" type="button">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>

                                                <a href="" data-toggle="modal" data-target="#edit<?= $value->id_produk ?>" type="button" class="btn btn-app" type="button">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Size Produk</th>
                                        <th>Harga Gudang</th>
                                        <th>Stok Gudang</th>
                                        <th class="text-center">Action</th>
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



<?php echo form_open_multipart('Gudang/cManufacturing/insertProduk'); ?>
<div class="modal fade" id="desain_baru" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Desain Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Silahkan untuk membuat Desain Baru</p>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12 mt-2">
                            <label>Nama Produk</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="exampleInputEmail1">Deskripsi Produk</label>
                            <textarea class="textarea" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label>Size Produk</label>
                            <input type="text" name="size" class="form-control" required>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label>Harga Gudang</label>
                            <input type="number" name="harga" class="form-control" required>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label>Gambar Produk</label>
                            <input type="file" name="gambar" class="form-control" required>
                        </div>
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
foreach ($harga_produk as $key => $value) {
?>
    <?php echo form_open_multipart('Gudang/cManufacturing/editProduk/' . $value->id_produk); ?>
    <div class="modal fade" id="edit<?= $value->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Edit Desain <?= $value->nama_produk ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>Silahkan untuk membuat Desain Baru</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-12 mt-2">
                                <label>Nama Produk</label>
                                <input type="text" name="nama" value="<?= $value->nama_produk ?>" class="form-control" required>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label for="exampleInputEmail1">Deskripsi Produk</label>
                                <textarea class="textarea" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $value->deskripsi ?></textarea>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label>Size Produk</label>
                                <input type="text" name="size" value="<?= $value->size ?>" class="form-control" required>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label>Harga Gudang</label>
                                <input type="number" name="harga" value="<?= $value->price_gudang ?>" class="form-control" required>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <label>Gambar Produk</label>
                                <img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>">
                                <input type="file" name="gambar" class="form-control">
                            </div>
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
}
?>

<form action="<?= base_url('Gudang/cManufacturing/manufactur') ?>" method="POST">
    <div class="modal fade" id="manufacturing" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Manufacturing</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>Silahkan membuat proses Manufacturing</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Nama Produk Jadi</label>
                            <select name="produk_jadi" class="form-control" required>
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
                            <label>Nama Bahan Baku Produk</label>
                            <select name="produk_bb" class="form-control" required>
                                <option value="" selected="">Choose...</option>
                                <?php
                                foreach ($bb_produk as $key => $value) {
                                ?>
                                    <option value="<?= $value->id_bb ?>"><?= $value->nama_bb ?></option>
                                <?php
                                }
                                ?>
                            </select>

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