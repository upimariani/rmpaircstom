<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Size Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Size Produk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <a href="<?= base_url('Supplier/cProduk/insertSize/' . $id) ?>" class="btn btn-app">
            <i class="fas fa-plus"></i> Tambah Size
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
                            <h3 class="card-title">Informasi Size Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Size</th>
                                        <th>Harga</th>
                                        <th>Quantity</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($size['size'] as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_size ?></td>
                                            <td>Rp. <?= number_format($value->price_supp)  ?></td>
                                            <td><?= $value->stok_supp ?></td>
                                            <td class="text-center"> <a href="<?= base_url('Supplier/cProduk/deleteSize/' . $value->id_size) ?>" class="btn btn-app">
                                                    <i class="fas fa-trash"></i> Hapus Size
                                                </a>
                                                <a href="<?= base_url('Supplier/cProduk/editSize/' . $value->id_size) ?>" class="btn btn-app">
                                                    <i class="fas fa-edit"></i> Edit Size
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
                                        <th>Nama Size</th>
                                        <th>Harga</th>
                                        <th>Quantity</th>
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