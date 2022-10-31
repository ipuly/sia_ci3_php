<div id="layoutSidenav_content">
	<main>
		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
			<div class="container-xl px-4">
				<div class="page-header-content">
					<div class="row align-items-center justify-content-between pt-3">
						<div class="col-auto mb-3">
							<h1 class="page-header-title">
								<div class="page-header-icon"><i data-feather="user-plus"></i></div>
								Kartu Hasil Studi
							</h1>
						</div>
						<div class="col-12 col-xl-auto mb-3">
                            <a href="<?php echo base_url('khs/print'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i data-feather="printer"></i> Cetak KHS</a>

                            <a href="<?php echo base_url('khs/print_excel'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i data-feather="file-text"></i> Cetak Excel</a>
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
						<div class="card-header">Data Kartu Hasil Studi</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Matakuliah</th>
										<th scope="col">Dosen</th>
										<th>SKS</th>
										<th scope="col">Nilai</th>
										<th>Grade</th>
										<th scope="col">Poin</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($khs as $key => $value) : ?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td><?= $value->nama_matakuliah ?></td>
											<td><?= $value->nama ?></td>
											<td><?= $value->jumlah_sks?></td>
											<td><?= $value->nilai ?></td>
											<td><?= $value->grade ?></td>
											<td><?= $value->poin ?></td>
										</tr>
									<?php endforeach ?>
									<tr>
										<td colspan="6"><strong>IPK</strong></td>
										<?php $total = 0; $totalSks = 0;?>
										<?php foreach ($khs as $key => $value) : ?>
											<?php $total += $value->jumlah_sks * $value->poin; $totalSks += $value->jumlah_sks; ?>
										<?php endforeach ?>

										<td><?= $total / $totalSks?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>