<?php if ($this->session->userdata('email')) :  ?>
    <?php if ($this->session->flashdata('bansos')) :  ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('bansos'); ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

<div class="container-fluid">
    <div class="alert alert-white mb-3">
        <div class="row">
            <div class="col-lg-5 col-12 ">
                <?php if ($this->session->userdata('email')) :  ?>
                    <a href="<?= base_url('Penerima/add/' . $per_bansos->id_bansos); ?>" class="btn btn-primary mr-3"><i class="fas fa-plus mr-2"></i>Tambah Penerima</a>
                <?php endif; ?>
                <form action="<?= base_url('Bansos/detail_bansos/' . $per_bansos->id_bansos); ?>" method="post" class="d-inline-block">
                    <div class="form-inline">
                        <input type="text" name="search_warga" id="search_warga" class="form-control" placeholder="Cari" autofocus>
                        <button type="submit" class="btn btn-primary" name="btn_search_warga"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <?php if ($this->session->userdata('email')) :  ?>
                <div class="text-right col-lg-7">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="far fa-file-excel mr-2"></i>Excel
                            </button>
                            <div class="dropdown-menu text-center" aria-labelledby="btnGroupDrop1">
                                <a href="<?= base_url('Bansos/export_excel/' . $per_bansos->id_bansos); ?>" class="btn btn-success btn-sm mb-2"><i class='bx bx-download mr-2'></i>Export Excel</a>
                                <button type="button" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#importExcelModal">
                                    <i class='bx bx-upload mr-2'></i>Import Excel
                                </button>
                                <a href="<?= base_url('Bansos/format_import_excel_penerima_bansos/' . $per_bansos->id_bansos); ?>" class="btn btn-success btn-sm mb-2">Unduh Format</a>

                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('Bansos/export_pdf/' . $per_bansos->id_bansos); ?>" class="btn btn-danger"><i class="far fa-file-pdf mr-2"></i>PDF</a>
                    <a href="<?= base_url('Bansos/spesifik/' . $per_bansos->id_bansos); ?>" class="btn btn-secondary ">Lihat Spesifik</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <hr class="mt-3">



    <div class="mt-4">
        <div class="card shadow small">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <p class="my-auto h5">Daftar Penerima Bantuan <span class="font-weight-bold"><?= $per_bansos->nama_bansos; ?></span></p>
                    </div>
                    <?php if ($this->session->userdata('email')) :  ?>
                        <div class="col-lg-6 text-right">
                            <div class="form-inline float-right">
                                <label for="" class="mr-2">Kode : </label>
                                <input type="text" name="pilih" id="pilih" class="form-control" value="<?= $per_bansos->id_bansos; ?>" readonly>
                                <button type="button" class="btn btn-info" onclick="copy_text()">Salin</button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead class="bg-light">
                            <tr class="text-center">
                                <th class="text-center">NO</th>

                                <?php if ($this->session->userdata('email')) : ?>
                                    <th>NIK</th>
                                <?php endif; ?>

                                <th>NAMA</th>
                                <th>ALAMAT</th>
                                <th>NAMA IBU</th>
                                <?php if ($this->session->userdata('email')) : ?>
                                    <th class="text-center">HAPUS</th>
                                <?php endif; ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($penerima_per_bansos as $p) : ?>
                                <tr>
                                    <th class="text-center"><?= $no++; ?></th>
                                    <?php if ($this->session->userdata('email')) : ?>
                                        <td><?= $p['nik']; ?></td>
                                    <?php endif; ?>
                                    <td><?= $p['nama_warga']; ?></td>
                                    <td><?= ucwords($p['nama_dusun']); ?></td>
                                    <td><?= $p['nama_ibu']; ?></td>
                                    <?php if ($this->session->userdata('email')) : ?>
                                        <td class="text-center">
                                            <form action="<?= base_url('Penerima/delete/' . $p['id_penerima']); ?>" method="post">
                                                <input type="hidden" name="id_bansos" value="<?= $per_bansos->id_bansos; ?>">
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function copy_text() {
        document.getElementById("pilih").select();
        document.execCommand("copy");
        alert("Text berhasil dicopy");
    }
</script>