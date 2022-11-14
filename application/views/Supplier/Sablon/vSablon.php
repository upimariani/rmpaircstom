<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sablon</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sablon</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-plus"></i>
            Tambah Sablon
        </button>
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
                            <h3 class="card-title">Informasi Sablon</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Sablon</th>
                                        <th>Warna</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($sablon as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>

                                            <td><?= $value->jenis_sablon ?></td>
                                            <td><?= $value->warna ?></td>
                                            </td>
                                            <td>Rp. <?= number_format($value->harga)  ?></td>
                                            <td><?= $value->stok ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('Supplier/cSablon/delete/' . $value->id_sablon) ?>" class="btn btn-app">
                                                    <i class="fas fa-trash"></i> Hapus Produk
                                                </a>
                                                <button class="btn btn-app" data-toggle="modal" data-target="#edit<?= $value->id_sablon ?>">
                                                    <i class="fas fa-edit"></i> Edit Produk
                                                </button>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Sablon</th>
                                        <th>Warna</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
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


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <?php echo form_open_multipart('Supplier/cSablon/create'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Masukkan Data Sablon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Jenis Sablon</label>
                    <input type="text" name="nama" class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                    <label>Harga Sablon</label>
                    <input type="number" name="harga" class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                    <label>Warna Sablon</label>
                    <input type="text" name="warna" class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Enter ..." required>
                </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php
foreach ($sablon as $key => $value) {
?>

    <div class="modal fade" id="edit<?= $value->id_sablon ?>">
        <div class="modal-dialog">
            <?php echo form_open_multipart('Supplier/cSablon/update/' . $value->id_sablon); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan Data Sablon</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Sablon</label>
                        <input type="text" name="nama" value="<?= $value->jenis_sablon ?>" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Harga Sablon</label>
                        <input type="number" name="harga" value="<?= $value->harga ?>" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Warna Sablon</label>
                        <input type="text" name="warna" value="<?= $value->warna ?>" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="jumlah" value="<?= $value->stok ?>" class="form-control" placeholder="Enter ..." required>
                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php
}
?>