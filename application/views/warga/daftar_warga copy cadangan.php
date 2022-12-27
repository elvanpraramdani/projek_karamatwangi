<div class="container-fluid">

    <div class="mt-4 btn-warga">
        <a href="<?= base_url('Warga/add'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus mr-2"></i>Tambah</a>
        <a href="<?= base_url('Warga/export_pdf'); ?>" class="btn btn-danger btn-sm ml-2 float-right"><i class="fas fa-print mr-2"></i>Download PDF</a>
        <a href="<?= base_url('Warga/export_excel'); ?>" class="btn btn-success btn-sm ml-2 float-right"><i class="fas fa-file-excel mr-2"></i>Download Excel</a>
    </div>


    <div class="search-warga mt-4 ">
        <form action="<?= base_url('Warga/index'); ?>" method="post">
            <div class="form-inline">
                <input type="text" name="search_warga" id="search_warga" class="form-control" placeholder="cari warga">
                <button type="submit" class="btn btn-primary btn-sm ml-2" name="btn_search_warga"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>

    <div class="card small mt-3">
        <div class="card-header bg-white">
            <p class="my-auto h5">Data Kependudukan</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-borderless">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <th class="text-center" style="width: 10px;">No</th>
                            <th>Tambah</th>
                            <th>No KK</th>
                            <th>Kepala Keluarga</th>
                            <th>NIK</th>
                            <th>Nama Warga</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>JK</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Golongan Darah</th>
                            <th>Agama</th>
                            <th>Status Warga</th>
                            <th>Nama Ibu</th>
                            <th>Nama Ayah</th>
                            <th>SHDK</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Provinsi</th>
                            <th>kabupaten</th>
                            <th>kecamatan</th>
                            <th>kelurahan</th>
                            <th style="width: 70px;" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($warga as $w) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td>
                                    <input type="checkbox" class="check_mark_tugas" name="check_tugas" id="check_tugas" <?= check_access($w['id_warga']); ?> data-warga="<?= $w['id_warga']; ?>">
                                </td>
                                <td><?= $w['no_kk']; ?></td>
                                <td><?= $w['kepala_keluarga']; ?></td>
                                <td><?= $w['nik']; ?></td>
                                <td><?= $w['nama_warga']; ?></td>
                                <td><?= $w['nama_dusun']; ?></td>
                                <td><?= $w['rt']; ?></td>
                                <td><?= $w['rw']; ?></td>
                                <td><?= $w['jk']; ?></td>
                                <td><?= $w['tempat_lahir']; ?></td>
                                <td><?= $w['tanggal_lahir']; ?></td>
                                <td><?= $w['golongan_darah']; ?></td>
                                <td><?= $w['nama_agama']; ?></td>
                                <td>
                                    <?php if ($w['status_warga'] == '1') {
                                        echo 'Belum Kawin';
                                    } else if ($w['status_warga'] == '2') {
                                        echo 'Kawin';
                                    } else if ($w['status_warga'] == '3') {
                                        echo 'Cerai Hidup';
                                    } else if ($w['status_warga'] == '4') {
                                        echo 'Cerai Mati';
                                    } ?>
                                </td>
                                <td><?= $w['nama_ibu']; ?></td>
                                <td><?= $w['nama_ayah']; ?></td>
                                <td><?= $w['shdk']; ?></td>
                                <td><?= $w['pendidikan']; ?></td>
                                <td><?= $w['pekerjaan']; ?></td>
                                <td><?= $w['provinsi']; ?></td>
                                <td><?= $w['kabupaten']; ?></td>
                                <td><?= $w['kecamatan']; ?></td>
                                <td><?= $w['kelurahan']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('Warga/edit/' . $w['id_warga']); ?>" class="btn-edit mr-3"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="<?= base_url('Warga/' . $w['id_warga']); ?>" method="post" class="d-inline" onclick="return confirm('Yakin akan mengahapus data')">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn-hapus"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?= $this->pagination->create_links(); ?>
</div>


<div class="card border-0 shadow mb-4 mt-4 small">
    <div class="card-header py-3 bg-white border-top-0">
        <h6 class="m-0 font-weight-bold text-secondary my-auto">Data Warga
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordereless table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-white">
                    <tr>
                        <th class="text-center" style="width: 10px;">No</th>
                        <th>Tambah</th>
                        <th>No KK</th>
                        <th>Kepala Keluarga</th>
                        <th>NIK</th>
                        <th>Nama Warga</th>
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>JK</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Golongan Darah</th>
                        <th>Agama</th>
                        <th>Status Warga</th>
                        <th>Nama Ibu</th>
                        <th>Nama Ayah</th>
                        <th>SHDK</th>
                        <th>Pendidikan</th>
                        <th>Pekerjaan</th>
                        <th>Provinsi</th>
                        <th>kabupaten</th>
                        <th>kecamatan</th>
                        <th>kelurahan</th>
                        <th style="width: 70px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($warga as $w) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td>
                                <input type="checkbox" class="check_mark_tugas" name="check_tugas" id="check_tugas" <?= check_access($w['id_warga']); ?> data-warga="<?= $w['id_warga']; ?>">
                            </td>
                            <td><?= $w['no_kk']; ?></td>
                            <td><?= $w['kepala_keluarga']; ?></td>
                            <td><?= $w['nik']; ?></td>
                            <td><?= $w['nama_warga']; ?></td>
                            <td><?= $w['nama_dusun']; ?></td>
                            <td><?= $w['rt']; ?></td>
                            <td><?= $w['rw']; ?></td>
                            <td><?= $w['jk']; ?></td>
                            <td><?= $w['tempat_lahir']; ?></td>
                            <td><?= $w['tanggal_lahir']; ?></td>
                            <td><?= $w['golongan_darah']; ?></td>
                            <td><?= $w['nama_agama']; ?></td>
                            <td>
                                <?php if ($w['status_warga'] == '1') {
                                    echo 'Belum Kawin';
                                } else if ($w['status_warga'] == '2') {
                                    echo 'Kawin';
                                } else if ($w['status_warga'] == '3') {
                                    echo 'Cerai Hidup';
                                } else if ($w['status_warga'] == '4') {
                                    echo 'Cerai Mati';
                                } ?>
                            </td>
                            <td><?= $w['nama_ibu']; ?></td>
                            <td><?= $w['nama_ayah']; ?></td>
                            <td><?= $w['shdk']; ?></td>
                            <td><?= $w['pendidikan']; ?></td>
                            <td><?= $w['pekerjaan']; ?></td>
                            <td><?= $w['provinsi']; ?></td>
                            <td><?= $w['kabupaten']; ?></td>
                            <td><?= $w['kecamatan']; ?></td>
                            <td><?= $w['kelurahan']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('Warga/edit/' . $w['id_warga']); ?>" class="btn-edit mr-3"><i class="fas fa-pencil-alt"></i></a>
                                <form action="<?= base_url('Warga/' . $w['id_warga']); ?>" method="post" class="d-inline" onclick="return confirm('Yakin akan mengahapus data')">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn-hapus"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>