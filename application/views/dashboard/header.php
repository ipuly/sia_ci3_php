<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<title>SIA Coding PGT</title>
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/template/css/styles.css" rel="stylesheet" />
	<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/template/assets/img/icon.png" />
	<script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>

<body class="nav-fixed">
	<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
		<!-- Sidenav Toggle Button-->
		<button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
		<!-- Navbar Brand-->
		<!-- * * Tip * * You can use text or an image for your navbar brand.-->
		<!-- * * * * * * When using an image, we recommend the SVG format.-->
		<!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
		<a class="navbar-brand pe-3 ps-4 ps-lg-2" href="dasboard">SIA Coding PGT</a>
		<!-- Navbar Search Input-->
		<!-- * * Note: * * Visible only on and above the lg breakpoint-->
		<form class="form-inline me-auto d-none d-lg-block me-3">
			<div class="input-group input-group-joined input-group-solid">
				<input class="form-control pe-0" type="search" placeholder="Search" aria-label="Search" />
				<div class="input-group-text"><i data-feather="search"></i></div>
			</div>
		</form>
		<!-- Navbar Items-->
		<ul class="navbar-nav align-items-center ms-auto">
			<!-- Navbar Search Dropdown-->
			<!-- * * Note: * * Visible only below the lg breakpoint-->
			<li class="nav-item dropdown no-caret me-3 d-lg-none">
				<a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>
				<!-- Dropdown - Search-->
				<div class="dropdown-menu dropdown-menu-end p-3 shadow animated--fade-in-up" aria-labelledby="searchDropdown">
					<form class="form-inline me-auto w-100">
						<div class="input-group input-group-joined input-group-solid">
							<input class="form-control pe-0" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
							<div class="input-group-text"><i data-feather="search"></i></div>
						</div>
					</form>
				</div>
			</li>
			<!-- User Dropdown-->
			<li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
				<a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="<?php echo base_url(); ?>assets/template/assets/img/illustrations/profiles/profile-1.png" /></a>
				<div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
					<h6 class="dropdown-header d-flex align-items-center">
						<img class="dropdown-user-img" src="<?php echo base_url(); ?>assets/template/assets/img/illustrations/profiles/profile-1.png" />
						<div class="dropdown-user-details">
							<div class="dropdown-user-details-name"><?= $this->session->userdata('nama') ?></div>
							<?php if ($this->session->userdata('level') === '0') : ?>
								<div class="dropdown-user-details-email">Staff</div>
							<?php elseif ($this->session->userdata('level') === '1') : ?>
								<div class="dropdown-user-details-email">Mahasiswa</div>
							<?php else : ?>
								<div class="dropdown-user-details-email">Dosen</div>
							<?php endif ?>
						</div>
					</h6>
					<div class="dropdown-divider"></div>
					<!-- <a class="dropdown-item" href="#!">
						<div class="dropdown-item-icon"><i data-feather="settings"></i></div>
						Account
					</a> -->
					<a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">
						<div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
						Logout
					</a>
				</div>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sidenav shadow-right sidenav-light">
				<div class="sidenav-menu">
					<div class="nav accordion" id="accordionSidenav">

						<!-- Sidenav Menu Heading (Papan Informasi)-->
						<div class="sidenav-menu-heading">Papan Informasi</div>
						<a class="nav-link" href="<?= base_url('dashboard') ?>">
							<div class="nav-link-icon"><i data-feather="home"></i></div>
							Dashboard
						</a>

						<?php if ($this->session->userdata('level') == "0") : ?>
							<!-- Sidenav Menu Heading (Dosen)-->
							<a class="nav-link" href="<?= base_url('user/dosen') ?>">
								<div class="nav-link-icon"><i data-feather="user"></i></div>
								Dosen
							</a>
							<!-- Sidenav Menu Heading (Mahasiswa)-->
							<a class="nav-link" href="<?= base_url('user/mahasiswa') ?>">
								<div class="nav-link-icon"><i data-feather="user"></i></div>
								Mahasiswa
							</a>
						<?php endif ?>

						<?php if ($this->session->userdata('level') == "2" || $this->session->userdata('level') == "2") : ?>
							<!-- Sidenav Menu Heading (Nilai)-->
							<a class="nav-link" href="<?= base_url('nilai') ?>">
								<div class="nav-link-icon"><i data-feather="award"></i></div>
								Nilai
							</a>
							<!-- Sidenav Menu Heading (Evaluasi)-->
							<!-- <a class="nav-link" href="<?= base_url('evaluasi/lihat_evaluasi') ?>">
								<div class="nav-link-icon"><i data-feather="message-circle"></i></div>
								Lihat Evaluasi
							</a> -->
							<!-- Sidenav Menu Heading (Setting Account)-->
							<a class="nav-link" href="<?= base_url('user/dosen_setting') ?>">
								<div class="nav-link-icon"><i data-feather="message-circle"></i></div>
								Setting Account
							</a> 
						<?php endif ?>

						<?php if ($this->session->userdata('level') == "0") : ?>
							<!-- Sidenav Menu Heading (Mata Kuliah)-->
							<a class="nav-link" href="<?= base_url('matakuliah') ?>">
								<div class="nav-link-icon"><i data-feather="book-open"></i></div>
								Mata Kuliah
							</a>
						<?php endif ?>

						<?php if ($this->session->userdata('level') == "0") : ?>
							<!-- Sidenav Menu Heading (Kurikulum)-->
							<a class="nav-link" href="<?= base_url('kurikulum') ?>">
								<div class="nav-link-icon"><i data-feather="calendar"></i></div>
								Kurikulum
							</a>
						<?php endif ?>

						<!-- Sidenav Menu Heading (KRS)-->
						<?php if ($this->session->userdata('level') == "1" || $this->session->userdata('level') == "1") : ?>
							<a class="nav-link" href="<?= base_url('krs') ?>">
								<div class="nav-link-icon"><i data-feather="home"></i></div>
								KRS
							</a>
							<a class="nav-link" href="<?= base_url('khs') ?>">
								<div class="nav-link-icon"><i data-feather="home"></i></div>
								KHS
							</a>
							<!-- Sidenav Menu Heading (Evaluasi)-->
							<!-- <a class="nav-link" href="<?= base_url('evaluasi/isi_evaluasi') ?>">
								<div class="nav-link-icon"><i data-feather="message-circle"></i></div>
								Isi Evaluasi
							</a>  -->
							<!-- Sidenav Menu Heading (Setting Account)-->
							<a class="nav-link" href="<?= base_url('user/mahasiswa_setting') ?>">
								<div class="nav-link-icon"><i data-feather="message-circle"></i></div>
								Setting Account
							</a> 
						<?php endif ?>

						<?php
						if ($this->session->userdata('level') == "0") {
						?>
							<a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseCetak" aria-expanded="false" aria-controls="collapseCetak">
								<div class="nav-link-icon"><i data-feather="file-text"></i></div>
								Laporan
								<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
							<div class="collapse" id="collapseCetak" data-bs-parent="#accordionSidenav">
								<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
									<a class="nav-link" href="<?php echo base_url('laporan') ?>">Laporan Nilai Mahasiswa</a>
								</nav>
							</div>
						<?php
						}
						?>
						<!-- Sidenav Heading (Konfigurasi)-->
						<?php
						if ($this->session->userdata('level') == "0") {
						?>
							<div class="sidenav-menu-heading">Konfigurasi</div>
							<!-- Sidenav Link (Users)-->
							<a class="nav-link" href="<?= base_url('user') ?>">
								<div class="nav-link-icon"><i data-feather="user-check"></i></div>
								Pengguna
							</a>
						<?php
						}
						?>
					</div>
				</div>
				<!-- Sidenav Footer-->
				<div class="sidenav-footer">
					<div class="sidenav-footer-content">
						<div class="sidenav-footer-subtitle">
							Logged in as:
							<?php if ($this->session->userdata('level') === '0') : ?>
								Staff
							<?php elseif ($this->session->userdata('level') === '1') : ?>
								Mahasiswa
							<?php else : ?>
								Dosen
							<?php endif ?>
						</div>
					</div>
				</div>
			</nav>
		</div>