<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>KATALOG PRODUK</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Katalog</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
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

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="col-lg-12">
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
                                                <a href="<?= base_url('Konsumen/cHalamanUtama/delete/' . $value['rowid']) ?>" class="btn btn-danger" type="submit">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>


                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="<?= base_url('Konsumen/cHalamanUtama/checkout') ?>" class="btn btn-success mt-3">Checkout</a>
                                </div>
                                <div class="col-lg-6 mt-3 text-right">
                                    <h5>Total : Rp. <?= number_format($this->cart->total()) ?></h5>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <div class="row d-flex align-items-stretch">
                    <?php
                    foreach ($katalog as $key => $value) {
                    ?>

                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">

                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    <?= $value->size ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b><?= $value->nama_produk ?></b></h2>
                                            <p class="text-muted text-sm"><b>Deskripsi: </b> <?= $value->deskripsi ?> </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-tag"></i></span> Rp. <?= number_format($value->price_gudang) ?></li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-info"></i></span> Stok #: <?= $value->stok_gudang ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <form action="<?= base_url('Konsumen/cHalamanUtama/addtocart') ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $value->id_produk ?>">
                                            <input type="hidden" name="name" value="<?= $value->nama_produk ?>">
                                            <input type="hidden" name="price" value="<?= $value->price_gudang ?>">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="stok" value="<?= $value->stok_gudang ?>">

                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-shopping-cart"></i> Add To Cart
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <?php
                    }
                    ?>


                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->