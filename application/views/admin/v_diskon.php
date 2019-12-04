     <div class="main-content">
     <!-- Header -->
     <div class="header pt-5 pb-7 bg-gradient-primary">
       <div class="container">
         <div class="header-body text-center">
               <div class="pr-5">
                 <h1 class="display-2 font-weight-bold text-white"><?=$judul ?></h1>
                 <p class="mt-4 text-white display-5">
                  <span class="badge badge-pill badge-info badge-lg">Kerja Santai sampai Pagi, <?php echo ucfirst($title) ?> </span>
                </p>
           </div>
         </div>
       </div>
     </div>
        <div class="container-fluid mt--7">
          <?php echo $this->session->flashdata('msg');?>
      <!-- Table -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">
                <div class="col-3">
                  <button data-toggle="modal" data-target="#modal_add_diskon" class="btn btn-primary btn-block">Tambah Diskon</button>
                </div>
                <div class="col-3">
                  <a href="<?=base_url().'exp-auto' ?>" class="btn btn-primary btn-block" data-toggle="notify" data-placement="top" data-align="center" data-type="default" data-icon="ni ni-bell-55">Hapus Diskon Expaired</a>
                </div>
              </div>
            </div>
            <div class="table-responsive py-4">
              <table id="basic-datatable" class="table nowrap table-striped">
                <thead class="thead-light">
                  <tr>
                  <th>No</th>
                  <th>Nama Diskon</th>
                  <th>Diskon</th>
                  <th>Tanggal Mulai Diskon</th>
                  <th>Tanggal Expaired Diskon</th>
                  <th>opsi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $no = 1;
              foreach ($tbl_diskon->result_array() as $a) {

              ?>
                <tr>
                  <td><?=$no++ ?></td>
                  <td><?=$a['nama_diskon'] ?></td>
                  <td>
                    <?php if ($a['a_diskon'] == False){ ?>
                    <?php }else{ ?>
                    <?=$a['a_diskon'] ?>%
                    <?php } ?>
                  </td>
                  <td><?=$a['mulai_diskon'] ?></td>
                  <td><?=$a['exp_diskon'] ?></td>
                  <td>

                    <?php if ($a['a_diskon'] == False){ ?>
                    <?php }else{ ?>
                     <div class="dropdown">
                        <a class="btn btn-primary btn-block btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" data-toggle="modal" data-target="#modal_hapus_diskon_<?php echo $a['diskon_id'];?>"><i class="fas fa-trash"></i>Delete Diskon</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#modal_edit_diskon_<?php echo $a['diskon_id'];?>"><i class="fas fa-edit"></i>Update Diskon</a>
                        </div>
                      </div>
                    <?php  } ?>
                  </td>
                </tr>
              <?php   } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
   <div class="modal fade" id="modal_add_diskon" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-primary">
                              <div class="text-muted text-center text-white">Tambahkan Diskon</div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                              <form method="post" role="form" action="<?php echo base_url().'add-diskon'?>">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <label class="text-muted text-sm">Nama diskon</label>
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Nama Diskon" type="text" name="nama" required autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <label class="text-muted text-sm">Pesentase Diskon</label>
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Persentase Diskon" type="number" name="a_diskon" max="100" min="1" required autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <label class="text-muted text-sm">Tanggal mulai diskon</label>
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Tanggal mulai diskon" type="date"  name="mulai_diskon" required autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <label class="text-muted text-sm">Tanggal Expaired diskon</label>
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Tanggal Expaired diskon" type="date"  name="exp_diskon" required autocomplete="off">
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
                foreach ($tbl_diskon->result_array() as $as) {

              ?>
   <div class="modal fade" id="modal_edit_diskon_<?php echo $as['diskon_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-primary">
                              <div class="text-muted text-center text-white">Edit Diskon</div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                              <form method="post" role="form" action="<?php echo base_url().'upd-diskon'?>">
                                <div class="row">
                                        <input type="hidden" name="kode" value="<?=$as['diskon_id'] ?>">
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <label class="text-muted text-sm">Nama diskon</label>
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Nama Diskon" type="text" name="nama" required autocomplete="off" value="<?=$as['nama_diskon'] ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <label class="text-muted text-sm">Pesentase Diskon</label>
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Persentase Diskon" type="number" name="a_diskon" max="100" min="1" required autocomplete="off" value="<?=$as['a_diskon'] ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <label class="text-muted text-sm">Tanggal mulai diskon</label>
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Tanggal mulai diskon" type="date"  name="mulai_diskon" required autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <label class="text-muted text-sm">Tanggal Expaired diskon</label>
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Tanggal Expaired diskon" type="date"  name="exp_diskon" required autocomplete="off">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="text-center">
                                  <button type="submit" class="btn btn-primary my-4 btn-block">Update</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
<?php } ?>

     <?php 
                foreach ($tbl_diskon->result_array() as $as) {
                $id=$as['diskon_id'];
                $nama=$as['nama_diskon'];

              ?>
        <div class="modal fade" id="modal_hapus_diskon_<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?php echo base_url().'dell-diskon'?>" method="post">
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