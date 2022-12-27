<div class="container">
    <?php if (!empty($this->session->flashdata('warga'))) :  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('warga'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card small bg-white mt-4">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-lg-9">
                    <p class="my-auto">Biodata Warga : <span class="font-weight-bold"><?= $warga_id->nama_warga; ?></span></p>
                </div>
                <div class="col-lg-3 text-right">
                    <a href="<?= base_url('Warga/edit/' . $warga_id->id_warga); ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                    <a href="<?= base_url('Warga/delete/' . $warga_id->id_warga); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover table-borderless">
                    <tbody>
                        <tr>
                            <td class="col-lg-3 text-left">No Kartu Keluarga</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->no_kk; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">NIK</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->nik; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Nama</td>
                            <td>: <span class="ml-2"></span><?= ucwords($warga_id->nama_warga); ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Alamat</td>
                            <td>: <span class="ml-2"></span><?= ucwords($warga_id->nama_dusun) . ' RT ' . $warga_id->rt . ' / RW ' . $warga_id->rw; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Tempat Tanggal Lahir</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->tempat_lahir . ', ' . date('d-m-Y', strtotime($warga_id->tanggal_lahir)); ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Jenis Kelamin</td>
                            <td>
                                <?php if ($warga_id->jk == 'L') : ?>
                                    : <span class="ml-2"></span>Laki-Laki
                                <?php else :  ?>
                                    : <span class="ml-2"></span>Perempuan
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left">Golongan Darah</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->golongan_darah; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Status</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->ket_status; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">SHDK</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->ket_shdk; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Agama</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->nama_agama; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Pendidikan</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->ket_pendidikan; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Pekerjaan</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->ket_pekerjaan; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Kepala Keluarga</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->kepala_keluarga; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Nama Ayah</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->nama_ayah; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Nama Ibu</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->nama_ibu; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Provinsi</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->provinsi; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Kabupaten</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->kabupaten; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Kecamatan</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->kecamatan; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left">Kelurahan</td>
                            <td>: <span class="ml-2"></span><?= $warga_id->kelurahan; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>