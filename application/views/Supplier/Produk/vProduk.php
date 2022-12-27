<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bahan Baku Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <a href="<?= base_url('Supplier/cProduk/insertProduk') ?>" class="btn btn-app">
            <i class="fas fa-plus"></i> Tambah Bahan Baku Produk
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
                            <h3 class="card-title">Informasi Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Size</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($produk as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_bb ?></td>
                                            <td><?= $value->keterangan ?></td>
                                            </td>
                                            <td><?= $value->size ?></td>
                                            <td>Rp. <?= number_format($value->harga_bb)  ?></td>
                                            <td><?= $value->stok_bb ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('Supplier/cProduk/delete/' . $value->id_bb) ?>" class="btn btn-app">
                                                    <i class="fas fa-trash"></i> Hapus Produk
                                                </a>
                                                <a href="<?= base_url('Supplier/cProduk/editProduk/' . $value->id_bb) ?>" class="btn btn-app">
                                                    <i class="fas fa-edit"></i> Edit Produk
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
                                        <th>Nama Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Size</th>
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