<div class="container-fluid">
    <?php if (!empty($this->session->flashdata('warga'))) :  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('warga'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card small shadow mt-5 ">
        <div class="card-header bg-white p-4">
            <div class="my-auto text-left text-secondary font-weight-bold h5">Tambah Data Warga</div>
        </div>
        <form action="<?= base_url('Warga/add'); ?>" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label for="" class="text-right col-sm-2 col-form-label">No KK</label>
                    <div class="col-lg-4">
                        <input type="number" name="no_kk" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-sm-2 col-form-label">NIK</label>
                    <div class="col-lg-4">
                        <input type="number" name="nik" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-sm-2 col-form-label">Nama</label>
                    <div class="col-lg-4">
                        <input type="text" name="nama_warga" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-sm-2 col-form-label">Alamat</label>
                    <div class="col-lg-4">
                        <select name="alamat" id="" class="form-control">
                            <option value="">Pilih Dusun</option>
                            <?php foreach ($dusun as $d) :  ?>
                                <option value="<?= $d['kd_dusun']; ?>"><?= ucwords($d['nama_dusun']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <input type="number" class="form-control" name="rw" placeholder="RW">
                    </div>
                    <div class="col-lg-2">
                        <input type="number" class="form-control" name="rt" placeholder="RT">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-lg-2  col-form-label">Tempat Tanggal Lahir</label>
                    <div class="col-lg-4">
                        <input type="text" name="tempat_lahir" id="" class="form-control" placeholder="Tempat lahir">
                    </div>
                    <div class="col-lg-2">
                        <input type="date" name="tanggal_lahir" class="date form-control">
                    </div>
                    <div class="col-lg-2">
                        <input type="time" name="waktu_lahir" id="" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <label for="" class="text-right col-lg-2  col-form-label">Jenis Kelamin</label>
                    <div class="col-lg-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="L">
                            <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="P">
                            <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-lg-2 col-form-label">Golongan Darah</label>
                    <div class="col-lg-4">
                        <input type="text" name="goldar" id="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-lg-2 col-form-label">Status</label>
                    <div class="col-lg-4">
                        <select name="status_warga" id="" class="form-control">
                            <option value="">Pilih Status</option>
                            <?php foreach ($status as $s) : ?>
                                <option value="<?= $s['kd_status']; ?>"><?= ucwords($s['ket_status']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-lg-2 col-form-label">SHDK</label>
                    <div class="col-lg-4">
                        <select name="shdk" id="" class="form-control">
                            <option value="">Pilih SHDK</option>
                            <?php foreach ($shdk as $s) :  ?>
                                <option value="<?= $s['kd_shdk']; ?>"><?= $s['ket_shdk']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-lg-2 col-form-label">Agama</label>
                    <div class="col-lg-4">
                        <select name="agama" id="" class="form-control">
                            <option value="">Pilih Agama</option>
                            <?php foreach ($agama as $a) :  ?>
                                <option value="<?= $a['kd_agama']; ?>"><?= $a['nama_agama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-primary btn-sm mt-1 text-white"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-lg-2 col-form-label">Pendidikan</label>
                    <div class="col-lg-4">
                        <select name="pendidikan" id="" class="form-control">
                            <option value="">Pilih Pendidikan</option>
                            <?php foreach ($pendidikan as $pen) :  ?>
                                <option value=" <?= $pen['kd_pendidikan']; ?>"><?= $pen['ket_pendidikan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-primary btn-sm mt-1 text-white"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-lg-2 col-form-label">Pekerjaan</label>
                    <div class="col-lg-4">
                        <select name="pekerjaan" id="" class="form-control">
                            <option value="">Pilih Pekerjaan</option>
                            <?php foreach ($pekerjaan as $pen) :  ?>
                                <option value="<?= $pen['kd_pekerjaan']; ?>"><?= $pen['ket_pekerjaan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <button type="button" class="btn btn-primary btn-sm mt-1 text-white"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-sm-2 col-form-label">Kepala Keluarga</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="kepala_keluarga" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-sm-2 col-form-label">Nama Ayah</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="nama_ayah" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-sm-2 col-form-label">Nama Ibu</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="nama_ibu" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="provinsi" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="kabupaten" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="kecamatan" id="inputPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="text-right col-sm-2 col-form-label">Kelurahan</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="kelurahan" id="inputPassword">
                    </div>
                </div>

                <div class="card-footer bg-white">
                    <div class="row mt-3">
                        <div class="col-lg-4">
                            <button type="submit" class="btn ml-5 btn-primary" name="simpan">Simpan</button>
                            <button type="submit" class="btn ml-3 btn-secondary" name="tambah_lagi">Tambah Lagi</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>