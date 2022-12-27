<div class="container">

    <div class="card col-lg-7 small shadow" style="margin: 50px auto;">
        <div class="card-header bg-white">
            <div class="h5 font-weight-bold">Tambah Bantuan Sosial</div>
        </div>
        <div class="card-body">
            <form action="<?= base_url('bansos/add'); ?>" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="" class="font-weight-bold">Nama Bantuan <b class="text-danger">*</b></label>
                    <input type="text" name="nama_bansos" id="" class="form-control <?= (form_error('nama_bansos')) ? 'is-invalid' : ''; ?>" value="<?= set_value('nama_bansos'); ?>" autofocus>
                    <div class="invalid-feedback">
                        <?= form_error('nama_bansos'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="font-weight-bold">Periode Bantuan <b class="text-danger">*</b></label>
                    <div class="row">
                        <div class="col-6">
                            <select name="periode_bulan" id="" class="form-control <?= (form_error('periode_bulan')) ? 'is-invalid' : ''; ?>" value="<?= set_value('periode_bulan'); ?>">
                                <?php if (!empty(form_error('periode_bulan'))) : ?>
                                    <option value="<?= set_value('periode_bulan'); ?>"><?= set_value('periode_bulan'); ?></option>
                                <?php endif; ?>

                                <option value="">Pilih Bulan</option>
                                <option value="00">Tidak Ada</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="04">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= form_error('periode_bulan'); ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <select name="periode_tahun" id="periode_tahun" class="form-control <?= (form_error('periode_tahun')) ? 'is-invalid' : ''; ?>" value="<?= set_value('periode_tahun'); ?>" placeholder="Tahun">
                                <option value="<?= date('Y', time()); ?>" class="font-weight-bold text-primary" selected><?= date('Y', time()); ?></option>
                                <?php for ($i = 1950; $i <= 2050; $i++) : ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <!-- <input type="number" name="periode_tahun" id="" class="form-control <?= (form_error('periode_tahun')) ? 'is-invalid' : ''; ?>" value="<?= set_value('periode_tahun'); ?>" placeholder="Tahun"> -->
                            <div class="invalid-feedback">
                                <?= form_error('periode_tahun'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="jk">
                    <label for="" class="font-weight-bold">Status Bantuan <b class="text-danger">*</b></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status_bansos" id="tampilkan" value="tampil">
                        <label class="form-check-label" for="tampilkan">
                            Tampilkan Ke Semua Orang
                        </label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="radio" name="status_bansos" id="sembunyikan" value="tutup" checked>
                        <label class="form-check-label" for="sembunyikan">
                            Hanya Dilihat Oleh Admin
                        </label>
                    </div>
                </div>


                <hr class="sidebar-divider">
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary" name="">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>