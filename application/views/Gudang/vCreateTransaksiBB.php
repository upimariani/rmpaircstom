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
                        <li class="breadcrumb-item active">Transaksi Bahan Baku</li>
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
                            <h3 class="card-title">Tambah Data Produk</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <?php
                                        if ($jenis == '1') {
                                        ?>
                                            <form action="<?= base_url('Gudang/cTransaksiBB/addtocart') ?>" method="POST" role="form">
                                                <input type="hidden" name="supplier" value="<?= $supplier ?>">
                                                <input type="hidden" name="jenis" value="<?= $jenis ?>">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama Produk</label>
                                                    <select class="form-control" name="pil_jenis" id="produk" required>
                                                        <option>---Pilih Produk---</option>
                                                        <?php
                                                        foreach ($jenis_produk as $key => $value) {
                                                        ?>
                                                            <option data-nama="<?= $value->nama_produk ?>" data-size="<?= $value->size ?>" data-harga="<?= $value->price_supp ?>" data-stok="<?= $value->stok_supp ?>" value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama Produk</label>
                                                    <input type="text" name="nama" class=" nama form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Produk" readonly>
                                                    <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Size</label>
                                                    <input type="text" name="size" class="size form-control" id="exampleInputEmail1" placeholder="Masukkan Size" readonly>
                                                    <?= form_error('nama_toko', '<small class="text-danger">', '</small>') ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Harga</label>
                                                            <input type="text" name="harga" class="harga form-control" id="exampleInputEmail1" placeholder="Masukkan Harga" readonly>
                                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Stok Supplier</label>
                                                            <input type="text" name="stok" class="stok form-control" id="exampleInputEmail1" placeholder="Masukkan Stok" readonly>
                                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Quantity</label>
                                                    <input type="number" name="qty" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Quantity" required>
                                                    <?= form_error('nama_toko', '<small class="text-danger">', '</small>') ?>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <a href="<?= base_url('Gudang/cTransaksiBB') ?>" class="btn btn-danger">Kembali</a>
                                                </div>
                                            </form>
                                        <?php
                                        } else {
                                        ?>
                                            <form action="<?= base_url('Gudang/cTransaksiBB/addtocart') ?>" method="POST" role="form">
                                                <input type="hidden" name="supplier" value="<?= $supplier ?>">
                                                <input type="hidden" name="jenis" value="<?= $jenis ?>">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Jenis Sablon</label>
                                                    <select class="form-control" name="pil_jenis" id="sablon" required>
                                                        <option>---Pilih Sablon---</option>
                                                        <?php
                                                        foreach ($jenis_produk as $key => $value) {
                                                        ?>
                                                            <option data-jenis="<?= $value->jenis_sablon ?>" data-harga="<?= $value->harga ?>" data-warna="<?= $value->warna ?>" data-stok="<?= $value->stok ?>" value="<?= $value->id_sablon ?>"><?= $value->jenis_sablon ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Jenis Sablon</label>
                                                    <input type="text" name="nama" class="jenis form-control" id="exampleInputEmail1" placeholder="Masukkan Jenis Sablon" readonly>
                                                    <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Harga</label>
                                                    <input type="text" name="harga" class="harga form-control" id="exampleInputEmail1" placeholder="Masukkan Harga" readonly>
                                                    <?= form_error('nama_toko', '<small class="text-danger">', '</small>') ?>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Warna</label>
                                                            <input type="text" name="warna" class="warna form-control" id="exampleInputEmail1" placeholder="Masukkan Warna" readonly>
                                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Stok Supplier</label>
                                                            <input type="text" name="stok" class="stok form-control" id="exampleInputEmail1" placeholder="Masukkan Stok" readonly>
                                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Quantity</label>
                                                    <input type="number" name="qty" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Quantity" required>
                                                    <?= form_error('nama_toko', '<small class="text-danger">', '</small>') ?>
                                                </div>

                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <a href="<?= base_url('Gudang/cTransaksiBB') ?>" class="btn btn-danger">Kembali</a>
                                                </div>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- /.card-body -->


                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Keranjang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Nama Produk / Sablon</th>
                                        <th>Harga</th>
                                        <th>Quantity</th>
                                        <th style="width: 40px">Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($this->cart->contents() as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $value['name'] ?></td>
                                            <td>Rp.<?= number_format($value['price'])  ?></td>
                                            <td><?= $value['qty'] ?></td>
                                            <td><span class="badge bg-warning">Rp.<?= number_format($value['qty'] * $value['price']) ?></span></td>
                                            <td>
                                                <form action="<?= base_url('Gudang/cTransaksiBB/delete/' . $value['rowid']) ?>" method="POST">
                                                    <input type="hidden" name="supplier" value="<?= $supplier ?>">
                                                    <input type="hidden" name="jenis" value="<?= $jenis ?>">
                                                    <button class="btn btn-danger" type="submit">Hapus</button>
                                                </form>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>


                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-6"> <a href="<?= base_url('Gudang/cTransaksiBB/checkout/' . $jenis . '/' . $supplier) ?>" class="btn btn-success mt-3">Checkout</a></div>
                                <div class="col-lg-6 mt-3 text-right">
                                    <h5>Total : Rp. <?= number_format($this->cart->total()) ?></h5>
                                </div>
                            </div>

                        </div>

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