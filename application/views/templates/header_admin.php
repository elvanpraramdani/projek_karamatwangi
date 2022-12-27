<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> <?= $title; ?> </title>
    <style>
        #titik {
            color: transparent;
        }
    </style>

    <!-- Custom styles for this template sb admin 2-->
    <link href="<?= base_url(); ?>assets/sb/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- fontawasome -->
    <link href="<?= base_url(); ?>assets/sb/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom -->
    <link rel="stylesheet" href="<?= base_url('assets/sidebar/style.css'); ?>">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/sidebar/boxicons.min.css'); ?>"> -->

    <!-- link icon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/icon.ico'); ?>">

    <!-- Js -->
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/sb/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/sb/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/sb/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/sb/js/sb-admin-2.min.js"></script>

    <!-- Data Tables -->
    <!-- Page level plugins -->
    <!-- Custom styles for this page DataTables -->
    <link href="<?= base_url(); ?>/sb/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>/sb/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/sb/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>/sb/js/demo/datatables-demo.js"></script>


    <!-- Data Tables -->
    <!-- Page level plugins -->
    <!-- Custom styles for this page DataTables -->
    <link href="<?= base_url(); ?>assets/sb/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/sb/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/sb/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>assets/sb/js/demo/datatables-demo.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>assets/sb/vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>assets/sb/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url(); ?>assets/sb/js/demo/chart-pie-demo.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/sb/js/demo/chart-bar-demo.js"></script> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- sidebar -->
    <div class="sidebar-admin">
        <div class="logo-details">
            <div class="logo_name">Karamatwangi</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="<?= base_url('Admin'); ?>">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip-admin">Dashboard</span>
            </li>
            <li>
                <a href="<?= base_url('Warga'); ?>">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Data Warga</span>
                </a>
                <span class="tooltip-admin">Data Warga</span>
            </li>
            <li>
                <a href="<?= base_url('Profile'); ?>">
                    <i class='bx bx-buildings'></i>
                    <span class="links_name">Profile Desa</span>
                </a>
                <span class="tooltip-admin">Profile Desa</span>
            </li>
            <li>
                <a href="<?= base_url('Profile/berita'); ?>">
                    <i class='bx bx-news'></i>
                    <span class="links_name">Berita Desa</span>
                </a>
                <span class="tooltip-admin">Berita Desa</span>
            </li>
            <li>
                <a href="<?= base_url('Admin/add'); ?>">
                    <i class='bx bx-user-plus'></i>
                    <span class="links_name">Tambah Admin</span>
                </a>
                <span class="tooltip-admin">Tambah Admin</span>
            </li>
            <li class="profile">
                <a href="<?= base_url('Auth/logout'); ?>">
                    <div class="profile-details">
                        <div class="name_job">
                            <div class="name"><?= $user['nama_admin'] ?></div>
                            <div class="job">Keluar</div>
                        </div>
                    </div>
                    <i class='bx bx-log-out' id="log_out"></i>
                </a>
            </li>
        </ul>
    </div>

    <section class="home-section-admin">

        <!-- top bar -->
        <nav class="navbar-homepage navbar navbar-light bg-white shadow">
            <div class="container-fluid">
                <a class="navbar-brand text-secondary" href="#">
                    <!-- <img src="/docs/4.6/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> -->
                    <?= $title; ?>
                </a>
                <ul class="my-auto">
                    <li class="nav-item dropdown no-arrow list-unstyled">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600"><?= $user['nama_admin']; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url('Admin/profile'); ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="<?= base_url('Auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Keluar
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="text-content bg-white">