<div id="layoutSidenav_content">
	<main>
		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
			<div class="container-xl px-4">
				<div class="page-header-content">
					<div class="row align-items-center justify-content-between pt-3">
						<div class="col-auto mb-3">
							<h1 class="page-header-title">
								<div class="page-header-icon"><i data-feather="user-plus"></i></div>
								Tambah Mata Kuliah
							</h1>
						</div>
						<div class="col-12 col-xl-auto mb-3">
							<a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('matakuliah'); ?>">
								<i class="me-1" data-feather="arrow-left"></i>
								Kembali ke data Mata Kuliah
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
						<div class="card-header">Tambah Mata Kuliah</div>
						<div class="card-body">
							<form method="post" action="<?php echo base_url('matakuliah/matakuliah_proses') ?>">
								<!-- Form Row-->
								<div class="d-flex flex-column gx-3 mb-3">
									<!-- Form Group (Kode Mata Kuliah)-->
									<div class="col-md-6 mb-3">
										<label class="small mb-1" for="inputKodeMakul">Kode Mata Kuliah</label>
										<input class="form-control" id="inputKodeMakul" type="text" name="kode_matakuliah" placeholder="Masukkan Kode Mata Kuliah" required />
									</div>

									<!-- Form Group (Mata Kuliah)-->
									<div class="col-md-6 mb-3">
										<label class="small mb-1" for="inputMakul">Nama Mata Kuliah</label>
										<input class="form-control" id="inputMakul" type="text" name="nama_matakuliah" placeholder="Masukkan Nama Mata Kuliah" required />
									</div>
									<!-- Form Group (Kurikulum)-->
									<div class="col-md-6 mb-3">
										<label class="small mb-1" for="inputDosen">Dosen</label>
										<select class="form-select" id="inputDosen" name="dosen">
											<?php  foreach ($dosen as $key => $value) : ?>
												<option value="<?= $value->id_user ?>"><?= $value->nama ?></option>
											<?php endforeach ?>
										</select>
									</div>

									<!-- Form Group (Kurikulum)-->
									<div class="col-md-6 mb-3">
										<label class="small mb-1" for="inputKurikulum">Kurikulum</label>
										<select class="form-select" id="inputKurikulum" name="kurikulum">
											<?php foreach ($kurikulum as $key => $value) : ?>
												<option value="<?= $value->id_kurikulum ?>"><?= $value->nama_kurikulum ?></option>
											<?php endforeach ?>
										</select>
									</div>

									<!-- Form Group (Semester)-->
									<div class="col-md-6 mb-3">
										<label class="small mb-1" for="inputSemester">Semester</label>
										<select class="form-select" id="inputSemester" name="semester">
											<option value="1">Ganjil</option>
											<option value="2">Genap</option>
										</select>
									</div>

									<!-- Form Group (SKS)-->
									<div class="col-md-6 mb-3">
										<label class="small mb-1" for="inputSks">Jumlah SKS</label>
										<input class="form-control" id="inputSks" type="number" name="sks" placeholder="Masukkan Jumlah SKS" min="1" max="10" required />
									</div>
								</div>
								<!-- Submit button-->
								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Simpan">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>