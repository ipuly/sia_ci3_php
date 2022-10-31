<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                                Tambah Dosen
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('user/dosen');?>">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke data Dosen
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <?php echo $this->session->flashdata('pesan') ?>
                <div>
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Tambah Dosen</div>
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url('user/dosen_aksi') ?>">
                                <!-- Form Row-->
                                <!-- <div class="row gx-3 mb-3"> -->
                                    <!-- Form Group (Nim)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputNip">NIP</label>
                                        <input class="form-control" id="inputNip" type="text" name="username" placeholder="Masukkan NIP" value="" />
                                        <?php echo form_error('username', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                    </div>
                                    <!-- Form Group (Nama)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputNama">Nama Dosen</label>
                                        <input class="form-control" id="inputNama" type="text" name="nama_dosen" placeholder="Masukkan Nama Dosen" value="" />
                                        <?php echo form_error('nama_dosen', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                    </div>
                                    <!-- </div> -->
                                    <!-- Form Group (Email)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputEmail">Email Dosen</label>
                                        <input class="form-control" id="inputEmail" type="email" name="email" placeholder="Masukkan Email Dosen" value="" />
                                        <?php echo form_error('email', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                    </div>
                                    <!-- Form Group (Email)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputAlamat">Alamat Dosen</label>
                                        <textarea class="form-control" id="inputAlamat" type="text" name="alamat" placeholder="Masukkan Alamat Dosen" value="" /></textarea>
                                        <?php echo form_error('alamat', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                    </div>
                                    <!-- Form Group (No HP)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputNohp">Nomor HP Dosen</label>
                                        <input class="form-control" id="inputEmail" type="text" name="no_hp" placeholder="Masukkan Nomor HP Dosen" value="" />
                                        <?php echo form_error('no_hp', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                    </div>
                                    <!-- Submit button-->
                                    <div class="box-footer mt-2">
                                        <input type="submit" class="btn btn-success" value="Simpan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>