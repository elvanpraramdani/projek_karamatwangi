<?php if ($this->session->flashdata('admin')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('admin'); ?>
    </div>
<?php endif; ?>

<div class="container">
    <div class="mt-5 card shadow">
        <div class="card-body">
            <div class="h3 mt-4 mb-4  font-weight-bold">Profile User</div>
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td><?= $user['nama_admin']; ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?= $user['email']; ?></td>
                </tr>
                <tr>
                    <td>Level Admin</td>
                    <td><?php if ($user['level'] == 'admin') {
                            echo 'Admin';
                        } else {
                            echo 'Super Admin';
                        } ?></td>
                </tr>
            </table>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info w-25 mt-4" data-toggle="modal" data-target="#userModal">
                <i class="fas fa-edit mr-2"></i>Edit Profile
            </button>

        </div>

    </div>
</div>