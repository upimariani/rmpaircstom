<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open_multipart('Supplier/cProduk/editProduk/' . $produk->id_bb); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Produk</label>
                                        <input type="text" value="<?= $produk->nama_bb ?>" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama user">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Keterangan Produk</label>
                                        <input type="text" name="keterangan" value="<?= $produk->keterangan ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Keterangan Produk">
                                        <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Size</label>
                                    <input type="text" value="<?= $produk->size ?>" name="size" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Size">
                                    <?= form_error('size', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga Produk</label>
                                    <input type="number" value="<?= $produk->harga_bb ?>" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga Produk">
                                    <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Stok Produk</label>
                                    <input type="text" value="<?= $produk->stok_bb ?>" name="stok" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Stok Produk">
                                    <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?= base_url('Supplier/cProduk') ?>" class="btn btn-danger">Kembali</a>
                        </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>