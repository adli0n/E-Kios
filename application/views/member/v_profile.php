<?php $b = $member->row_array(); ?>
<div class="main-content" id="panel">
<div class="header pt-5 pb-7 bg-gradient-primary">
       <div class="container">
         <div class="header-body text-center">
               <div class="">
                 <h1 class="display-2 font-weight-bold text-white">Hi! <?php echo $b['plg_nama'] ?></h1>
                 <p class="mt-4 text-white display-5">
                  <span class="badge badge-pill badge-info badge-lg">Kerja Santai sampai Pagi, <?php echo ucfirst($title) ?> </span>
                </p>
           </div>
         </div>
       </div>
     </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
          <?php echo $this->session->flashdata('msg');?>
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="<?=base_url().'assets/gambar/bg-profile.jpg'  ?>" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?php echo base_url().'assets/gambar/'.$b['plg_photo'] ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body mt-6">
              <div class="text-center">
                <h5 class="h3">
                  
                  <span class="font-weight-light"><?php echo $b['plg_nama'] ?></span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i> <?php echo $b['plg_email'] ?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $b['plg_level'] ?> - Werls n Resto
                </div>
                <div>
                  <i class="ni ni-education_hat mr-2"></i>University of Softwere Science
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-2">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                 <form action="<?php echo base_url().'upd-plg-2'?>" method="post" role="form" enctype="multipart/form-data" >
                                <div class="row">
                                <input type="hidden" name="kode" value="<?php echo $b['plg_id']; ?>">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                          <div class="input-group input-group-merge input-group-alternative">
                                            <input class="form-control" placeholder="Nama lengkap" type="text" name="nama" autocomplete="off" value="<?php echo $b['plg_nama']; ?>">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                          <div class="input-group input-group-merge input-group-alternative">
                                            <input class="form-control" placeholder="Email" type="email" name="email" autocomplete="off"  value="<?php echo $b['plg_email']; ?>">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                          <div class="input-group input-group-merge input-group-alternative">
                                            <input class="form-control" placeholder="Password" type="password" name="pass" autocomplete="off">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group mb-3">
                                          <div class="input-group input-group-merge input-group-alternative">
                                            <input class="form-control" placeholder="Re-password" type="password" name="pass2" autocomplete="off">
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                          <div class="input-group input-group-merge input-group-alternative">
                                            <select class="form-control" placeholder="Jenis Kelamin" name="jenkel" autocomplete="off">
                                              <?php if ($b['plg_jenkel'] == "Perempuan"){ ?>
                                                <option>Perempuan</option>
                                                <option>Laki Laki</option>
                                              <?php }else{ ?>
                                                <option>Laki Laki</option>
                                                <option>Perempuan</option>
                                              <?php } ?>
                                            </select> 
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                         <div class="form-group mb-3">
                                          <div class="input-group input-group-merge input-group-alternative">
                                            <input class="form-control" placeholder="Phone Number" type="text" name="kontak" autocomplete="off"  value="<?php echo $b['plg_notelp']; ?>">
                                          </div>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                         <div class="form-group mb-3">
                                          <div class="input-group input-group-merge input-group-alternative ">
                                            <input class="form-control" placeholder="Photo Profile" type="file" name="filefoto" autocomplete="off">
                                          </div>
                                      </div>
                                    </div>
                                    </div>

                                    <div class="form-group mb-0 float-right">
                                        <button class="btn btn-primary" type="submit">Update </button>
                                    </div>
                                  </form>
            </div>
          </div>
        </div>
      </div>
   