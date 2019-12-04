   <!-- Footer -->
   <footer class="py-5" id="footer-main">
     <div class="container">
       <div class="row align-items-center justify-content-xl-between">
         <div class="col-xl-6">
           <div class="copyright text-center text-xl-left text-muted">
             &copy; 2019 <a href="#" class="font-weight-bold ml-1" target="_blank">Werls Team</a>
           </div>
         </div>
         <div class="col-xl-6">
           <ul class="nav nav-footer justify-content-center justify-content-xl-end">
             <li class="nav-item">
               <a href="#" class="nav-link" target="_blank">Werls Team</a>
             </li>
             <li class="nav-item">
               <a href="#" class="nav-link" target="_blank">About Us</a>
             </li>
             <li class="nav-item">
               <a href="#" class="nav-link" target="_blank">Blog</a>
             </li>
             <li class="nav-item">
               <a href="#" class="nav-link" target="_blank">License</a>
             </li>
           </ul>
         </div>
       </div>
     </div>
   </footer>

          <?php if($this->session->userdata('online') == TRUE){ ?>
          <div class="modal fade" id="modal_add_diskon" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-primary">
                              <div class="text-muted text-center text-white">Beri Diskon</div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                              <form method="post" role="form" action="<?php echo base_url().'add-menu-diskon'?>">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <select class="form-control" name="kode_menu">
                                          <?php foreach ($no_diskon->result_array() as $key_no) { ?>
                                          <option value="<?=$key_no['menu_id'] ?>"><?php echo $key_no['menu_nama']; ?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <select class="form-control" name="kode_diskon">
                                          <?php foreach ($tbl_diskon->result_array() as $r) { ?>
                                          <option value="<?=$r['diskon_id'] ?>"><?php echo $r['nama_diskon']; ?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary my-4 btn-block">Tambahkan</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>  

                  <div class="modal fade" id="modal_add_qty" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-primary">
                              <div class="text-muted text-center text-white">Tambah Quantity</div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                              <form method="post" role="form" action="<?php echo base_url().'add-menu-qty'?>">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <select class="form-control" name="kode_menu">
                                          <?php foreach ($data->result_array() as $key_no) { ?>
                                          <option value="<?=$key_no['menu_id'] ?>"><?php echo $key_no['menu_nama']; ?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input type="number" name="in_qty" class="form-control" placeholder="Tambahkan Quantity" min="1">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary my-4 btn-block">Tambahkan</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                   <?php 
                foreach ($diskon->result_array() as $a) {
                $id=$a['diskon_id'];
                $nama=$a['nama_diskon'];

              ?>
        <div class="modal fade" id="modal_dell_exp_<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?php echo base_url().'exp-diskon'?>" method="post">
                    <div class="modal-dialog modal-danger modal-dialog-centered modal-sm" role="document">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="py-3 text-center">
                            <i class="ni ni-bell-55 ni-3x"></i>
                            <h4 class="heading mt-4">Kamu Yakin Ingin Menghapus!</h4>
                <input type="hidden" name="kode" value="<?php echo $id;?>">
                <input type="hidden" name="nama" value="<?php echo $nama;?>">
                            <p>Data <?php echo $nama ?>.</p>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-white">Ok, Hapus</button>
                          <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                    </form>
                  </div>
                  <?php } ?>
                <?php } ?>
   <!-- Argon Scripts -->
   <!-- Core -->
   <script src="<?php echo base_url().'assets/vendor/jquery/dist/jquery.min.js' ?>"></script>
   <script src="<?php echo base_url().'assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js' ?>"></script>
   <script src="<?php echo base_url().'assets/vendor/js-cookie/js.cookie.js' ?>"></script>
   <script src="<?php echo base_url().'assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js' ?>"></script>
   <script src="<?php echo base_url().'assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js' ?>"></script>
   <!-- Optional JS -->
   <script src="<?php echo base_url().'assets/vendor/onscreen/dist/on-screen.umd.min.js' ?>"></script>
   <script src="<?php echo base_url().'assets/vendor/swiper/dist/js/swiper.min.js'?>"></script>
   <script src="<?php echo base_url().'assets/js/all.min.css' ?>"></script>
   <script src="<?php echo base_url().'assets/vendor/sweetalert2/dist/sweetalert2.min.js'?>"></script>
   <script src="<?php echo base_url().'assets/vendor/bootstrap-notify/bootstrap-notify.min.js'?>"></script>

 <!-- third party js -->
   <script src="<?php echo base_url().'assets/data_table/js/jquery.dataTables.js '?>"></script>
   <script src="<?php echo base_url().'assets/data_table/js/dataTables.bootstrap4.js '?>"></script>
   <script src="<?php echo base_url().'assets/data_table/js/dataTables.responsive.min.js '?>"></script>
   <script src="<?php echo base_url().'assets/data_table/js/responsive.bootstrap4.min.js '?>"></script>
   <script src="<?php echo base_url().'assets/data_table/js/dataTables.buttons.min.js '?>"></script>
   <script src="<?php echo base_url().'assets/data_table/js/buttons.bootstrap4.min.js '?>"></script>
   <script src="<?php echo base_url().'assets/data_table/js/buttons.html5.min.js '?>"></script>
   <script src="<?php echo base_url().'assets/data_table/js/buttons.flash.min.js '?>"></script>
   <script src="<?php echo base_url().'assets/data_table/js/buttons.print.min.js '?>"></script>
   <script src="<?php echo base_url().'assets/data_table/js/dataTables.keyTable.min.js '?>"></script>
   <script src="<?php echo base_url().'assets/data_table/js/dataTables.select.min.js '?>"></script>
   <script src="<?php echo base_url().'assets/data_table/js/demo.datatable-init.js '?>"></script>

   <script src="<?php echo base_url().'assets/js/demo.min.js'?>"></script>
<!-- end demo js-->


  
 </body>

 </html>