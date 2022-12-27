<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css_custom/bootstrap-select.min.css'); ?>">
    <!-- fontawasome -->
    <link href="<?= base_url('assets/sb/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- css custom -->
    <link rel="stylesheet" href="<?= base_url('assets/css_custom/homepage.css'); ?>">

    <link rel="shortcut icon" href="<?= base_url('assets/img/icon.ico'); ?>">

    <script src="<?= base_url('assets/bootstrap/js/jquery-3.5.1.slim.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js_custom/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js_custom/bootstrap-select.min.js'); ?>"></script>

    <title>Desa Nanggela</title>
    <style>
        .image-homepage img {
            margin-left: 540px;
        }
    </style>
</head>

<body>
    <!-- Image and text -->
    <nav class="navbar-homepage navbar navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url('Auth'); ?>">
                <img src="<?= base_url('assets/img/logokaramatwangi.png'); ?>" class="d-inline-block align-top" alt="">
            </a>
            <ul class="ul-homepage">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Profile Desa
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($profile as $p) : ?>
                            <?php if ($p['kategori_profile'] == 'Profile Desa') : ?>
                                <div class="row mb-1">
                                    <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Informasi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($profile as $p) : ?>
                            <?php if (($p['kategori_profile'] == 'Informasi') && ($p['sub_kategori_profile'] != 'Berita')) : ?>
                                <div class="row mb-1">
                                    <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Lembaga
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($profile as $p) : ?>
                            <?php if ($p['kategori_profile'] == 'Lembaga') : ?>
                                <div class="row mb-1">
                                    <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Direktori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($profile as $p) : ?>
                            <?php if ($p['kategori_profile'] == 'Direktori') : ?>
                                <div class="row mb-1">
                                    <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </li>

            </ul>
            <div class="navbar-link">
                <a href="<?= base_url('Auth/login'); ?>" class="ml-3 btn-login btn btn-outline-primary">Masuk</a>
            </div>
        </div>
    </nav>

    <div class="image-homepage">
        <img src="<?= base_url('assets/img/homepage.jpg'); ?>" alt="">
    </div>

    <div class="container-fluid">
        <div class="judul">
            <div class="judul-2 ">
                <h1>Desa Nanggela</h1>
                <p>Kec.Cidahu Kab.Kuningan</p>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <!-- menu -->
        <div class="menu-homepage mx-auto" style="display:  none;">
            <div class="h5 mb-4 mt-2 text-secondary text-center"> . . .</div>
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="h5 text-secondary mb-3 text-center">Menu</div>
                    <div class="accordion" id="accordionExample">
                        <div class="card mb-3 border-0 shadow">
                            <div class="card-header bg-white " id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="row">
                                            <div class="col-lg-3 col-3">
                                                <img src="<?= base_url('assets/img/icon-profile-desa.png'); ?>" alt="gambar" class="rounded-circle" style="width: 50px;">
                                            </div>
                                            <div class="col-lg-9 col-9">
                                                <p class="mt-2 h6 text-secondary">Profile Desa</p>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php foreach ($profile as $p) : ?>
                                        <?php if ($p['kategori_profile'] == 'Profile Desa') : ?>
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 border-0 shadow">
                            <div class="card-header bg-white " id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left text-decoration-none collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <div class="row">
                                            <div class="col-lg-3 col-3">
                                                <img src="<?= base_url('assets/img/icon-bansos.png'); ?>" alt="gambar" class="rounded-circle" style="width: 50px;">
                                            </div>
                                            <div class="col-lg-9 col-9">
                                                <p class="mt-2 h6 text-secondary">Bantuan Sosial</p>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">

                                <div class="card-body daftar-bansos-homepage">

                                    <div class="form-group">
                                        <i class="fas fa-users text-secondary mr-2"></i><label for="">Cari Penerima Bantuan</label>
                                        <select onchange="location=this.value;" class="form-control selectpicker mb-4" data-live-search="true">
                                            <option>. . .</option>
                                            <?php foreach ($cari_penerima as $row) : ?>
                                                <option value="<?= base_url('Auth/penerima/' . $row['id_warga']); ?>"> <?= $row['nama_warga'] . ' - ' . ucwords($row['nama_dusun']); ?></option>
                                            <?php
                                            endforeach;  ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <i class="fas fa-box text-secondary mr-2"></i><label for="" class="">Cari Daftar Bantuan</label>
                                        <select onchange="location=this.value;" class="form-control selectpicker " data-live-search="true">
                                            <option>. . .</option>
                                            <?php foreach ($bansos as $row) : ?>
                                                <option value="<?= base_url('Auth/bansos/' . $row['id_bansos']); ?>"><?= $row['nama_bansos']; ?></option>
                                            <?php endforeach;  ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 border-0 shadow">
                            <div class="card-header bg-white " id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left text-decoration-none collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <div class="row">
                                            <div class="col-lg-3 col-3">
                                                <img src="<?= base_url('assets/img/gedung.png'); ?>" alt="gambar" class="rounded-circle" style="width: 50px;">
                                            </div>
                                            <div class="col-lg-9 col-9">
                                                <p class="mt-2 h6 text-secondary">Informasi</p>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php foreach ($profile as $p) : ?>
                                        <?php if (($p['kategori_profile'] == 'Informasi') && ($p['sub_kategori_profile'] != 'Berita')) : ?>
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 border-0 shadow">
                            <div class="card-header bg-white " id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left text-decoration-none collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <div class="row">
                                            <div class="col-lg-3 col-3">
                                                <img src="<?= base_url('assets/img/icon-gedung2.1.png'); ?>" alt="gambar" class="rounded-circle" style="width: 50px;">
                                            </div>
                                            <div class="col-lg-9 col-9">
                                                <p class="mt-2 h6 text-secondary">Lembaga</p>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php foreach ($profile as $p) : ?>
                                        <?php if ($p['kategori_profile'] == 'Lembaga') : ?>
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3 border-0 shadow">
                            <div class="card-header bg-white " id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left text-decoration-none collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <div class="row">
                                            <div class="col-lg-3 col-3">
                                                <img src="<?= base_url('assets/img/gedung.png'); ?>" alt="gambar" class="rounded-circle" style="width: 50px;">
                                            </div>
                                            <div class="col-lg-9 col-9">
                                                <p class="mt-2 h6 text-secondary">Direktori</p>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php foreach ($profile as $p) : ?>
                                        <?php if ($p['kategori_profile'] == 'Direktori') : ?>
                                            <div class="row mb-1">
                                                <div class="col-lg-12 col-12"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="h3 text-secondary font-weight-bold mt-5 mb-3 text-center">Berita Desa</div>
        <div class="card border-0">
            <div class="card-body">
                <div class="berita-desa">
                    <?php foreach ($berita as $b) : ?>
                        <div class="card card-berita shadow">
                            <img src="<?= base_url('assets/img/berita/' . $b['gambar_profile']); ?>" class="card-img-top" alt="gambar">
                            <p class="mb-3 text-center" id="tanggal-berita"><?= date('d-M-Y', strtotime($b['tgl_berita'])); ?></p>
                            <div class="card-body">
                                <h5 class="card-title"><span class="my-auto text-secondary"><?= $b['judul_berita']; ?></span></h5>
                                <div class="small">
                                    <?php $text = $b['deskripsi_profile'];
                                    echo substr($text, 0, 110) . '. . .'; ?>
                                </div>
                                <div class="text-center">
                                    <a href="<?= base_url('Auth/berita/' . $b['id_profile']); ?>" class="btn btn-outline-info btn-sm mt-3">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <a href="" class="text-secondary text-decoration-none">
                        <div class="card card-berita border-0">
                            <div class="card-body">
                                <div class="text-center text-secondary" style="font-size:30px;">
                                    <i class=" fas fa-chevron-right" style="margin-top: 80%;"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <div class="container">

        <div class="footer-homepage bg-white">
            <div class="content-footer">
                <div class="row ">
                    <div class="col-lg-6">
                        <span class="font-weight-bold text-success">Foto Galeri</span>
                        <hr class="sidebar-divider">
                        <span class="text-left">
                            Jalan Desa Karamatwangi Rt. 01 Rw.02 <br>
                            Kode Pos : 45591 <br>
                            Telp / HP : 082240202304 / 081222151829 <br>
                            e-Mail : info@desa.kuningankab.go.id <br>
                        </span>
                    </div>

                    <div class="col-lg-6">
                        <span class="font-weight-bold text-success">Alamat Kantor</span>
                        <hr class="sidebar-divider">
                        <span class="text-left">
                            Jalan Desa Karamatwangi Rt. 01 Rw.02 <br>
                            Kode Pos : 45591 <br>
                            Telp / HP : 082240202304 / 081222151829 <br>
                            e-Mail : info@desa.kuningankab.go.id <br>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="footer-homepage2 text-center bg-light">
        <div class="text-light">.</div>
        <p class="font-weight-bold text-secondary">Copyright © Desa Karamatwangi, Kecamatan Garawangi, Kabupaten Kuningan <?= date('Y'); ?></p>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="cariPeneriaBansosModal" tabindex="-1" aria-labelledby="cariPeneriaBansosModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cariPeneriaBansosModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="form-group">
                            <i class="fas fa-users text-secondary mr-2"></i><label for="">Cari Penerima Bantuan</label>
                            <select onchange="location=this.value;" class="form-control selectpicker mb-4" data-live-search="true">
                                <option>. . .</option>
                                <?php foreach ($cari_penerima as $row) : ?>
                                    <option value="<?= base_url('Auth/penerima/' . $row['id_warga']); ?>"> <?= $row['nama_warga'] . ' - ' . ucwords($row['nama_dusun']); ?></option>
                                <?php
                                endforeach;  ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <i class="fas fa-box text-secondary mr-2"></i><label for="" class="">Cari Daftar Bantuan</label>
                            <select onchange="location=this.value;" class="form-control selectpicker " data-live-search="true">
                                <option>. . .</option>
                                <?php foreach ($bansos as $row) : ?>
                                    <option value="<?= base_url('Auth/bansos/' . $row['id_bansos']); ?>"><?= $row['nama_bansos']; ?></option>
                                <?php endforeach;  ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


</body>

</html>