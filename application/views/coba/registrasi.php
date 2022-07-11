<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/profil.png') ?>">
    <link rel="icon" type="img/png" href="<?= base_url('assets/img/profil.png') ?>">
    <title>
        Registrasi
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('assets/css/soft-ui-dashboard.css?v=1.0.4'); ?>" rel="stylesheet" />
</head>

<body class="">

    <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
                style="background-image: url('assets/img/curved-images/curved14.jpg');">
                <span class="mask bg-gradient-info opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center"></div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-5 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0">
                            <div class="card-header text-center pt-4">
                                <h3 class="font-weight-bolder text-info text-gradient">Tambah Data</h3>
                            </div>
                            <div class="row px-xl-3 px-sm-2 px-3">

                            </div>
                            <div class="container">
                                <form method="post" action="<?= base_url('index.php/Login/registrasi'); ?>" enctype="
                                    multipart/form-data">

                                    <!--<form role="form text-left" class="user" method="post" enctype="multipart/form-data"
                                    action="<?= base_url('index.php/Login/registrasi'); ?>">-->
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name"
                                            id="name" value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Email" name="email"
                                            id="email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="Username" name="username"
                                            id="username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password1" id="password1">
                                        <?= form_error('password', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Repeat Password"
                                            name="password2" id="password2">
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" placeholder="Level" name="level" id="level"
                                            value="<?= set_value('level'); ?>">
                                            <option value="pilih">Pilih Level</option>
                                            <option value="admin">Admin</option>
                                            <option value="member">Member</option>
                                        </select>
                                        <?= form_error('level', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" placeholder="Role_id" name="role_id" id="role_id"
                                            value="<?= set_value('role_id'); ?>">
                                            <option value="pilih">Pilih Role_id</option>
                                            <option value="1">Admin/1</option>
                                            <option value="0">Member/0</option>
                                        </select>
                                        <?= form_error('role_id', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" class="form-control" name="image" id="image"
                                            value="<?= set_value('image'); ?>">
                                        <?= form_error('image', '<small class="text-danger" pl-3>', '</small>'); ?>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign
                                            up</button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">Already have an account? <a href="index"
                                            class="text-dark font-weight-bolder">Sign in</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <footer class="footer py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-4 mx-auto text-center">
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Company
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            About Us
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Team
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Products
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Blog
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Pricing
                        </a>
                    </div>
                    <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-dribbble"></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-twitter"></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-instagram"></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-pinterest"></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-github"></span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 mx-auto text-center mt-1">
                        <p class="mb-0 text-secondary">
                            Copyright © <script>
                            document.write(new Date().getFullYear())
                            </script> Soft by Creative Tim.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    </main>
    <!--   Core JS Files   -->
    <script src="<?= base_url('/assets/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('/assets/js/core/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('/assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('/assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url('assets/js/soft-ui-dashboard.min.js?v=1.0.4'); ?>"></script>
</body>

</html>