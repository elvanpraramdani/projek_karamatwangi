<div class="container bg-white">
    <div class="h5 text-secondary mb-3 mt-5 text-center">Kelola Profile Desa</div>
    <div class="row mb-5">
        <div class="col-lg-12 ">
            <div class="accordion" id="accordionExample">
                <div class="card mb-3 border-0 shadow">
                    <div class="card-header bg-white " id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class="row">
                                    <div class="col-lg-1 col-3">
                                        <img src="<?= base_url('assets/img/icon-profile-desa.png'); ?>" alt="gambar" class="rounded-circle" style="width: 50px;">
                                    </div>
                                    <div class="col-lg-11 col-9">
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
                                        <div class="col-lg-8 col-6"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                        <div class="col-lg-4 col-6 text-right">
                                            <a class="btn btn-sm btn-outline-info" href="<?= base_url('Profile/edit/' . $p['id_profile']); ?>"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                                            <a class="btn btn-sm btn-outline-danger" href="<?= base_url('Profile/delete_profile/' . $p['id_profile']); ?>"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 border-0 shadow">
                    <div class="card-header bg-white " id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-decoration-none collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <div class="row">
                                    <div class="col-lg-1 col-3">
                                        <img src="<?= base_url('assets/img/gedung.png'); ?>" alt="gambar" class="rounded-circle" style="width: 50px;">
                                    </div>
                                    <div class="col-lg-11 col-9">
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
                                        <div class="col-lg-8 col-6"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                        <div class="col-lg-4 col-6 text-right">
                                            <a class="btn btn-sm btn-outline-info" href="<?= base_url('Profile/edit/' . $p['id_profile']); ?>"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                                            <a class="btn btn-sm btn-outline-danger" href="<?= base_url('Profile/delete_profile/' . $p['id_profile']); ?>"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>
                                        </div>
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
                                    <div class="col-lg-1 col-3">
                                        <img src="<?= base_url('assets/img/icon-gedung2.1.png'); ?>" alt="gambar" class="rounded-circle" style="width: 50px;">
                                    </div>
                                    <div class="col-lg-11 col-9">
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
                                        <div class="col-lg-8 col-6"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                        <div class="col-lg-4 col-6 text-right">
                                            <a class="btn btn-sm btn-outline-info" href="<?= base_url('Profile/edit/' . $p['id_profile']); ?>"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                                            <a class="btn btn-sm btn-outline-danger" href="<?= base_url('Profile/delete_profile/' . $p['id_profile']); ?>"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>
                                        </div>
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
                                    <div class="col-lg-1 col-3">
                                        <img src="<?= base_url('assets/img/gedung.png'); ?>" alt="gambar" class="rounded-circle" style="width: 50px;">
                                    </div>
                                    <div class="col-lg-11 col-9">
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
                                        <div class="col-lg-8 col-6"><a class="list-profile dropdown-item" href="<?= base_url('Auth/profile/' . $p['id_profile']); ?>"><?= $p['sub_kategori_profile']; ?></a></div>
                                        <div class="col-lg-4 col-6 text-right">
                                            <a class="btn btn-sm btn-outline-info" href="<?= base_url('Profile/edit/' . $p['id_profile']); ?>"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                                            <a class="btn btn-sm btn-outline-danger" href="<?= base_url('Profile/delete_profile/' . $p['id_profile']); ?>"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>
                                        </div>
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