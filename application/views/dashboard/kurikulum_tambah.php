<div id="layoutSidenav_content">
  <main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
      <div class="container-xl px-4">
        <div class="page-header-content">
          <div class="row align-items-center justify-content-between pt-3">
            <div class="col-auto mb-3">
              <h1 class="page-header-title">
                <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                Tambah kurikulum
              </h1>
            </div>
            <div class="col-12 col-xl-auto mb-3">
              <a class="btn btn-sm btn-light text-primary" href="<?php echo base_url('kurikulum/kurikulum'); ?>">
                <i class="me-1" data-feather="arrow-left"></i>
                Kembali ke data Kurikulum
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
            <div class="card-header">Tambah Kurikulum</div>
            <div class="card-body">
              <form method="post" action="<?php echo base_url('kurikulum/kurikulum_aksi') ?>">
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                  <!-- Form Group (Nama Kurikulum)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputKurikulum">Nama Kurikulum</label>
                    <input class="form-control" id="inputKurikulum" type="text" name="nama_kurikulum" placeholder="Masukkan Nama Kurikulum" value="" />
                  </div>
                </div>
                <!-- Submit button-->
                <div class="box-footer">
                  <input type="submit" class="btn btn-success" value="Simpan">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>