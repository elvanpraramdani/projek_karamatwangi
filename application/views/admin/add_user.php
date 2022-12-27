<div class="container">
    <?php if (!empty($this->session->flashdata('message'))) :  ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="card mt-5 shadow col-lg-7 col-12" style="margin: 0 auto;">
        <div class="card-body bg-white">
            <div class="h5 my-auto font-weight-bold text-center">Tambah Admin Baru</div>
            <hr>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Admin/create'); ?>" method="post">
                <div class="form-group">
                    <label for="">Nama Admin</label>
                    <input type="text" name="nama" id="nama" class="form-control" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <label for="">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-password">
                        </div>
                        <div class="col-lg-4 col-12">
                            <label for=""></label>
                            <div class="">
                                <button type="button" class="btn btn-sm bg-white text-secondary" id="show-password"><i class="fas fa-eye mr-2"></i>Lihat Password</button>
                                <button type="button" class="btn btn-sm bg-white text-secondary" id="close-password"><i class="fas fa-eye-slash mr-2"></i>Tutup Password</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="">Pilih Level Admin</label>
                    <select name="level" id="level" class="form-control">
                        <option value="super_admin">Super Admin</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-primary w-25" name="simpan">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>