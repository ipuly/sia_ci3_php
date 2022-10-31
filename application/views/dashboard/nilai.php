<div id="layoutSidenav_content">
	<main>
		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
			<div class="container-fluid px-4">
				<div class="page-header-content">
					<div class="row align-items-center justify-content-between pt-3">
						<div class="col-auto mb-3">
							<h1 class="page-header-title">
								<div class="page-header-icon"><i data-feather="award"></i></div>
								Nilai
							</h1>
						</div>
						<div class="col-12 col-xl-auto mb-3">
							<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i data-feather="printer"></i> Cetak Nilai</a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?php echo $this->session->flashdata('pesan') ?>
		<div class="container-fluid">
			<div class="col">
				<div class="row">
					<div class="col-lg">
						<!-- DataTales Example -->
						<div class="card card-header-actions shadow mb-4">
							<div class="card-header">
								Daftar Nilai Mahasiswa
								<a class="btn btn-sm btn-primary" type="button" href="<?php echo base_url('nilai/nilai_tambah'); ?>">Tambah Nilai</a>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="datatablesSimple">
										<thead>
											<tr>
												<th width="1%">No</th>
												<th>NIM</th>
												<th>Nama</th>
												<th>Mata Kuliah</th>
												<th>SKS</th>
												<th>Nilai</th>
												<th>Grade</th>
												<th>Poin</th>
												<th width="11%">Opsi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($krs as $key => $value) : ?>
												<tr>
													<td><?= $key + 1 ?></td>
													<td><?= $value->nomor_identitas ?></td>
													<td><?= $value->nama ?></td>
													<td><?= $value->nama_matakuliah ?></td>
													<td><?= $value->jumlah_sks ?></td>
													<td><?= $value->nilai?></td>
													<td><?= $value->grade?></td>
													<td><?= $value->poin?></td>
													<td>
														<a href="<?php echo base_url() . 'nilai/nilai_edit/' . $value->id_nilai; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
														<a href="<?php echo base_url() . 'nilai/nilai_hapus/' . $value->id_nilai; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
													</td>
												</tr>
											<?php endforeach ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>