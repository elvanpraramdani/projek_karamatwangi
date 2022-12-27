<div class="container">
    <!-- alert -->
    <?php if ($this->session->Flashdata('login')) :  ?>
        <div class="alert alert-info alert-dismissible fade show mt-3 mb-3 small" role="alert">
            <?= $this->session->Flashdata('login'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>


    <div class="row login-homepage mt-5 p-4">
        <div class="col-lg-6">
            <img src="<?= base_url('assets/img/login.png'); ?>" alt="">
        </div>

        <div class=" col-lg-6">
            <div class="card small shadow">
                <div class="icon-lock-login"><i class="fas fa-lock text-center"></i></div>
                <div class="h5 text-center mb-2 mt-3 font-weight-bold">Login</div>
                <div class="card-body">
                    <form action="<?= base_url('Auth/proses_login'); ?>" method="post">
                        <label for="email">Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email" autofocus>
                        </div>

                        <label for="password">Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control form-password" placeholder="Masukan Password">
                        </div>
                        <div class="mt-2">
                            <button type="button" class="btn btn-sm bg-white text-secondary" id="show-password"><i class="fas fa-eye mr-2"></i>Lihat Password</button>
                            <button type="button" class="btn btn-sm bg-white text-secondary" id="close-password"><i class="fas fa-eye-slash mr-2"></i>Tutup Password</button>
                        </div>

                        <hr class="sidebar-divider mt-3">
                        <button type="submit" class="btn btn-primary w-100 text-center-justify-content-center">
                            Masuk
                        </button>
                    </form>

                    <hr class="sidebar-divider mt-3">
                    <div>
                        <a href="" class="text-decoration-none text-primary">Lupa password ? </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<div style="margin-top: 200px;"></div>