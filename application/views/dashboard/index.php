<div id="layoutSidenav_content">
	<main>
		<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
			<div class="container-xl px-4">
				<div class="page-header-content pt-4">
					<div class="row align-items-center justify-content-between">
						<div class="col-auto mt-4">
							<h1 class="page-header-title">
								<div class="page-header-icon"><i data-feather="activity"></i></div>
								Dashboard
							</h1>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Main page content-->
		<div class="container-xl px-4 mt-n10">
			<div class="row">
				<div class="col-xxl-4 col-xl-12 mb-4">
					<div class="card h-100">
						<div class="card-body h-100 p-5">
							<div class="row align-items-center">
								<div class="col-xl-8 col-xxl-12">
									<div class="text-center text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
										<h1 class="text-primary">Halo <?= $this->session->userdata('nama') ?>,</h1>
										<p class="text-gray-700 mb-0">Selamat datang, anda sedang mengakses
											<b>Website Sistem Akademik Coding Politeknik Gajah Tunggal</b>
										</p>
									</div>
								</div>
								<div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid" src="<?php echo base_url(); ?>assets/template/assets/img/illustrations/coding.svg" style="max-width: 10rem" /></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>