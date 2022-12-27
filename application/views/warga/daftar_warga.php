<div class="container-fluid">

    <?php if (!empty($this->session->flashdata('warga'))) :  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('warga'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>


    <div class="alert alert-white mb-3">
        <div class="row">
            <div class="col-lg-5">
                <a href="<?= base_url('Warga/add'); ?>" class="btn btn-primary mr-3 shadow"><i class="fas fa-plus mr-2"></i>Tambah Warga</a>
                <form action="<?= base_url('Warga/index'); ?>" method="post" class="d-inline-block">
                    <div class="form-inline">
                        <input type="text" name="search_warga" id="search_warga" class="form-control" placeholder="cari warga">
                        <button type="submit" class="btn btn-primary" name="btn_search_warga"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="text-right col-lg-7">
                <button type="button" class="btn btn-success shadow" data-toggle="modal" data-target="#modalExportExcel">
                    <i class="far fa-file-excel mr-2"></i>Eksport Excel
                </button>
            </div>
        </div>
    </div>


    <div class="card small mt-5">
        <div class="card-header bg-white">
            <p class="my-auto h5">Data Kependudukan</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <th class="text-center" style="width: 10px;">No</th>
                            <th>NIK</th>
                            <th>Nama<span id="titik">.</span>Warga</th>
                            <th>No<span id="titik">.</span>KK</th>
                            <th>Kepala<span id="titik">.</span>Keluarga</th>
                            <th>Alamat</th>
                            <th>RW</th>
                            <th>RT</th>
                            <th>JK</th>
                            <th>SHDK</th>

                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($warga as $w) : ?>
                            <tr>
                                <td class="text-center"><?= ++$start; ?></td>
                                <!-- <td><?= $w['nik']; ?></td> -->
                                <td><?= date('Y-m-d', strtotime($w['tanggal_lahir'])); ?></td>
                                <td><?= str_replace(' ', '<span id="titik">.</span>', $w['nama_warga']); ?></td>
                                <td><?= $w['no_kk']; ?></td>
                                <td><?= str_replace(' ', '<span id="titik">.</span>', $w['kepala_keluarga']); ?></td>
                                <td><?= ucwords($w['nama_dusun']); ?></td>
                                <td class="text-center"><?= $w['rw']; ?></td>
                                <td class="text-center"><?= $w['rt']; ?></td>
                                <td><?= $w['jk']; ?></td>
                                <td><?= str_replace(' ', '<span id="titik">.</span>', $w['ket_shdk']); ?></td>

                                <td class="text-center">
                                    <a href="<?= base_url('Warga/biodata/' . $w['id_warga']); ?>" class="btn btn-sm btn-success">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3 text-left">
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>

</div>