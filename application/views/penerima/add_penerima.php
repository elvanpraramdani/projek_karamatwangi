<div class="container-fluid">


    <div class="mt-4 btn-warga">
        <div class="search-warga">
            <form action="<?= base_url('Penerima/add/' . $per_bansos->id_bansos); ?>" method="post">
                <div class="form-inline">
                    <input type="text" name="search_warga" id="search_warga" class="form-control" placeholder="cari warga" autofocus>
                    <button type="submit" class="btn btn-primary" name="btn_search_warga"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <hr class="mt-4">

    <div class="card small mt-4 shadow">
        <div class="card-header bg-white">
            <div class="row">
                <p class="col-lg-6 my-auto h5">Piih Penerima Bantuan <span class="font-weight-bold"><?= $per_bansos->nama_bansos; ?> </span></p>
                <div class="col-lg-6">
                    <a href="<?= base_url('Bansos/detail_bansos/' . $per_bansos->id_bansos); ?>" class="btn btn-warning btn-sm float-right"><i class="fas fa-eye mr-2"></i>Lihat Penerima</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-borderless table-striped">
                    <thead class="text-secondary bg-light">
                        <tr>
                            <th class="text-center" style="width: 10px;">No</th>
                            <th>Tambah</th>
                            <th>NIK</th>
                            <th>Nama Warga</th>
                            <th>No KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($warga as $w) : ?>
                            <tr>
                                <td class="text-center"><?= ++$start; ?></td>
                                <td class="text-center">
                                    <input type="checkbox" class="check_mark_tugas" name="check_tugas" id="check_tugas" <?= check_access($w['nik'], $per_bansos->id_bansos); ?> data-warga="<?= $w['nik']; ?>" data-bansos="<?= $per_bansos->id_bansos; ?>">
                                </td>
                                <td><?= $w['nik']; ?></td>
                                <td><?= $w['nama_warga']; ?></td>
                                <td><?= $w['no_kk']; ?></td>
                                <td><?= $w['kepala_keluarga']; ?></td>
                                <td><?= $w['nama_dusun']; ?></td>
                                <td><?= $w['rt']; ?></td>
                                <td><?= $w['rw']; ?></td>
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