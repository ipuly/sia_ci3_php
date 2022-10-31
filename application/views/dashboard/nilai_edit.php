<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                                Edit Nilai
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('nilai'); ?>">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Nilai
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
                        <div class="card-header">Nilai</div>
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url('nilai/nilai_update/'). $id_nilai ?>">
                                <!-- Makul -->
                                <div class="col-md-6 mb-3">
                                    <label class="small mb-1">Mata Kuliah</label>
                                    <select class="form-control" name="makul">
                                        <?php foreach ($matakuliah as $key => $value) : ?>
                                            <option value="<?= $value->id_krs ?>"><?= $value->nama_matakuliah . " - Mahasiswa = " . $value->nama?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="small mb-1" for="inputNilai">Nilai</label>
                                    <input class="form-control" id="inputNilai" type="number" name="nilai" placeholder="Masukkan Nilai Mata Kuliah" min="0" max="100" required />
                                </div>
                                <!-- Submit button-->
                                <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>