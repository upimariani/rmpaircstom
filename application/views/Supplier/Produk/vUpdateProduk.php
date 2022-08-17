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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Data Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open_multipart('Supplier/cProduk/editProduk/' . $produk->id_produk); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Produk</label>
                                        <input type="text" value="<?= $produk->nama_produk ?>" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama user">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Deskripsi Produk</label>
                                        <textarea class="textarea" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $produk->deskripsi ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Gambar</label>
                                <img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $produk->gambar) ?>">
                                <input type="file" name="gambar" class="form-control" id="exampleInputEmail1" placeholder="Masukkan alamat">
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