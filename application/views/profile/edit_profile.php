<div class="container-fluid">
    <div class="mt-5 deskripsi-singkat">
        <div class="card small shadow">
            <div class="card-header bg-white">
                <div class="h5 text-center font-weight-bold text-secondary mt-3 mb-3">Edit <?= $profile->sub_kategori_profile; ?></div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('Profile/edit/' . $profile->id_profile); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Katergori</label>
                        <div class="col-sm-10">
                            <input type="text" name="sub_kategori_profile" class="form-control" id="" required readonly value="<?= $profile->sub_kategori_profile; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Isi Deskripsi Singkat</label>
                        <textarea name="deskripsi_profile" class="form-control" id="" cols="30" rows="15"><?= $profile->deskripsi_profile; ?></textarea>
                    </div>
                    <hr class="sidebar-divider">
                    <button type="submit" class="btn btn-sm btn-primary" name="update">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>