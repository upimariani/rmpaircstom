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
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>

            </div>

        </div><!-- /.container-fluid -->
        <a href="<?= base_url('Admin/cSupplier/createSupplier') ?>" class="btn btn-app">
            <i class="fas fa-plus"></i> Tambah Supplier
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
                            <h3 class="card-title">Informasi Supplier</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat Supplier</th>
                                        <th>Nama Toko</th>
                                        <th>No Hp Supplier</th>
                                        <th class="text-center">Akun Supplier</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($supplier as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_supplier ?></td>
                                            <td><?= $value->alamat_supplier ?></td>
                                            <td><?= $value->nama_toko ?></td>
                                            <td><?= $value->no_hp_supplier ?></td>
                                            <td class="text-center"><span class="badge badge-danger">Username : <?= $value->username_supp ?></span> <span class="badge badge-warning">Password : <?= $value->pass_supp ?></span></td>

                                            <td class="text-center"> <a href="<?= base_url('Admin/cSupplier/delete/' . $value->id_supplier) ?>" class="btn btn-app">
                                                    <i class="fas fa-trash"></i> Hapus Supplier
                                                </a> <a href="<?= base_url('Admin/cSupplier/edit/' . $value->id_supplier) ?>" class="btn btn-app">
                                                    <i class="fas fa-edit"></i> Edit Supplier
                                                </a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat Supplier</th>
                                        <th>Nama Toko</th>
                                        <th>No Hp Supplier</th>
                                        <th class="text-center">Akun Supplier</th>
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