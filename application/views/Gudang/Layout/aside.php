<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-danger elevation-4">
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
				<a href="#" class="d-block">Gudang</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

				<li class="nav-item">
					<a href="<?= base_url('Gudang/cDashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cDashboard') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cBahanBaku') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cBahanBaku') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-tag"></i>
						<p>Informasi Bahan Baku</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cTransaksiBB') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cTransaksiBB') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon fas fa-barcode"></i>
						<p>Transaksi Bahan Baku</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cManufacturing') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cManufacturing') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon fas fa-undo"></i>
						<p>Manufacturing</p>
					</a>
				</li>
				<?php
				$query = $this->db->query("SELECT COUNT(id_transaksi) as jml FROM `transaksi_cust` WHERE status_order=1;")->row();

				?>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cTransaksiPelanggan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cTransaksiPelanggan') {
																								echo 'active';
																							}  ?>">
						<i class="nav-icon fas fa-shopping-cart"></i>
						<p>Transaksi Pelanggan </p><span class="badge badge-success"><?= $query->jml ?></span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Gudang/cTransaksiLangsung') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Gudang' && $this->uri->segment(2) == 'cTransaksiLangsung') {
																								echo 'active';
																							}  ?>">
						<i class="nav-icon fas fa-map"></i>
						<p>Transaksi Langsung </p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('cLogin/logout') ?>" class="nav-link">
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