<div class="container">
    <div class="card col-lg-7 small" style="margin:50px auto;">
        <div class="card-header bg-white">
            <div class="h5 font-weight-bold">Edit Bantuan Sosial</div>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Bansos/edit/' . $bansos->id_bansos); ?>" method="post">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="" class="font-weight-bold">Nama Bansos <b class="text-danger">*</b></label>
                    <input type="text" name="nama_bansos" id="" class="form-control" value="<?= $bansos->nama_bansos; ?>" required>
                </div>

                <div class="form-group">
                    <label for="" class="font-weight-bold">Periode Bansos <b class="text-danger">*</b></label>
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="small font-weight-bold">Bulan</label>
                            <select name="periode_bulan" required id="" class="form-control">
                                <option value="<?= date('m', strtotime($bansos->periode_bansos)); ?>"><?= date('F', strtotime($bansos->periode_bansos)); ?></option>
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
                        </div>
                        <div class="col-6">
                            <label for="" class="small font-weight-bold">Tahun</label>
                            <select name="periode_tahun" id="periode_tahun" class="form-control <?= (form_error('periode_tahun')) ? 'is-invalid' : ''; ?>" value="<?= set_value('periode_tahun'); ?>" placeholder="Tahun">
                                <option value="<?= date('Y', strtotime($bansos->periode_bansos)); ?>" class="font-weight-bold text-primary" selected><?= date('Y', strtotime($bansos->periode_bansos)); ?></option>
                                <?php for ($i = 1950; $i <= 2050; $i++) : ?>
                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endfor; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= form_error('periode_tahun'); ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="form-cotrol">
                        <?php if ($bansos->status_bansos == 'tampil') : ?>
                            <div class="jk">
                                <label for="" class="font-weight-bold">Status Bantuan <b class="text-danger">*</b></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_bansos" id="tampilkan" value="tampil" checked>
                                    <label class="form-check-label" for="tampilkan">
                                        Tampilkan Ke Semua Orang
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" name="status_bansos" id="sembunyikan" value="tutup">
                                    <label class="form-check-label" for="sembunyikan">
                                        Hanya Dilihat Oleh Admin
                                    </label>
                                </div>
                            </div>
                        <?php else :  ?>
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
                        <?php endif; ?>
                    </div>
                </div>
                <hr class="sidebar-divider">
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary" name="">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>