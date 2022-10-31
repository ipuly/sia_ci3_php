 <div id="layoutSidenav_content">
 	<main>
 		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
 			<div class="container-fluid px-4">
 				<div class="page-header-content">
 					<div class="row align-items-center justify-content-between pt-3">
 						<div class="col-auto mb-3">
 							<h1 class="page-header-title">
 								<div class="page-header-icon"><i data-feather="user"></i></div>
 								Data Kurikulum
 							</h1>
 						</div>
 						<div class="col-12 col-xl-auto mb-3">
 							<a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('kurikulum/kurikulum_tambah'); ?>">
 								<i class="me-1" data-feather="user-plus"></i>
 								Tambah Kurikulum
 							</a>
 						</div>
 					</div>
 				</div>
 			</div>
 		</header>
        <?php echo $this->session->flashdata('pesan') ?>
 		<!-- Main page content-->
 		<div class="container-fluid px-4">
 			<div class="card">
 				<div class="card-body">
 					<table id="datatablesSimple">
 						<thead>
 							<tr>
 								<th width="1%">No</th>
 								<th>Nama Kurikulum</th>
 								<th width="11%">Opsi</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php foreach ($kurikulum as $key => $value) : ?>
 								<tr>
 									<td><?= $key + 1 ?></td>
 									<td><?= $value->nama_kurikulum ?></td>
 									<td>
 										<a href="<?php echo base_url() . 'kurikulum/kurikulum_edit/' . $value->id_kurikulum; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
 										<a href="<?php echo base_url() . 'kurikulum/kurikulum_hapus/' . $value->id_kurikulum; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
 									</td>
 								</tr>
 							<?php endforeach ?>
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</main>