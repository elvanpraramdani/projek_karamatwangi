</div>

</section>


<!-- <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a> -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Akan Keluar ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik tombol keluar untuk keluar dari sistem.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                <a class="btn btn-primary" href="<?= base_url('Auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>


<!-- Edit Penerima Modal-->
<div class="modal fade" id="modal_edit_penerima" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nama_penerima"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="modal_id_penerima">Id Penerima</label>
                    <input type="text" name="modal_id_penerima" id="modal_id_penerima" class="form-control">
                </div>
                <div class="form-group">
                    <label for="modal_nama_penerima">Nama Warga</label>
                    <input type="text" name="modal_nama_penerima" id="modal_nama_penerima" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                <a class="btn btn-primary" href="<?= base_url('Home/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="importExcelModal" tabindex="-1" aria-labelledby="importExcelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <?php if ($this->uri->segment(2) == 'detail_bansos') {  ?>
                    <h5 class="modal-title" id="importExcelModalLabel">Import Data Penerima Bantuan</h5>
                <?php } else if ($this->uri->segment(2) == 'spesifik') { ?>
                    <h5 class="modal-title" id="importExcelModalLabel">Import Spesifik Penerima Bantuan</h5>
                <?php } else if ($this->uri->segment(1) == 'Warga') { ?>
                    <h5 class="modal-title" id="importExcelModalLabel">Import Data Warga</h5>
                <?php } ?>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="text-secondary">**Pastikan format yang akan di upload sudah sesuai!</span>
                <hr class="mb-3">
                <?php if ($this->uri->segment(2) == 'detail_bansos') {  ?>
                    <form method="post" action="<?= base_url('Penerima/import_excel_penerima/' . $per_bansos->id_bansos); ?>" enctype="multipart/form-data">
                    <?php } else if ($this->uri->segment(2) == 'spesifik') {  ?>
                        <form method="post" action="<?= base_url('Penerima/import_excel_spesifik_penerima/' . $per_bansos->id_bansos); ?>" enctype="multipart/form-data">
                        <?php } else if ($this->uri->segment(1) == 'Warga') { ?>
                            <form method="post" action="<?= base_url('Warga/import_excel_warga'); ?>" enctype="multipart/form-data">
                            <?php } ?>

                            <div class="form-group">
                                <label for="import_excel" class="mb-3 font-weight-bold text-secondary">Pilih Data Excel</label>
                                <input type="file" class="form-control-file" id="import_excel" name="import_excel" accept=".xlsx, .xls, .csv">
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Upload</button>
                            </form>
                            <div style="margin-top: 30px;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="userModalLabel">Edit Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/update_user/' . $user['id_admin']); ?>" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label for="" class="font-weight-bold text-secondary">Nama</label>
                            </div>
                            <div class="col-10">
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $user['nama_admin']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2">
                                <label for="" class="font-weight-bold text-secondary">Level</label>
                            </div>
                            <div class="col-10">
                                <select name="level" id="level" class="form-control">
                                    <option value="<?= $user['level']; ?>" class="font-weight-bold text-primary"><?php
                                                                                                                    if ($user['level'] == 'admin') {
                                                                                                                        echo 'Admin';
                                                                                                                    } else {
                                                                                                                        echo 'Super Admin';
                                                                                                                    }
                                                                                                                    ?></option>
                                    <option value="admin">Admin</option>
                                    <option value="super_admin">Super Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-5">
                    <div class="form-group">
                        <button type="submit" class="btn btn-info w-100">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal datatambahanwarga -->
<div class="modal fade" id="DataTambahanWarga" tabindex="-1" aria-labelledby="DataTambahanWargaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <span id="titleModalDataTambahanWarga"> </span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Admin/create_data_warga'); ?>" method="post">
                    <input type="hidden" name="penanda" id="penanda" value="">
                    <div class="form-group">
                        <label for="">Kode <span id="titleModalDataTambahanWarga"> </span></label>
                        <input type="text" class="form-control" name="kode" value="<?= set_value('kode'); ?>" autofocus>
                    </div>
                    <div class="form-group">
                        <label for=""><span id="titleModalDataTambahanWarga1"> </span></label>
                        <input type="text" class="form-control" name="keterangan" value="<?= set_value('keterangan'); ?>">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal ExportExcel-->
