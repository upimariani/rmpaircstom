<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>User</h1>

				</div>

				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">DataTables</li>
					</ol>
				</div>

			</div>

		</div><!-- /.container-fluid -->
		<a href="<?= base_url('Admin/cUser/createUser') ?>" class="btn btn-app">
			<i class="fas fa-plus"></i> Tambah User
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
							<h3 class="card-title">Informasi User</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama User</th>
										<th>Alamat User</th>
										<th>No Telepon</th>
										<th>Username</th>
										<th>Password</th>
										<th>Tipe User</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($user as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->nama_user ?></td>
											<td><?= $value->alamat_user ?></td>
											<td><?= $value->no_hp_user ?></td>
											<td><?= $value->username ?></td>
											<td><?= $value->password ?></td>
											<td><?php if ($value->tipe_user == '1') {
													echo '<span class="badge badge-warning">Admin</span>';
												} else {
													echo '<span class="badge badge-danger">Gudang</span>';
												} ?></td>
											<td class="text-center"> <a href="<?= base_url('Admin/cUser/delete/' . $value->id_user) ?>" class="btn btn-app">
													<i class="fas fa-trash"></i> Hapus User
												</a> <a href="<?= base_url('Admin/cUser/edit/' . $value->id_user) ?>" class="btn btn-app">
													<i class="fas fa-edit"></i> Edit User
												</a></td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nama User</th>
										<th>Alamat User</th>
										<th>No Telepon</th>
										<th>Username</th>
										<th>Password</th>
										<th>Tipe User</th>
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