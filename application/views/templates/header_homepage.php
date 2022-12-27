<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/sb/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sb/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css_custom/homepage.css'); ?>">

    <style>
        .nav-menu {
            color: gray;
            text-align: center;
        }

        .nav-menu:hover {
            color: darkblue;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button> -->

                    <a class="navbar-brand" href="<?= base_url('Auth'); ?>">
                        <img src="<?= base_url('assets/img/logokaramatwangi.png'); ?>" class="logo-karamatwangi d-inline-block align-top" alt="">
                    </a>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="nav-menu">Profile Desa</i></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Profile Desa
                                </h6>
                                <?php foreach ($profile as $p) : ?>
                                    <?php if ($p['kategori_profile'] == 'Profile Desa') : ?>
                                        <div class="row mb-1">
                                            <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="modal" data-target="#cariPeneriaBansosModal">
                                <span class="nav-menu">Bantuan Sosial</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Bantuan Sosial
                                </h6>
                                <?php foreach ($profile as $p) : ?>
                                    <?php if ($p['kategori_profile'] == 'Profile Desa') : ?>
                                        <div class="row mb-1">
                                            <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="nav-menu">Informasi</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Informasi
                                </h6>
                                <?php foreach ($profile as $p) : ?>
                                    <?php if (($p['kategori_profile'] == 'Informasi') && ($p['sub_kategori_profile'] != 'Berita')) : ?>
                                        <div class="row mb-1">
                                            <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="nav-menu">Lembaga</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Lembaga
                                </h6>
                                <?php foreach ($profile as $p) : ?>
                                    <?php if ($p['kategori_profile'] == 'Lembaga') : ?>
                                        <div class="row mb-1">
                                            <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="nav-menu">Direktori</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Direktori
                                </h6>
                                <?php foreach ($profile as $p) : ?>
                                    <?php if ($p['kategori_profile'] == 'Direktori') : ?>
                                        <div class="row mb-1">
                                            <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>


                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle text-primary" href="<?= base_url('Auth/logout'); ?>">
                                <span>Masuk</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->