<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SIA Poltek GT</title>
    <link href="<?php echo base_url();?>assets/template/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/template/assets/img/icon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <!-- Basic registration form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center"><h3 class="fw-light my-4">Create Account Dosen</h3></div>
                                <div class="card-body">
                                    <!-- Registration form-->
                                    <form method="post" action="<?php base_url('register/register_dosen') ?>">
                                        <!-- Form Row-->
                                        <div class="row gx-3">
                                            <!-- Form Group (NIP) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputNip" >NIP</label>
                                                <input class="form-control" id="inputNip" name="username" type="text" placeholder="Masukkan NIP Dosen" />
                                                <?php echo form_error('username', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                            </div>
                                            <!-- Form Group (Nama Dosen) -->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputNamaDosen">Nama Dosen</label>
                                                <input class="form-control" id="inputNamaDosen" name="nama" type="text" placeholder="Masukkan Nama Dosen" />
                                                <?php echo form_error('nama', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                            </div>
                                        </div>
                                        <!-- Form Password-->
                                        <div class="mb-3">
                                            <!-- Form Group (password)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                                <?php echo form_error('password', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                            </div>
                                        </div>
                                        <!-- Form Group (create account submit)-->
                                        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="<?php echo base_url().'login' ?>">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                    <div class="container-xl text-center">
                        <div class="row">
                            <div class="small">Copyright &copy; SIA Coding PGT 2022</div>
                        </div>
                    </div>
                </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
