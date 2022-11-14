<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Bahan Baku</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
                    </ol>
                </div>

            </div>

        </div><!-- /.container-fluid -->
        <a href="#" class="btn btn-app" data-toggle="modal" data-target="#small-modal" type="button">
            <i class="fas fa-plus"></i> Tambah Transaksi
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
                            <h3 class="card-title">Informasi Transaksi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Atas Nama</th>
                                        <th>Nama Supplier</th>
                                        <th>Tanggal Order</th>
                                        <th>Total Bayar</th>
                                        <th>Status Order</th>
                                        <th>Type Order</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($transaksi as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_user ?></td>
                                            <td><?= $value->nama_supplier ?></td>
                                            <td><?= $value->tgl_invoice ?></td>
                                            <td>Rp. <?= number_format($value->total_invoice)  ?></td>
                                            <td><?php if ($value->status_pesan == '0') {
                                                ?>
                                                    <span class="badge badge-danger">Belum Bayar</span>
                                                    <?php echo form_open_multipart('Gudang/cTransaksiBB/bayar/' . $value->id_invoice); ?>
                                                    <div class="row">
                                                        <div class="col-lg-8"><input type="file" name="gambar" class="form-control"></div>
                                                        <div class="col-lg-4"><button class="btn btn-default">Upload</button></div>
                                                    </div>
                                                    </form>

                                                <?php
                                                } else if ($value->status_pesan == '1') {
                                                ?>
                                                    <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="badge badge-success">Selesai</span>
                                                <?php
                                                }  ?>
                                            </td>
                                            <td><?php if ($value->type_transaksi == '1') {
                                                ?>
                                                    <span class="badge badge-warning">Produk</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="badge badge-info">Sablon</span>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('Gudang/cTransaksiBB/detail_transaksi/' . $value->id_invoice . '/' . $value->type_transaksi) ?>" class="btn btn-app">
                                                    <i class="fas fa-info"></i> Detail Transaksi
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
                                        <th>Atas Nama</th>
                                        <th>Nama Supplier</th>
                                        <th>Tanggal Order</th>
                                        <th>Total Bayar</th>
                                        <th>Status Order</th>
                                        <th>Type Order</th>
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



<form action="<?= base_url('Gudang/cTransaksiBB/create') ?>" method="POST">
    <div class="modal fade" id="small-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                            <label>Nama Supplier</label>
                            <select name="supplier" class="form-control" required>
                                <option value="" selected="">Choose...</option>
                                <?php
                                foreach ($supplier as $key => $value) {
                                ?>
                                    <option value="<?= $value->id_supplier ?>"><?= $value->nama_supplier ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-lg-12 mt-2">
                            <label>Jenis Bahan Baku</label>
                            <select name="jenis" class="form-control" required>
                                <option value="" selected="">Choose...</option>
                                <option value="1">Produk</option>
                                <option value="2">Sablon</option>

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