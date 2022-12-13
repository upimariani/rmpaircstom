<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice Transaksi Pelanggan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Toko RMPAIRCSTOM
                                    <small class="float-right">Date: <?= date('Y-m-d') ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Atas Nama
                                <address>
                                    <strong><?= $detail['transaksi']->nama_konsumen ?></strong><br>
                                    Alamat : <strong> <?= $detail['transaksi']->alamat_konsumen  ?></strong><br>
                                    No Telepon : <strong> <?= $detail['transaksi']->no_hp  ?></strong>
                                </address>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Qty</th>
                                            <th>Product</th>
                                            <th>Harga</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($detail['pesanan'] as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?= $value->qty ?></td>
                                                <td><?= $value->nama_produk ?></td>
                                                <td>Rp. <?= number_format($value->price_gudang)  ?></td>
                                                <td>RP. <?= number_format($value->price_gudang * $value->qty)  ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-6 m-auto">

                            </div>
                            <div class="col-sm-6 m-auto">
                                <table class="table">
                                    <tr>
                                        <td>Total Belanja</td>
                                        <td>Rp. <?= number_format($detail['transaksi']->total_order)  ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.row -->
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button onclick="window.print();" class="btn btn-success float-right"><i class="far fa-credit-card"></i>
                                    Print
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>