<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Update Dosen
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('user/dosen'); ?>">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke Data Dosen
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
                    <?php echo $this->session->flashdata('pesan') ?>
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Detail Pengguna</div>
                        <div class="card-body">


                            <form method="post" action="<?php echo base_url('user/dosen_update') ?>">

                                <!-- Form Row-->
                                <!-- id -->
                                <input type="text" name="id" id="id" value="<?= $user[0]->id_user?>" hidden>
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Nama)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputNama">Nama</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama pengguna .." value="<?= $user[0]->nama ?>">
                                        <?php echo form_error('nama', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                    </div>

                                    <!-- Form Group (Username)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputUsername">Username</label>
                                        <input type="text" name="username" class="form-control" readonly placeholder="Masukkan username pengguna.." value="<?= $user[0]->username ?>">
                                    </div>
                                </div>

                                <!-- Form Group (Password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputPassword">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan password pengguna.." value="<?= $user[0]->password ?>">
                                    <?php echo form_error('password', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                </div>

                                <!-- Form Group (Email)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmail">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Masukkan email pengguna.." value="<?= $user[0]->email ?>">
                                    <?php echo form_error('email', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                </div>

                                <!-- Form Group (Alamat)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputAlamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat pengguna.." value="<?= $user[0]->alamat ?>">
                                    <?php echo form_error('alamat', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                </div>

                                <!-- Form Group (No HP)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputNohp">No Telepon</label>
                                    <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No Telepon pengguna.." value="<?= $user[0]->no_hp ?>">
                                    <?php echo form_error('no_hp', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1">Level</label>
                                    <select class="form-control" name="level" aria-label="Default select example">
                                        <?php if ($user[0]->level === '0') : ?>
                                            <option value="0" selected>Staff</option>
                                            <option value="1">Mahasiswa</option>
                                            <option value="2">Dosen</option>
                                        <?php elseif ($user[0]->level === '1') : ?>
                                            <option value="0">Staff</option>
                                            <option value="1" selected>Mahasiswa</option>
                                            <option value="2">Dosen</option>
                                        <?php else : ?>
                                            <option value="0">Staff</option>
                                            <option value="1">Mahasiswa</option>
                                            <option value="2" selected>Dosen</option>
                                        <?php endif ?>
                                    </select>
                                    <?php echo form_error('level', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                </div>

                                <!-- Form Group (Status)-->
                                <div class="mb-3">
                                    <label class="small mb-1">Status</label>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <?php if ($user[0]->status === '0') : ?>
                                            <option value="0" selected>Aktif</option>
                                            <option value="1">Tidak Aktif</option>
                                        <?php else : ?>
                                            <option value="0">Aktif</option>
                                            <option value="1" selected>Tidak Aktif</option>
                                        <?php endif ?>
                                    </select>
                                    <?php echo form_error('status', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                </div>

                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>