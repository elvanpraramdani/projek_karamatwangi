<div class="container">
    <?php if ($this->session->flashdata('berita')) : ?>
        <div class="alert alert-success small">
            <?= $this->session->flashdata('berita'); ?>
        </div>
    <?php endif; ?>



    <?php if ($this->session->Flashdata('profile')) :  ?>
        <div class="alert alert-success alert-dismissible fade show mt-3 mb-3 small" role="alert">
            <?= $this->session->Flashdata('profile'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <div class="mb-3">
        <a href="<?= base_url('Profile/add_berita'); ?>" class="btn btn-primary shadow">Tambah Berita</a>
    </div>

    <div class="h2 mb-4 text-secondary mb-3 text-center berita-desa">Berita Desa</div>

    <?php foreach ($berita as $b) : ?>
        <a href="<?= base_url('Auth/berita/' . $b['id_profile']); ?>" class="text-decoration-none text-secondary">
            <div class="card shadow mb-2 small card-berita-admin" style="cursor: pointer;">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-9">
                            <span class="my-auto font-weight-bold"><?= $b['judul_berita']; ?></span>
                        </div>
                        <div class="col-3 text-right">
                            <span><?= date('d F Y ', strtotime($b['tgl_berita'])); ?></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2 col-3 text-center">
                            <img src="<?= base_url('assets/img/berita/' . $b['gambar_profile']); ?>" alt="gambar" class="gambar-berita-admin">
                        </div>
                        <div class="col-lg-10 col-9">
                            <?php $text = $b['deskripsi_profile'];
                            echo substr($text, 0, 250) . '. . .'; ?>
                            <br>
                            <a href="<?= base_url('Auth/berita/' . $b['id_profile']); ?>">Selengkapnya ...</a>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>

</div>