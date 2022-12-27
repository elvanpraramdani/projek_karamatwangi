<?php if ($this->session->flashdata('bansos')) :  ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('bansos'); ?>
    </div>
<?php endif; ?>

<div class="container">
    <div class="h4 mb-5 text-center font-weight-bold">
        Daftar Bantuan Sosial
    </div>

    <div class="row mb-4">
        <div class="col-lg-7">
            <a href="<?= base_url('Bansos/add'); ?>" class="btn btn-primary shadow"><i class="fas fa-plus mr-2"></i>Bantuan Sosial</a>
        </div>

        <div class="col-lg-5 float-right">
            <form action="<?= base_url('Bansos'); ?>" method="post">
                <div class="input-group">
                    <input type="text" name="keyword" id="keyword" placeholder="Cari Bantuan Sosial" class="form-control" autofocus>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" name="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <hr class="mb-4">

    <?php foreach ($bansos as $b) :  ?>
        <a href="<?= base_url('Bansos/detail_bansos/' . $b['id_bansos']); ?>" class="daftar-bansos text-dark text-decoration-none">
            <div class="card shadow mb-3 border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 ">
                            <p class="font-weight-bold ml-3"><?= $b['nama_bansos']; ?></p>
                            <?php if ($b['periode_bansos'] > 1) :  ?>
                                <small class="periode-bansos ml-3"><?= 'Periode : ' . date('F Y', strtotime($b['periode_bansos'])); ?></small>
                            <?php else :  ?>
                                <small class="periode-bansos ml-3">Periode : Tidak diketahui</small>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-3 ">
                            <div class="text-right">
                                <?php if ($b['status_bansos'] == 'tampil') : ?>
                                    <i class='bx bxs-check-circle text-success'></i>
                                    <span class='text-success'> Ditampilkan </span>
                                <?php else :  ?>
                                    <small class='text-info'>
                                        <i class='bx bxs-x-square text-info'></i>
                                        Hanya Dilihat Admin </small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 ">
                            <div class="text-right form-inline float-right">
                                <form action="<?= base_url('Penerima/add/' . $b['id_bansos']); ?>"><button type="submit" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button></form>
                                <form action="<?= base_url('Bansos/edit/' . $b['id_bansos']); ?>" method="post" class="ml-2"><button type="submit" class="btn btn-warning btn-sm"><i class='bx bx-pencil mr-2'></i>Edit</button></form>
                                <form action="<?= base_url('Bansos/delete/' . $b['id_bansos']); ?>" class="ml-2" method="post" onclick="return confirm('Yakin Akan Menghapus data ? ')"><button type="submit" class="btn btn-danger btn-sm"><i class='bx bx-trash-alt mr-2'></i>Hapus</button></form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>



</div>