 <div id="layoutSidenav_content">
 	<main>
 		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
 			<div class="container-fluid px-4">
 				<div class="page-header-content">
 					<div class="row align-items-center justify-content-between pt-3">
 						<div class="col-auto mb-3">
 							<h1 class="page-header-title">
 								<div class="page-header-icon"><i data-feather="book-open"></i></div>
 								Data Mata Kuliah
 							</h1>
 						</div>
 						<div class="col-12 col-xl-auto mb-3">

 							<a href="<?php echo base_url('matakuliah/matakuliah_cetak'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i data-feather="printer"></i> Cetak Data</a>

 							<a href="<?php echo base_url('matakuliah/matakuliah_cetak_excel'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i data-feather="file-text"></i> Cetak Excel</a>

 							<a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('matakuliah/matakuliah_tambah'); ?>">
 								<i class="me-1" data-feather="user-plus"></i>
 								Tambah Mata Kuliah
 							</a>
 						</div>
 					</div>
 				</div>
 			</div>
 		</header>
 		<!-- Main page content-->
 		<div class="container-fluid px-4">
 			<div class="card">
 				<div class="card-body">
 					<table id="datatablesSimple">
 						<thead>
 							<tr>
 								<th width="1%">No</th>
 								<th>Kode Mata Kuliah</th>
 								<th>Nama Mata Kuliah</th>
 								<th>Nama Dosen</th>
 								<th>Kurikulum</th>
 								<th>Semester</th>
 								<th>SKS</th>
 								<th width="11%">Opsi</th>
 							</tr>
 						</thead>
 						<tbody>

 							<?php
 							$no = 1;
 							foreach ($matakuliah as $p) {
 								?>
 								<tr>
 									<td><?php echo $no++; ?></td>
 									<td><?php echo $p->kode_matakuliah; ?></td>
 									<td><?php echo $p->nama_matakuliah; ?></td>
 									<td><?php echo $p->nama; ?></td>
 									<td><?php echo $p->nama_kurikulum; ?></td>
 									<td>
 										<?php if ($p->semester == '1') : ?>
 											Ganjil
 										<?php else : ?>
 											Genap
 										<?php endif ?>
 									</td>
 									<td><?php echo $p->jumlah_sks; ?></td>
 									<td>
 										<a href="<?php echo base_url() . 'matakuliah/matakuliah_edit/' . $p->id_matakuliah; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
 										<a href="<?php echo base_url() . 'matakuliah/matakuliah_hapus/' . $p->id_matakuliah; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
 									</td>
 								</tr>
 							<?php } ?>
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</main>