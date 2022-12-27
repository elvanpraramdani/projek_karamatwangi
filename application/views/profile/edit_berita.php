<div class="container">

    <div class="mt-4">
        <div class="card small shadow">
            <div class="card-header bg-white">
                <div class="h5 text-center font-weight-bold">Edit Berita</div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('Profile/edit_berita/' . $berita->id_profile); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Judul Berita</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul_berita" class="form-control" id="inputPassword" required value="<?= $berita->judul_berita; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" name="foto_berita" class="form-control-file" id="inputPassword">
                            <input type="text" name="foto_lama" value="<?= $berita->gambar_profile; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="font-weight-bold">Isi Berita</label>
                        <textarea name="deskripsi_berita" class="form-control" id="" cols="30" rows="15"><?= $berita->deskripsi_profile; ?></textarea>
                    </div>

                    <hr class="sidebar-divider">
                    <button type="submit" class="btn btn-sm btn-primary" name="update_berita"><i class="fas fa-check mr-2"></i>Simpan Perubahan</button>

                </form>

            </div>
        </div>
    </div>
</div>