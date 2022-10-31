<div id="layoutSidenav_content">
	<main>
		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
			<div class="container-xl px-4">
				<div class="page-header-content">
					<div class="row align-items-center justify-content-between pt-3">
						<div class="col-auto mb-3">
							<h1 class="page-header-title">
								<div class="page-header-icon"><i data-feather="user-plus"></i></div>
								Tambah Kartu Rencana Studi
							</h1>
						</div>
						<!-- <div class="col-12 col-xl-auto mb-3">
							<a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('krs'); ?>">
								<i class="me-1" data-feather="arrow-left"></i>
								Kembali ke data KRS
							</a>
						</div> -->
					</div>
				</div>
			</div>
		</header>
		<?php echo $this->session->flashdata('pesan'); ?>
		<!-- Main page content-->
		<div class="container-xl px-4 mt-4">
			<div class="row">

				<div>
					<!-- Account details card-->
					<div class="card mb-4">
						<div class="card-header">Input Data KRS</div>
						<div class="card-body">
							<form method="post" action="<?php echo base_url('krs/krs_aksi') ?>">
								<!-- Form Row-->
								<div class="row gx-3 mb-3">
									<div class="col-md-6 mb-3">
										<label class="small mb-1" for="inputMatakuliah">Matakuliah</label>
										<select class="form-select" id="inputMatakuliah" name="matakuliah">
											<?php foreach ($matakuliah as $key => $value) : ?>
												<option value="<?= $value->id_matakuliah ?>"><?= $value->nama_matakuliah ?></option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="col-md-6 mb-3">
										<label class="small mb-1" for="inputTahunAjaran">Tahun Ajaran</label>
										<input class="form-control" type="text" name="tahun" id="inputTahunAjaran" value="<?= date('Y') . "/" . date('Y', strtotime('+1 year')) ?>" readonly>
									</div>
								</div>
								<!-- Submit button-->
								<div class="box-footer">
									<input type="submit" class="btn btn-success" value="Tambah">
								</div>
							</form>
						</div>
					</div>

					<div class="card mb-4">
						<div class="card-header">Data KRS</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Matakuliah</th>
										<th scope="col">Dosen</th>
										<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($krs as $key => $value) : ?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td><?= $value->nama_matakuliah ?></td>
											<td><?= $value->nama?></td>
											<td><a href="<?php echo base_url() . 'krs/krs_hapus/' . $value->id_krs; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>