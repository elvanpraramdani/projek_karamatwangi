<div class="container">
    <div class="mt-5">
        <div class="card shadow">
            <div class="card-body">
                <div class="h5"><?= $profile_id->sub_kategori_profile; ?></div>
                <div class="dropdown-divider mt-3"></div>
                <div class="mt-4" style="line-height: 30px;">
                    <?php if ($profile_id->deskripsi_profile != null) : ?>
                        <?= nl2br($profile_id->deskripsi_profile); ?>
                    <?php else :  ?>
                        <div class="alert alert-warning text-center">Belum Ada Data</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin-top: 100px;"></div>