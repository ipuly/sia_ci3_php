<div id="layoutSidenav_content">
	<main>
		<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
			<div class="container-xl px-4">
				<div class="page-header-content">
					<div class="row align-items-center justify-content-between pt-3">
						<div class="col-auto mb-3">
							<h1 class="page-header-title">
								<div class="page-header-icon"><i data-feather="user"></i></div>
								Update Kurikulum
							</h1>
						</div>
						<div class="col-12 col-xl-auto mb-3">
							<a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('kurikulum'); ?>">
								<i class="me-1" data-feather="arrow-left"></i>
								Kembali ke Data Kurikulum
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
						<div class="card-header">Detail Kurikulum</div>
						<div class="card-body">
							<?php foreach ($kurikulum as $key => $value) : ?>
								<form method="post" action="<?php echo base_url('kurikulum/kurikulum_update') ?>">
									<!-- Form Row-->
									<div class="row gx-3 mb-3">
										<!-- Form Group (Nama Kurikulum)-->
										<div class="col-md-6">
											<label class="small mb-1" for="inputKurikulum">Kurikulum</label>
											<input name="id" value="<?php echo $value->id_kurikulum; ?>" hidden>
											<input type="text" name="nama_kurikulum" class="form-control" placeholder="Masukkan Nama Kurikulum .." value="<?php echo $value->nama_kurikulum; ?>">
											
											<button class="btn btn-primary mt-5" type="submit">Simpan Perubahan</button>
											<?php echo form_error('nama_kurikulum'); ?>
										</div>
								</form>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>