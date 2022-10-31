<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SIA Coding GT</title>
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
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <?php echo $this->session->flashdata('pesan') ?>
                                    <!-- Login form-->
                                    <form action="<?php echo base_url().'login/aksi' ?>" method="post">
                                        <?php 
                                        if(isset($_GET['alert'])){
                                            if($_GET['alert']=="gagal"){
                                                echo "<div class='alert alert-danger font-weight-bold text-center'>Maaf! Username atau Password Salah.</div>";
                                            }else if($_GET['alert']=="belum_login"){
                                                echo "<div class='alert alert-danger font-weight-bold text-center'>Anda Harus Login Terlebih Dulu!</div>";
                                            }else if($_GET['alert']=="logout"){
                                                echo "<div class='alert alert-warning font-weight-bold text-center'>Anda Telah Logout!</div>";
                                            }else if($_GET['alert']=="belum_aktif"){
                                                echo "<div class='alert alert-danger font-weight-bold text-center'>Akun belum Aktif!</div>";
                                            }
                                        } 
                                        ?>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label for="username" class="small mb-1">Username</label>
                                            <input class="form-control" type="text" id="username" name="username" placeholder="Enter Username" />
                                            <?php echo form_error('username', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                        </div>
                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <label for="password" class="small mb-1">Password</label>
                                            <input class="form-control" type="password" id="password" name="password" placeholder="Enter password" />
                                            <?php echo form_error('password', '<div class="text-danger small ml-3 mt-1">','</div>'); ?>
                                        </div>
                                        <!-- Form Group (remember password checkbox)-->
                                        <!-- <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" id="rememberPasswordCheck" type="checkbox" value="" />
                                                <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
                                            </div>
                                        </div> -->
                                        <!-- Form Group (login box)-->
                                        <!-- <div class="d-flex align-items-center justify-content-between mt-4 mb-0"> -->
                                            <!-- <a class="small" href="auth-password-basic.html"></a> -->
                                            <div class="col-xs-4">
                                                <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                                            </div>
                                        <!-- </div> -->
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="<?php echo base_url('register/register_dosen') ?>">Register Dosen</a></div>
                                    <div class="small"><a href="<?php echo base_url().'register/register_mahasiswa' ?>">Register Mahasiswa</a></div>
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
</body>
</html>