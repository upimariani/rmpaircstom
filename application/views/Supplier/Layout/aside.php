<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('asset/AdminLTE/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">RMPAIRCSTOM</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('asset/AdminLTE/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Supplier</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

				<li class="nav-item">
					<a href="<?= base_url('Supplier/cDashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Supplier' && $this->uri->segment(2) == 'cDashboard') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Supplier/cProduk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Supplier' && $this->uri->segment(2) == 'cProduk') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-tags"></i>
						<p>Data Produk</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Supplier/cSablon') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Supplier' && $this->uri->segment(2) == 'cSablon') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-tint"></i>
						<p>Data Sablon</p>
					</a>
				</li>
				<?php
				$notifikasi = $this->db->query("SELECT COUNT(id_invoice) as notifkasi FROM `invoice_bb` WHERE status_pesan=1;")->row();
				?>
				<li class="nav-item">
					<a href="<?= base_url('Supplier/cTransaksiSupplier') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Supplier' && $this->uri->segment(2) == 'cTransaksiSupplier') {
																									echo 'active';
																								}  ?>">
						<i class="nav-icon fas fa-shopping-cart"></i>
						<p>Data Transaksi</p><span class="badge badge-danger"><?= $notifikasi->notifkasi ?></span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('cLoginSupplier/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>SignOut</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>