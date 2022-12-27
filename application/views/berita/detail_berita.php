<div class="container">
    <?php if ($this->session->flashdata('berita')) : ?>
        <div class="alert alert-success small">
            <?= $this->session->flashdata('berita'); ?>
        </div>
    <?php endif; ?>

    <div class="mt-4">
        <div class="card shadow small">
            <div class="card-header bg-white">
                <div class="row">
                    <div class="col-lg-7 col-8">
                        <?php if ($this->session->userdata('email')) : ?>
                            <div class="text-left">
                                <a href="<?= base_url('Profile/edit_berita/' . $berita->id_profile); ?>" class="btn btn-sm btn-warning mr-2"><i class="fas fa-pencil-alt mr-2"></i>Edit</a>
                                <form action="<?= base_url('Profile/delete_berita/' . $berita->id_profile); ?>" method="post" class="d-inline" onclick="return confirm('Yakin akan mengahapus data')">
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash mr-2"></i>Hapus</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-5 col-4 text-right"><?= date('d F Y', strtotime($berita->created_at)); ?></div>
                </div>
            </div>
            <div class="card-body">
                <div class="h5 mt-3 mb-4 text-center font-weight-bold"><?= $berita->judul_berita; ?></div>
                <div class="text-center">
                    <img src="<?= base_url('assets/img/berita/' . $berita->gambar_profile); ?>" alt="gambar" class="gambar-berita">
                </div>
                <div class="deskripsi-berita mt-5 p-3">
                    <p>
                        <?= nl2br($berita->deskripsi_profile); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>