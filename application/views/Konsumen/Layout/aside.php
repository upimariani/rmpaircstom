<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4">
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
				<a href="#" class="d-block">KONSUMEN</a>
				<p>Selamat Datang</p>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

				<li class="nav-item">
					<a href="<?= base_url('Konsumen/cHalamanUtama') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Konsumen' && $this->uri->segment(2) == 'cHalamanUtama') {
																							echo 'active';
																						}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Katalog</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Konsumen/cTransaksiKonsumen') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Konsumen' && $this->uri->segment(2) == 'cTransaksiKonsumen') {
																									echo 'active';
																								}  ?>">
						<i class="nav-icon fas fa-tags"></i>
						<p>Transaksi Saya</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Konsumen/cAuth/logout') ?>" class="nav-link">
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