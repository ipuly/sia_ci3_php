 <div id="layoutSidenav_content">
 	<main>
 		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
 			<div class="container-fluid px-4">
 				<div class="page-header-content">
 					<div class="row align-items-center justify-content-between pt-3">
 						<div class="col-auto mb-3">
 							<h1 class="page-header-title">
 								<div class="page-header-icon"><i data-feather="user"></i></div>
 								Data Mahasiswa
 							</h1>
 						</div>
 						<div class="col-12 col-xl-auto mb-3">

                                                 <a href="<?php echo base_url('user/mahasiswa_cetak'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i data-feather="printer"></i> Cetak Data</a>

                                                 <a href="<?php echo base_url('user/mahasiswa_cetak_excel'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i data-feather="file-text"></i> Cetak Excel</a>

                                                 <a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('user/mahasiswa_tambah'); ?>">
                                                      <i class="me-1" data-feather="user-plus"></i>
                                                      Tambah Mahasiswa
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
                       <th>NIM</th>
                       <th>Nama</th>
                       <th>Email</th>
                       <th>Alamat</th>
                       <th>No Telepon</th>
                       <th width="11%">Opsi</th>
                </tr>
         </thead>
         <tbody>
               <?php foreach ($mahasiswa as $key => $value) : ?>
                <tr>
                 <td><?= $key + 1 ?></td>
                 <td><?= $value->nomor_identitas ?></td>
                 <td><?= $value->nama ?></td>
                 <td><?= $value->email ?></td>
                 <td><?= $value->alamat ?></td>
                 <td><?= $value->no_hp ?></td>
                 <td>
                  <a href="<?php echo base_url() . 'user/mahasiswa_edit/' . $value->id_user; ?>" class="btn btn-warning btn-sm"> <i class="fa fa-pencil"></i> </a>
                  <a href="<?php echo base_url() . 'user/mahasiswa_hapus/' . $value->id_user; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
           </td>
    </tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>
</div>
</main>