 <!-- end content /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <!-- Footer -->
 <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer> -->
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Modal -->
 <div class="modal fade" id="cariPeneriaBansosModal" tabindex="-1" aria-labelledby="cariPeneriaBansosModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="cariPeneriaBansosModalLabel">Modal title</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="form-group">
                         <i class="fas fa-users text-secondary mr-2"></i><label for="">Cari Penerima Bantuan</label>
                         <select onchange="location=this.value;" class="form-control selectpicker mb-4" data-live-search="true">
                             <option>. . .</option>
                             <?php foreach ($cari_penerima as $row) : ?>
                                 <option value="<?= base_url('Auth/penerima/' . $row['id_warga']); ?>"> <?= $row['nama_warga'] . ' - ' . ucwords($row['nama_dusun']); ?></option>
                             <?php
                                endforeach;  ?>
                         </select>
                     </div>

                     <div class="form-group">
                         <i class="fas fa-box text-secondary mr-2"></i><label for="" class="">Cari Daftar Bantuan</label>
                         <select onchange="location=this.value;" class="form-control selectpicker " data-live-search="true">
                             <option>. . .</option>
                             <?php foreach ($bansos as $row) : ?>
                                 <option value="<?= base_url('Auth/bansos/' . $row['id_bansos']); ?>"><?= $row['nama_bansos']; ?></option>
                             <?php endforeach;  ?>
                         </select>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>

 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/sb/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/sb/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/sb/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/sb/'); ?>js/sb-admin-2.min.js"></script>

 <script>
     $(document).ready(function() {
         $("#close-password").hide(), $("#show-password").click(function() {
             $(".form-password").attr("type", "text"), $("#close-password").show(), $("#show-password").hide()
         }), $("#close-password").click(function() {
             $(".form-password").attr("type", "password"), $("#show-password").show(), $("#close-password").hide()
         })
     });
 </script>

 </body>

 </html>