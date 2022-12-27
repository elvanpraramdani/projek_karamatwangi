<?php
$judul = 'Penerima ' . $per_bansos->nama_bansos . '_' . date('d-M-Y_H:i', time());

header("Content-type:application/octet-stream/");
header("Content-Disposition:attachment; filename=$judul.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<?= date('d-F-Y_H:i:s', time()); ?>


<div class="table-responsive">
    <table class="table table-hover table-bordered" cellspacing="0" cellpadding="5" border="1">
        <thead>
            <tr>
                <th class="text-center">No</th>

                <?php if ($this->session->userdata('email')) : ?>
                    <th>NIK</th>
                <?php endif; ?>

                <th>Nama</th>
                <th>Alamat</th>
                <th>Nama Ibu</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($penerima_per_bansos as $p) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <?php if ($this->session->userdata('email')) : ?>
                        <td><?= $p['nik']; ?></td>
                    <?php endif; ?>
                    <td><?= $p['nama_warga']; ?></td>
                    <td><?= ucwords($p['nama_dusun']); ?></td>
                    <td><?= $p['nama_ibu']; ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>