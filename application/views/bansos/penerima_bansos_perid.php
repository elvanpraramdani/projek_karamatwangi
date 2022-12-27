<div class="container-fluid">
    <div class="penerima_bansos_id mt-5">
        <div class="card bg-white shadow">
            <div class="card-body">
                <div>Penerima :
                    <p class="row text-left">
                    <div class="col-12"><i class="fas fa-fw fa-user mr-3"></i><?= $penerima->nama_warga; ?></div>
                    <div class="col-12"><i class="fas fa-fw fa-home mr-3"></i><?= ucwords($penerima->nama_dusun); ?></div>
                    </p>
                </div>
                <div class="dropdown-divider mt-4 mb-2"></div>
                <div class="mb-3 mt-4">Bantuan yang pernah diterima</div>
                <?php foreach ($penerima_id as $pi) : ?>
                    <div class="card mb-2 small card-penerima-bantuan-id">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-3 col-md-12">

                                    <div class="row">
                                        <div class="col-lg-12  ">
                                            <span><i class="fas fa-fw fa-box mr-2"></i></span><span class="font-weight-bold"><?= $pi['nama_bansos']; ?></span>
                                            <!-- <?php if ($pi['status_pengambilan'] == 'sudah') :  ?>
                                                <span class="status-pengambilan-bansos float-right text-success" id="status_pengambilan_bansos"><i class="fas fa-check mr-2"></i>Diterima</span>
                                            <?php else : ?>
                                                <span class="status-pengambilan-bansos float-right" style="color: darkorange;"><i class="fas fa-exclamation mr-2"></i>Diproses</span>
                                            <?php endif; ?> -->
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-7 col-md-12">
                                    <div class="row">
                                        <span class="col-lg-6 col-md-12 "><span for=""><i class="icon fa fa-user mr-2"></i>Penerima : </span> <span class="nama-bansos-id"><?= $pi['nama_warga']; ?></span></span>
                                        <span class="col-lg-6 col-md-12"><span for=""><i class="icon fas fa-clock mr-2"></i>Periode Bantuan : </span> <span class="periode-bansos-id"><?= date('F Y ', strtotime($pi['periode_bansos'])); ?></span></span>
                                        <!-- <span class="col-lg-5 col-md-12"><span for=""><i class="icon fas fa-home mr-2"></i>Tempat Pengambilan : </span> <span class="tempat-pengambilan-id"><?= $pi['tempat_pengambilan']; ?></span></span> -->
                                    </div>
                                </div>

                                <div class="col-lg-1 col-md-12 float-right ">
                                    <!-- <?php if ($pi['status_pengambilan'] == 'sudah') : ?>
                                        <span class="status-pengambilan-bansos btn btn-success btn-sm">Diterima</span>
                                    <?php else :  ?>
                                        <span class="status-pengambilan-bansos btn btn-warning btn-sm">Diproses</span>
                                    <?php endif; ?> -->
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<div style="margin-top: 100px;"></div>