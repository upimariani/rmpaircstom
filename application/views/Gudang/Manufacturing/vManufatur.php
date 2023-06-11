<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk Perhitungan Bahan Jadi</h1>
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
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Bahan Baku</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah Sablon Yang dibutuhkan</label>
                                        <table class="table">
                                            <tr>
                                                <th>Nama Sablon</th>
                                                <th>Stok Sablon</th>
                                                <th>Quantity Sablon Keluar</th>
                                                <th>Add</th>
                                            </tr>
                                            <?php
                                            foreach ($sablon_stok as $key => $value) {
                                                if ($value->sisa_sablon != 0) {
                                            ?>
                                                    <form action="<?= base_url('Gudang/cManufacturing/add_sablon') ?>" method="POST">
                                                        <input type="hidden" name="id" value="<?= $value->id_detail_sb ?>">
                                                        <input type="hidden" name="name" value="<?= $value->jenis_sablon ?>">
                                                        <input type="hidden" name="price" value="<?= $value->sisa_sablon ?>">
                                                        <tr>
                                                            <td><?= $value->jenis_sablon ?> | <?= $value->warna ?><br>
                                                                <small>Stok Tgl : <?= $value->tgl_invoice ?></small>
                                                            </td>
                                                            <td><?= $value->sisa_sablon ?></td>
                                                            <td><input type="number" class="form-control" name="qty" required></td>
                                                            <td><button type="submit" class="btn btn-danger">Add</button></td>
                                                        </tr>
                                                    </form>
                                                <?php
                                                }
                                                ?>

                                            <?php
                                            }
                                            ?>

                                        </table>
                                    </div>
                                </div>




                                <!-- <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1">Deskripsi Produk</label>
                                        <textarea class="textarea" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div> -->

                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>


                <div class="col-md-8">
                    <form action="<?= base_url('Gudang/cManufacturing/produk_jadi') ?>" method="POST">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Data Bahan Baku</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Sablon</th>
                                                <th>Jumlah Sablon yang Keluar</th>
                                                <th class="text-center">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($this->cart->contents() as $key => $value) {
                                            ?>
                                                <tr>
                                                    <td><?= $value['name'] ?></td>
                                                    <td><?= $value['qty'] ?></td>
                                                    <td class="text-center"><a href="<?= base_url('Gudang/cManufacturing/delete/' . $value['rowid']) ?>"><i class="fas fa-trash"></i></a></td>

                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-lg-12 mt-2">
                                    <label>Nama Bahan Baku Produk</label>
                                    <select name="produk_bb" id="produk_bb" class="form-control" required>
                                        <option value="" selected="">Choose...</option>
                                        <?php
                                        foreach ($bb_produk as $key => $value) {
                                        ?>
                                            <option data-stok="<?= $value->sisa_bb ?>" value="<?= $value->id_detail_invoice ?>"><?= $value->nama_bb ?> | Stok : <?= $value->sisa_bb ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-12 mt-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jumlah Bahan Baku Produk Keluar</label>
                                        <input type="text" name="jml_bb" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Jumlah Bahan Baku Produk">
                                        <input type="hidden" name="stok_seb" class="stok form-control" id="exampleInputEmail1" placeholder="Masukkan Jumlah Bahan Baku Produk">
                                        <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-lg-12 mt-2">
                                    <label>Nama Produk Jadi</label>
                                    <select name="produk_jadi" id="produk_jadi" class="form-control" required>
                                        <option value="" selected="">Choose...</option>
                                        <?php
                                        foreach ($produk as $key => $value) {
                                        ?>
                                            <option data-stok-produk="<?= $value->stok_gudang ?>" value="<?= $value->id_produk ?>"><?= $value->nama_produk ?> </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-12 mt-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stok Produk Jadi</label>
                                        <input type="text" name="jml_produk" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Stok Produk">
                                        <input type="hidden" name="stok_produk" class="stok_produk form-control" id="exampleInputEmail1" placeholder="Masukkan Stok Produk">
                                        <?= form_error('stok', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="<?= base_url('Supplier/cProduk') ?>" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>