<?php if ($this->session->flashdata('bansos')) :  ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('bansos'); ?>
    </div>
<?php endif; ?>


<div class="container-fluid">

    <div class="alert alert-white mb-3">
        <div class="row">
            <div class="col-lg-5">

                <a href="<?= base_url('Penerima/add/' . $per_bansos->id_bansos); ?>" class="btn btn-primary mr-3"><i class="fas fa-plus mr-2"></i>Tambah Penerima</a>
                <form action="<?= base_url('Bansos/spesifik/' . $per_bansos->id_bansos); ?>" method="post" class="d-inline-block">
                    <div class="form-inline">
                        <input type="text" name="search_warga" id="search_warga" class="form-control" placeholder="Cari" autofocus>
                        <button type="submit" class="btn btn-primary" name="btn_search_warga"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="text-right col-lg-7">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-file-excel mr-2"></i>Excel
                        </button>
                        <div class="dropdown-menu text-center" aria-labelledby="btnGroupDrop1">
                            <a href="<?= base_url('Bansos/export_excel_spesifik_penerima/' . $per_bansos->id_bansos); ?>" class="btn btn-success btn-sm mb-2"><i class='bx bx-download mr-2'></i>Export Excel</a>
                            <button type="button" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#importExcelModal">
                                <i class='bx bx-upload mr-2'></i>Import Excel
                            </button>
                            <a href="<?= base_url('Bansos/format_import_spesifik_penerima_bansos/' . $per_bansos->id_bansos); ?>" class="btn btn-success btn-sm mb-2">Unduh Format</a>

                        </div>
                    </div>
                </div>
                <a href="<?= base_url('Bansos/detail_bansos/' . $per_bansos->id_bansos); ?>" class="btn btn-secondary ">Lihat Sedikit</a>
            </div>
        </div>
    </div>
    <hr class="mt-3">

    <div class="mt-4">
        <div class="card small ">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <p class="my-auto h5">Daftar Penerima Bantuan <span class="font-weight-bold"><?= $per_bansos->nama_bansos; ?></span></p>
                    </div>
                    <div class="col-lg-6 text-right">
                        <div class="form-inline float-right">
                            <label for="" class="mr-2">Kode : </label>
                            <input type="text" name="pilih" id="pilih" class="form-control" value="<?= $per_bansos->id_bansos; ?>" readonly>
                            <button type="button" class="btn btn-info" onclick="copy_text()">Salin</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center bg-light">
                                <th rowspan="2">No</th>
                                <th rowspan="2">Detail</th>
                                <th rowspan="2">NIK</th>
                                <th rowspan="2">Nama</th>
                                <th colspan="3" class="text-center">Alamat</th>
                                <th rowspan="2">No Rekening</th>

                                <th colspan="14" class="text-center">Kriteria Keluarga Miskin</th>
                                <th rowspan="2">Jumlah</th>
                                <th colspan="5">Sudah Menerima JPS</th>
                                <th colspan="3">Belum Menerima JPS</th>
                                <th rowspan="2">MS/TMS</th>
                            </tr>

                            <tr class="text-center bg-light">
                                <th>Dusun</th>
                                <th>RT</th>
                                <th>RW</th>

                                <?php for ($i = 1; $i <= 14; $i++) :  ?>
                                    <th><?= $i; ?></th>
                                <?php endfor; ?>

                                <th>PKH</th>
                                <th>BPNT</th>
                                <th>KP</th>
                                <th>BP</th>
                                <th>BK</th>

                                <th><?= str_replace(' ', '<span id="titik">.</span>', 'Kehilangan Mata Pencarian'); ?></th>
                                <th><?= str_replace(' ', '<span id="titik">.</span>', 'Tidak Terdata'); ?></th>
                                <th><?= str_replace(' ', '<span id="titik">.</span>', 'Sakit Kronis'); ?></th>
                            </tr>
                        </thead>


                        <?php
                        $no = 1;
                        foreach ($penerima_per_bansos as $p) : ?>

                            <tr>
                                <th class="text-center"><?= $no++; ?></th>

                                <td>
                                    <a href="<?= base_url('Penerima/edit/' . $p['id_penerima']); ?>" class="badge badge-success">Edit</a>
                                </td>


                                <?php if ($this->session->userdata('email')) : ?>
                                    <td><?= $p['nik']; ?></td>
                                <?php endif; ?>
                                <td><?= str_replace(' ', '<span id="titik">.</span>', $p['nama_warga']); ?></td>
                                <td><?= ucwords($p['nama_dusun']); ?></td>
                                <td class="text-center"><?= $p['rt']; ?></td>
                                <td class="text-center"><?= $p['rw']; ?></td>
                                <td><?= $p['no_rekening']; ?></td>

                                <?php for ($i = 1; $i <= 14; $i++) :  ?>
                                    <?php $kkm = 'kkm' . $i; ?>
                                    <td class="text-center"><?= $p[$kkm]; ?></td>
                                <?php endfor; ?>

                                <td class="text-center"><?= $p['jumlah']; ?></td>

                                <td class="text-center"><?= $p['sudah_jps_pkh']; ?></td>
                                <td class="text-center"><?= $p['sudah_jps_bpnt']; ?></td>
                                <td class="text-center"><?= $p['sudah_jps_kp']; ?></td>
                                <td class="text-center"><?= $p['sudah_jps_bp']; ?></td>
                                <td class="text-center"><?= $p['sudah_jps_bk']; ?></td>

                                <td class="text-center"><?= $p['belum_jps_hilang_pencarian']; ?></td>
                                <td class="text-center"><?= $p['belum_jps_tidak_terdata']; ?></td>
                                <td class="text-center"><?= $p['belum_jps_sakit_kronis']; ?></td>

                                <td class="text-center"><?= $p['ms_tms']; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>