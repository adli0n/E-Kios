<!DOCTYPE html>
 <html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
   <meta name="author" content="Imam Asri">
   <title>Werls - <?php echo $judul; ?></title>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="<?=base_url().'assets/vendor/nucleo/css/nucleo.css' ?>" type="text/css">
   <link rel="stylesheet" href="<?=base_url().'assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css' ?>" type="text/css">
   <!-- Page plugins -->
   <link rel="stylesheet" href="<?php echo base_url().'assets/css/all.min.css' ?>" type="text/css">
   <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/swiper/dist/css/swiper.min.css' ?>" type="text/css">
   <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/animate.css/animate.min.css' ?>" type="text/css">

  <!-- Page plugins datatable -->
   <link href="<?php echo base_url().'assets/data_table/css/dataTables.bootstrap4.css '?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url().'assets/data_table/css/responsive.bootstrap4.css '?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url().'assets/data_table/css/buttons.bootstrap4.css '?>" rel="stylesheet" type="text/css" />
   <link href="<?php echo base_url().'assets/data_table/css/select.bootstrap4.css '?>" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/sweetalert2/dist/sweetalert2.min.css' ?>">
  <!-- third party css end -->


 </head>
 <body class="">
   <!-- Navabr -->
   <nav id="navbar-main" class="navbar ct-navbar navbar-horizontal navbar-main navbar-expand-lg navbar-light bg-white ">
     <div class="container">
       <a class="navbar-brand" href="#">
         <img src="<?php echo base_url().'assets/img/logo/werls-logo.png' ?>" style="height:45px">
       </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
         <div class="navbar-collapse-header">
           <div class="row">
             <div class="col-6 collapse-brand">
               <a href="#">
                 <img src="<?php echo base_url().'assets/img/logo/werls-logo.png' ?>" style="height:45px">
               </a>
             </div>
             <div class="col-6 collapse-close">
               <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                 <span></span>
                 <span></span>
               </button>
             </div>
           </div>
         </div>
          <?php if($this->session->userdata('online') == TRUE){ 
            $bg = $member->row_array(); ?>
         <ul class="navbar-nav mr-auto">
           <li class="nav-item">
             <a href="<?php echo base_url().'dashboard' ?>" class="nav-link">
              <i class="ni ni-shop text-green"></i><span class="text-muted">&nbsp;Beranda</span>
             </a>
           </li>           
           <li class="nav-item">
             <a href="<?php echo base_url().'entry-penjualan' ?>" class="nav-link">
              <i class="ni ni-check-bold text-blue"></i><span class="text-muted">&nbsp;Entry Penjualan</span>
             </a>
           </li>
           <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup text-yellow"></i><span class="text-muted">&nbsp;Multi Pages</span>
              </a>
              <div class="dropdown-menu dropdown-menu-xl dropdown-menu-left py-0 overflow-hidden">
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <?php if ($this->session->userdata('status') === "Admin") { ?>
                  <a href="<?=base_url().'produk' ?>" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <span class="avatar rounded-circle bg-primary"><i class="ni ni-archive-2"></i></span>
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Page Produk</h4>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Mengatur Produk Yang Akan dijual</p>
                      </div>
                    </div>
                  </a>
                  <a href="<?=base_url().'history' ?>" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <span class="avatar rounded-circle bg-yellow"><i class="ni ni-money-coins"></i></span>
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Page History Penjualan</h4>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Mereview Faktur Penjualan Sebelumnya</p>
                      </div>
                    </div>
                  </a>
                  <a href="<?=base_url().'view-diskon' ?>" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <span class="avatar rounded-circle bg-purple"><i class="ni ni-sound-wave"></i></span>
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Page Diskon</h4>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Hati hati dalam Mengatur Diskon</p>
                      </div>
                    </div>
                  </a>
                  <a href="<?=base_url().'pengguna' ?>" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <span class="avatar rounded-circle bg-info"><i class="ni ni-badge"></i></span>
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Page Pengguna</h4>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Hati hati dalam Mengatur Pengguna</p>
                      </div>
                    </div>
                  </a>
                  <?php }else{ ?>
                  <a href="<?=base_url().'history' ?>" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <span class="avatar rounded-circle bg-yellow"><i class="ni ni-money-coins"></i></span>
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">Page History Penjualan</h4>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Mereview Faktur Penjualan Sebelumnya</p>
                      </div>
                    </div>
                  </a>
                  <?php } ?>
                </div>
                <!-- List group end-->
              </div>
            </li>
          <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-basket text-red"></i><span class="text-muted">&nbsp;Keranjang Belanja</span>
                <?php 
                $items = $this->cart->total_items();
                if ($items == '0'){ ?>
                <?php }else{ ?>
                  <sup class=" ml-1 badge badge-danger badge-sm"><?=$items?></sup>
                <?php } ?>
              </a>
              <div class="dropdown-menu dropdown-menu-xl dropdown-menu-left py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">Kamu memiliki <strong class="text-primary"><?=$this->cart->total_items();?></strong> pesanan</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">  
      <?php
      $i = '1';
       foreach ($this->cart->contents() as $items){ 
       echo form_hidden($i.'[rowid]', $items['rowid']); ?> 

                  <div  class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img class="avatar" src="<?php echo base_url().'assets/img/product/'.$items['image']?>">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div> 
                            <h4 class="mb-0 text-sm"><?=$items['name'];?></h4>
                          </div>
                        </div>
                        <div class="text-sm mb-0">Harga : Rp.<?php echo $items['price'] ?>,- X <?php echo number_format($items['qty']);?> = Rp.<?php echo number_format($items['subtotal']);?>,- 

                          <a href="<?php echo base_url().'hapus-pesanan/'.$items['rowid'];?>" class="btn btn-danger btn-sm ml-5">X</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php 
                $i++; 
                } ?>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn btn-secondary btn-block"> 
                            <h4 class="mb-0 text-sm ">
                              <?php if ($this->cart->total() == '0'){
                                echo "Tidak ada pesanan";
                              }else{?>
                              Total = Rp.<?php echo number_format($this->cart->total());?>,-
                              <?php } ?>
                            </h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="<?php echo base_url().'keranjang-belanja' ?>" class="dropdown-item text-center text-primary font-weight-bold py-3">Lihat Keranjang Belanja</a>
              </div>
            </li>
         </ul>
          <ul class="navbar-nav ml-auto ml-md-0">

                  <?php if ($this->session->userdata('status') === "Admin") { ?>
          <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55 text-info"></i><span class="text-muted">&nbsp;Pemberitahuan</span>
                <?php 

      $i = '1';
      $a = $limit->row_array();
      $bq = $limit_max->row_array();
      $min = count($limit->result_array());
      $max = count($limit_max->result_array());
      $exp = count($diskon->result_array());
      $bells = $max+$min+$exp;
      if ($min == "0") {
                    
                  }else{
      $qtya=$a['menu_qty'];
    }
    if ($max == "0") {
                    
                  }else{
      $qtyb=$bq['menu_qty'];
    }
                if ($bells == '0'){ ?>
                <?php }else{ ?>
                  <sup class=" ml-1 badge badge-danger badge-sm"><?=$bells?></sup>
                <?php } ?>
              </a>
              <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">Kamu memiliki <strong class="text-primary"><?=$bells;?></strong> Pemberitahuan</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">  




           <?php foreach ($diskon->result_array() as $row){ ?>
                  <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modal_dell_exp_<?=$row['diskon_id'] ?>" >
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <div class="avatar bg-primary"><i class="ni ni-calendar-grid-58"></i></div>
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div> 
                            <h4 class="mb-0 text-sm"><?php echo $row['nama_diskon'] ?></h4>
                          </div>
                        </div>
                        <div class="text-sm mb-0">Diskon telah memasuki Masa expired <strong class="text-primary" >Clik Untuk Hapus</strong>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php } ?>

                  <?php if ($min == "0") {
                    
                  }else{ ?>
      <?php
      if ($qtya <= "10") { 

            foreach ($limit->result_array() as $ba) {

            ?>  

                  <a href="#" data-toggle="modal" data-target="#modal_add_qty" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img class="avatar" src="<?php echo base_url().'assets/img/product/'.$ba['menu_gambar']?>">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div> 
                            <h4 class="mb-0 text-sm"><?=$ba['menu_nama'];?></h4>
                          </div>
                        </div>
                        <div class="text-sm mb-0">
                          <?php echo $ba['menu_kategori_nama']."&nbsp;ini tersisa ".$ba['menu_qty']."&nbsp;silahkan tambah stock" ?>
                        </div>
                      </div>
                    </div>
                  </a>
                <?php 
                 }
                } 
              }
              ?>
<?php if ($max == "0") {
}else{
                     ?>
                <?php
      if ($qtyb = "300") { 

            foreach ($limit_max->result_array() as $bas) {

            ?>  

                  <a href="#" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modal_add_diskon" >
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img class="avatar" src="<?php echo base_url().'assets/img/product/'.$bas['menu_gambar']?>">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div> 
                            <h4 class="mb-0 text-sm"><?=$bas['menu_nama'];?></h4>
                          </div>
                        </div>
                        <div class="text-sm mb-0">
                          <?php echo $bas['menu_kategori_nama']."&nbsp;ini kelebihan sampai ".$bas['menu_qty']."&nbsp;waktunya memberikan diskon" ?>
                        </div>
                      </div>
                    </div>
                  </a>
                <?php 
                 }
                }
                } 
              
              ?> 
                </div>
                <!-- View all -->
                <a href="#" class="dropdown-item text-center text-primary font-weight-bold py-3">Cuma Itu Pemberitahuan Hari ini</a>
              </div>
            </li>
            <?php }else{} ?>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-user-circle text-yellow"></i><span class="text-muted">&nbsp;<?php echo $bg['plg_nama'];?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-left">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome! </h6>
                </div>
                <div class="dropdown-divider"></div>
                <a href="<?php echo base_url().'profile' ?>" class="dropdown-item">
                  <i class="ni ni-circle-08"></i>
                  <span>My Profile</span>
                </a>
                <a href="<?php echo base_url().'logout' ?>" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          
          <?php } ?>
        </ul>
       </div>
     </div>
   </nav>