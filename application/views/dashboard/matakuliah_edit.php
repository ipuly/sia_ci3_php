<div id="layoutSidenav_content">
	<main>
		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
			<div class="container-xl px-4">
				<div class="page-header-content">
					<div class="row align-items-center justify-content-between pt-3">
						<div class="col-auto mb-3">
							<h1 class="page-header-title">
								<div class="page-header-icon"><i data-feather="user"></i></div>
								Update Mata Kuliah
							</h1>
						</div>
						<div class="col-12 col-xl-auto mb-3">
							<a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('matakuliah');?>">
								<i class="me-1" data-feather="arrow-left"></i>
								Kembali ke Data Mata Kuliah
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
						<div class="card-header">Detail Mata Kuliah</div>
						<div class="card-body">
							<?php foreach($matakuliah as $p){ ?>
								<form method="post" action="<?php echo base_url('matakuliah/matakuliah_update') ?>">
									<!-- Form Row-->
									<div class="row gx-3 mb-3">

										<!-- Form Group (NIM)-->
										<div class="col-md-6">
											<label class="small mb-1" for="inputKodeMakul">Kode Mata Kuliah</label>
											<input type="hidden" name="id" value="<?php echo $p->id_matakuliah; ?>">
											<input type="text" disabled name="kode_matakuliah" class="form-control" placeholder="Masukkan Kode Mata Kuliah .." value="<?php 	echo $p->kode_matakuliah; ?>">
											<?php echo form_error('kode_matakuliah'); ?>
										</div>

										<!-- Form Group (Mahasiswa)-->
										<div class="col-md-6">
											<label class="small mb-1" for="inputNamaMakul">Nama Mata Kuliah</label>
											<input type="hidden" name="nama_matakuliah" value="<?php echo $p->nama_matakuliah; ?>">
											<input type="text" name="nama_matakuliah" class="form-control" value="<?php echo $p->nama_matakuliah; ?>">
											<?php echo form_error('nama_matakuliah'); ?>
										</div>
									</div>

									<!-- Form Group (SKS)-->
										<div class="col-md-12">
											<label class="small mb-1" for="inputSks">SKS</label>
											<input type="text" name="sks" class="form-control" value="<?php echo $p->jumlah_sks; ?>">
											<?php echo form_error('jumlah_sks'); ?>
										</div>

									<!-- Submit button-->
									<button class="btn btn-primary" type="submit">Simpan Perubahan</button>
								</form>

							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>