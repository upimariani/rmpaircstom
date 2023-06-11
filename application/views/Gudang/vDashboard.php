<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard Gudang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $jml['bahanbaku']->produk ?></h3>

                            <p>Bahan Baku</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $jml['transaksi_bb']->tran_bb ?><sup style="font-size: 20px"></sup></h3>

                            <p>Transaksi Bahan Baku</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $jml['produk']->tran_cust ?></h3>

                            <p>Transaksi Produk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->


                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Informasi Stok Produk Jadi Gudang</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item</th>
                                            <th>Size</th>
                                            <th>Stok</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($stok_bb as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><a href="pages/examples/invoice.html"><?= $no++ ?></a></td>
                                                <td><?= $value->nama_produk ?></td>
                                                <td><?= $value->size ?></td>
                                                <td><?php
                                                    if ($value->stok_gudang <= 2) {
                                                    ?>
                                                        <span class="badge badge-danger"><?= $value->stok_gudang ?></span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="badge badge-success"><?= $value->stok_gudang ?></span>
                                                    <?php
                                                    }
                                                    ?>

                                                </td>
                                                <td><?php
                                                    if ($value->stok_gudang <= 2) {
                                                    ?>
                                                        <span class="badge badge-danger">Stok Produk Segera Habis!!!</span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="badge badge-success">Stok Produk Aman!!!</span>
                                                    <?php
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="<?= base_url('Gudang/cTransaksiBB') ?>" class="btn btn-sm btn-secondary float-right">Transaksi Bahan Baku</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>