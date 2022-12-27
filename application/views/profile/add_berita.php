<div class="container">

    <div class="mt-4">
        <div class="card small shadow">
            <div class="card-header bg-white">
                <div class="h5 text-center font-weight-bold">Tambah Berita</div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('Profile/add_berita'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label font-weight-bold">Judul Berita</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul_berita" class="form-control" id="" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label font-weight-bold">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" name="foto_berita" class="form-control-file" id="foto_berita">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="font-weight-bold">Isi Berita</label>
                        <textarea name="deskripsi_berita" class="form-control" id="" cols="30" rows="15"></textarea>
                    </div>

                    <hr class="sidebar-divider">
                    <button type="submit" class="btn w-25 btn-primary" name="simpan_berita">Simpan</button>

                </form>

            </div>
        </div>
    </div>

</div>