<div class="modal fade" id="modalExportExcel" tabindex="-1" aria-labelledby="modalExportExcelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalExportExcelLabel">Download Data Warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $group_rt = $this->db->query("SELECT rt FROM warga GROUP BY(rt) ORDER BY rt ASC")->result_array();
                $group_rw = $this->db->query("SELECT rw FROM warga GROUP BY(rw) ORDER BY rw ASC")->result_array();
                ?>
                <div class="form-group">
                    <label for="">Pilih Kategori</label>
                    <div class="row">
                        <div class="col-lg-6">
                            <select name="dusun" id="dusun" class="form-control">
                                <option value="">Pilih Dusun</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select name="rw" id="rw" class="form-control">
                                <option value="">RW</option>
                                <?php foreach ($group_rt as $rt) :   ?>
                                    <option value="<?= $rt['rt']; ?>"><?= $rt['rt']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <select name="rt" id="rt" class="form-control">
                                <option value="">RT</option>
                                <?php foreach ($group_rw as $rw) :   ?>
                                    <option value="<?= $rw['rw']; ?>"><?= $rw['rw']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Download</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#btn_modal_tambah_agama').click(function() {
        $("#titleModalDataTambahanWarga").html("Agama");
        $("#titleModalDataTambahanWarga1").html("Nama Agama");
        $("#penanda").val('agama');
    });
    $('#btn_modal_tambah_dusun').click(function() {
        $("#titleModalDataTambahanWarga").html("Dusun");
        $("#titleModalDataTambahanWarga1").html("Nama Dusun");
        $("#penanda").val('dusun');
    });
    $('#btn_modal_tambah_pekerjaan').click(function() {
        $("#titleModalDataTambahanWarga").html("Pekerjaan");
        $("#titleModalDataTambahanWarga1").html("Nama Pekerjaan");
        $("#penanda").val('pekerjaan');
    });
    $('#btn_modal_tambah_pendidikan').click(function() {
        $("#titleModalDataTambahanWarga").html("Pendidikan Terakhir");
        $("#titleModalDataTambahanWarga1").html("Nama Pendidikan Terakhir");
        $("#penanda").val('pendidikan');
    });
    $('#btn_modal_tambah_shdk').click(function() {
        $("#titleModalDataTambahanWarga").html("Status Hubungan Dalam Keluarga");
        $("#titleModalDataTambahanWarga1").html("Keterangan SHDK");
        $("#penanda").val('shdk');
    });
    $('#btn_modal_tambah_status').click(function() {
        $("#titleModalDataTambahanWarga").html("Status Warga");
        $("#titleModalDataTambahanWarga1").html("Keterangan Status Warga");
        $("#penanda").val('status');
    });
</script>

<script>
    function edit_penerima($id_penerima, $nama_penerima) {
        $('#modal_id_penerima').val($id_penerima);
        $('#modal_nama_penerima').val($nama_penerima);
    }
</script>

<script>
    $(document).ready(function() {
        $("#close-password").hide(), $("#show-password").click(function() {
            $(".form-password").attr("type", "text"), $("#close-password").show(), $("#show-password").hide()
        }), $("#close-password").click(function() {
            $(".form-password").attr("type", "password"), $("#show-password").show(), $("#close-password").hide()
        })
    });
</script>




<script src="<?= base_url('assets/js_custom/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js_custom/bootstrap-select.min.js'); ?>"></script>

<script src="<?= base_url('assets/sidebar/script.js'); ?>"></script>


<!-- ajax | Checked tugas  -->
<script>
    $('.check_mark_tugas').on('click', function() {
        const wargaNik = $(this).data('warga'); //ambil data-warga
        const bansosId = $(this).data('bansos'); //ambil data-bansos
        $.ajax({
            url: "<?= base_url('Penerima/create_penerima'); ?>", //arahkan ke halaman mana
            type: 'post', //tipe nya dan dibawah ini apa yang diisikannya
            data: {
                wargaNik: wargaNik,
                bansosId: bansosId
            },
            success: function() {
                document.location.href = "<?= base_url('Penerima/add/'); ?>" + bansosId;
            }
        });
    });
</script>

<!-- <script>
    $(document).ready(function() {
        $("#tampil_import_excel").hide();

        $('#btn_import_excel').click(function() {
            $("#tampil_import_excel").toggle(400);
        });
    });
</script> -->






</body>

</html>