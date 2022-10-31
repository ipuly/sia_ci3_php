 <div id="layoutSidenav_content">
 	<main>
 		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
 			<div class="container-fluid px-4">
 				<div class="page-header-content">
 					<div class="row align-items-center justify-content-between pt-3">
 						<div class="col-auto mb-3">
 							<h1 class="page-header-title">
 								<div class="page-header-icon"><i data-feather="user"></i></div>
 								Data Pengguna
 							</h1>
 						</div>
 						<div class="col-12 col-xl-auto mb-3">
 							<!-- <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
                                            <i class="me-1" data-feather="users"></i>
                                            Manage Groups
                                        </a> -->
 							<a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('user/user_tambah'); ?>">
 								<i class="me-1" data-feather="user-plus"></i>
 								Tambah Pengguna
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
 								<th>Nama</th>
 								<th>Username</th>
 								<th>Level</th>
 								<th>Status</th>
 								<th width="11%">Opsi</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php foreach ($user as $key => $value) : ?>
 								<tr>
 									<td><?= $key + 1 ?></td>
 									<td><?= $value->nama ?></td>
 									<td><?= $value->username ?></td>
 									<?php if ($value->level === '0') : ?>
 										<td>Staff</td>
 									<?php elseif ($value->level === '1') : ?>
 										<td>Mahasiswa</td>
 									<?php else : ?>
 										<td>Dosen</td>
 									<?php endif ?>
									 <?php if ($value->status === '0') : ?>
 										<td>Aktif</td>
 									<?php else : ?>
 										<td>Tidak Aktif</td>
 									<?php endif ?>
 									<td>
 										<a href="<?php echo base_url() . 'user/user_edit/' . $value->id_user; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
 										<a href="<?php echo base_url() . 'user/user_hapus/' . $value->id_user; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
 									</td>
 								</tr>
 							<?php endforeach ?>
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</main>