<div class="container-fluid">
    <div class="card mt-5 shadow bg-white">
        <div class="card-header bg-white">
            <div class="h5 font-weight-bold">Edit Spesifik Penerima Bantuan</div>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Penerima/edit/' . $penerima->id_penerima); ?>" method="POST">
                <input type="hidden" name="id_bansos" id="id_bansos" value="<?= $penerima->id_bansos; ?>">
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-form-label col-lg-2 font-weight-bold text-secondary">NIK</label>
                        <input type="number" name="nik" id="nik" class="form-control col-lg-4" readonly value="<?= $penerima->nik; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-form-label col-lg-2 font-weight-bold text-secondary">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control col-lg-4" readonly value="<?= $penerima->nama_warga; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-form-label col-lg-2 font-weight-bold text-secondary">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control col-lg-4" readonly value="<?= ucwords('dusun ' . $penerima->nama_dusun) . ' RT ' . $penerima->rt . ' RW s' . $penerima->rw; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-form-label col-lg-2 font-weight-bold text-secondary">Nama Bantuan</label>
                        <input type="text" name="nama_bansos" id="nama_bansos" class="form-control col-lg-4" readonly value="<?= $penerima->nama_bansos; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="" class="col-form-label col-lg-2 font-weight-bold text-secondary">No Rekening</label>
                        <input type="text" name="no_rekening" id="no_rekening" class="form-control col-lg-4" <?= $penerima->no_rekening; ?>>
                    </div>
                </div>

                <div class="form-group table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-center bg-light font-weight-bold text-secondary" colspan="14">Kriteria Keluarga Miskin</td>
                        </tr>
                        <tr class="text-center">
                            <?php for ($i = 1; $i <= 14; $i++) { ?>
                                <td style=""><span id="titik">.....</span><?= $i; ?><span id="titik">.....</span></td>
                            <?php } ?>

                        </tr>
                        <tr>
                            <?php for ($i = 1; $i <= 14; $i++) { ?>
                                <td>
                                    <div class="form-group">
                                        <?php $x = 'kkm' . $i ?>
                                        <input type="text" name="kkm<?= $i; ?>" id="kkm<?= $i; ?>" class="form-control" style="border:none;border-bottom:1px solid gray;" value="<?= $penerima->$x; ?>">
                                    </div>
                                </td>
                            <?php } ?>
                        </tr>
                    </table>
                    <div class="form-group">
                        <div class="row">
                            <label for="" class="font-weight-bold text-secondary col-lg-3">Jumlah Kriteria Keluarga Miskin : </label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control col-lg-4">
                        </div>
                    </div>
                </div>


                <div class="form-group table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-light">
                            <td colspan="5" class="font-weight-bold text-secondary">Sudah Menerima JPS</td>
                        </tr>
                        <tr class="text-center">
                            <td>PKH</td>
                            <td>BPNT</td>
                            <td>KP</td>
                            <td>BP</td>
                            <td>BK</td>
                        </tr>
                        <tr class="text-center">
                            <td><input type="text" name="pkh" id="pkh" class="form-control"></td>
                            <td><input type="text" name="bpnt" id="bpnt" class="form-control"></td>
                            <td><input type="text" name="kp" id="kp" class="form-control"></td>
                            <td><input type="text" name="bp" id="bp" class="form-control"></td>
                            <td><input type="text" name="bk" id="bk" class="form-control"></td>
                        </tr>
                    </table>
                </div>
                <div class="form-group table-responsive">
                    <table class="table table-bordered">
                        <tr class="text-center bg-light">
                            <td colspan="5" class="font-weight-bold text-secondary">Belum Menerima JPS</td>
                        </tr>
                        <tr class="text-center">
                            <td>Kelihangan Mata Pencarian</td>
                            <td>Tidak Terdata</td>
                            <td>Sakit Kronis</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="hilang_pencarian" id="hilang_pencarian" class="form-control"></td>
                            <td><input type="text" name="tidak_terdata" id="tidak_terdata" class="form-control"></td>
                            <td><input type="text" name="sakit_kronis" id="sakit_kronis" class="form-control"></td>
                        </tr>
                    </table>
                </div>
                <div class="form-group row">
                    <label for="" class="col-lg-2 col-form-label font-weight-bold text-secondary">MS/TMS</label>
                    <input type="text" name="ms_tms" id="ms_tms" class="form-control col-lg-4">
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn btn-primary" name="update">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>