<div id="layoutSidenav_content">
	<main>
		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
			<div class="container-xl px-4">
				<div class="page-header-content">
					<div class="row align-items-center justify-content-between pt-3">
						<div class="col-auto mb-3">
							<h1 class="page-header-title">
								<div class="page-header-icon"><i data-feather="user-plus"></i></div>
								Add User
							</h1>
						</div>
						<div class="col-12 col-xl-auto mb-3">
							<a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('user'); ?>">
								<i class="me-1" data-feather="arrow-left"></i>
								Back to Users List
							</a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Main page content-->
		<div class="container-xl px-4 mt-4">
			<div class="row">
				<div>
					<!-- Account details card-->
					<div class="card mb-4">
						<div class="card-header">Account Details</div>
						<div class="card-body">
							<form method="post" action="<?php echo base_url('user/user_aksi') ?>">
								<!-- Form Row-->
								<div class="row gx-3 mb-3">
									<!-- Form Group (Nama)-->
									<div class="col-md-6">
										<label class="small mb-1" for="inputNama">Nama</label>
										<input class="form-control" id="inputNama" type="text" name="nama" placeholder="Masukkan Nama" value="" />
									</div>
									<!-- Form Group (Username)-->
									<div class="col-md-6">
										<label class="small mb-1" for="inputUsername">Username</label>
										<input class="form-control" id="inputUsername" type="text" name="username" placeholder="Masukkan Username" value="" />
									</div>
								</div>
								<div class="form-group">
									<label class="small mb-1">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Masukkan password pengguna..">
									<?php echo form_error('password'); ?>
								</div>
								<!-- Form Group (email address)-->
								<!-- <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="" />
                                            </div> -->
								<!-- Form Group (Roles)-->
								<div class="mb-3">
									<label class="small mb-1">Level</label>
									<select class="form-select" aria-label="Default select example" name="level">
										<option selected disabled>- Pilih Level -</option>
										<option value="0">Admin</option>
										<option value="2">Dosen</option>
										<option value="1">Mahasiswa</option>
									</select>
								</div>
								<div class="form-group mb-3">
									<label class="small mb-1">Status</label>
									<select class="form-control" name="status">
										<option value="">- Pilih Status -</option>
										<option value="1">Aktif</option>
										<option value="0">Non-Aktif</option>
									</select>
									<?php echo form_error('status'); ?>
								</div>

								<!-- Submit button-->
								<button class="btn btn-primary" type="submit">Simpan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>