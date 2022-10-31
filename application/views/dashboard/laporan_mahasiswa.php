<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="printer"></i></div>
                                Cetak Data Nilai Mahasiswa
                            </h1>
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
                        <div class="card-header">Filter Cetak</div>
                        <div class="card-body">

                            <form method="post" action="<?php echo base_url('laporan/cetak') ?>">
                                <!-- Form Row-->
                                <!-- <div class="row gx-3 mb-3"> -->
                                    <!-- Form Group (Semester)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="inputSemester">Semester</label>
                                        <select class="form-select" id="inputSemester" name="semester">
                                            <option value="" selected disabled>Pilih Semester</option>
                                            <?php $a=1; while ($a <= 8) : ?>
                                                <option value="<?= $a ?>"><?= $a ?></option>
                                            <?php $a++; endwhile; ?>
                                        </select>
                                    </div>
                                    <!-- Form Group (Nama Mahasiswa)-->
                                    <div class="col-md-6 mb-3">
                                        <label class="small mb-1" for="inputNamaMahasiswa">Mahasiswa</label>
                                        <select class="form-select" id="inputNamaMahasiswa" name="mahasiswa">
                                            <option value="" selected disabled>Pilih Mahasiswa</option>
                                            <?php  foreach ($mahasiswa as $key => $value) : ?>
                                                <option value="<?= $value->nama ?>"><?= $value->nama ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <!-- Submit button-->
                                    <div class="box-footer mt-2">
                                        <input type="submit" class="btn btn-primary" value="Cetak">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>