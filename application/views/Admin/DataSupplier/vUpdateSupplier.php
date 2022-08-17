<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Supplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Suplier</li>
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
                            <h3 class="card-title">Update Data Supplier</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('Admin/cSupplier/edit/' . $supplier->id_supplier) ?>" method="POST" role="form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Supplier</label>
                                            <input type="text" name="nama" value="<?= $supplier->nama_supplier ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama supplier">
                                            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">No Telepon</label>
                                            <input type="number" value="<?= $supplier->no_hp_supplier ?>" name="no_hp" class="form-control" id="exampleInputPassword1" placeholder="Masukkan no telepon">
                                            <?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat</label>
                                    <input type="text" value="<?= $supplier->alamat_supplier ?>" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Masukkan alamat">
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Toko</label>
                                    <input type="text" value="<?= $supplier->nama_toko ?>" name="nama_toko" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama toko">
                                    <?= form_error('nama_toko', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" value="<?= $supplier->username_supp ?>" name="username" class="form-control" id="exampleInputEmail1" placeholder="Masukkan username">
                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="text" value="<?= $supplier->pass_supp ?>" name="password" class="form-control" id="exampleInputEmail1" placeholder="Masukkan password">
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?= base_url('Admin/cUser') ?>" class="btn btn-danger">Kembali</a>
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