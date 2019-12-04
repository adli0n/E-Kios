     <div class="main-content">
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
     <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">
                <div class="col-3">
                  <a href="<?php echo base_url().'diskon' ?>" class="btn btn-primary btn-block">Diskon</a>
                </div>
                <div class="col-3">
                  <a href="<?php echo base_url().'hot-promo' ?>" class="btn btn-primary btn-block">Promo Hemat</a>
                </div>
                <div class="col-3">
                  <a href="<?php echo base_url().'makanan' ?>" class="btn btn-primary btn-block">Makanan</a>
                </div>
                <div class="col-3">
                  <a href="<?php echo base_url().'minuman' ?>" class="btn btn-primary btn-block">Minuman</a>
                </div>
              </div>
            </div>
            <div class="table-responsive py-4">
              <table id="basic-datatable" class="table nowrap">
                <thead class="thead-light">
                  <tr>
                  <th>No</th>
                  <th>view</th>
                  <th>info</th>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Produk Tersedia</th>
                  <th>Potongan Diskon</th>
                  <th>Kategori</th>
                  <th>tambakan ke keranjang</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $no = 1;
              foreach ($data->result_array() as $a) {
                $id=$a['menu_id'];
                $nama=$a['menu_nama']; 
                $harga_lama=$a['menu_harga_lama'];
                $harga_baru=$a['menu_harga_baru'];
                $kat_id=$a['menu_kategori_id'];
                $kat_nama=$a['menu_kategori_nama'];
                $gambar=$a['menu_gambar'];
                $diskon=$a['menu_a_diskon'];

                $pot_diskon = $diskon/100*$harga_baru;
                $diskon_to = $harga_baru-$pot_diskon;

                if (empty($a['menu_qty'])) {
                }else{
              ?>
                <tr>
                  <td><?=$no++ ?></td>
                  <td>
                    <img src="<?php echo base_url().'assets/img/product/'.$gambar;?>" data-src="<?php echo base_url().'assets/gambar/'.$gambar;?>" alt="Product Thumbnail" class="avatar">
                  </td>
                  <td>
                  <?php if($harga_lama == TRUE AND $diskon == TRUE){ ?>
                    <span class="btn btn-primary btn-block"><?php echo "Promo Kombo ".$diskon."%" ?></span>
                  <?php }elseif($diskon == TRUE){ ?>
                    <span class="btn btn-info btn-block">Diskon <?=$diskon ?>%</span>
                  <?php }elseif ($harga_baru < $harga_lama) { ?>
                    <span class="btn btn-danger btn-block">Promo Hemat</span>
                  <?php }else{ ?>
                    <span class="btn btn-warning btn-block">Sale</span>
                  <?php } ?>
                  </td>
                  <td><?= $nama ?></td>
                  <td>
                    <?php if(empty($harga_lama)){ ?>
                    Rp. <?php echo number_format($harga_baru);?>,-
                    <?php }elseif ($diskon_to <! $harga_baru) { ?>
                    <del>Rp. <?=$harga_baru;?>,-</del> Rp. <?php echo number_format($diskon_to);?>,-
                    <?php }else{ ?>
                    <del>Rp. <?=$harga_lama;?>,-</del> Rp. <?php echo number_format($harga_baru);?>,-
                    <?php } ?>
                  </td>
                  <td><?php echo $a['menu_qty']?></td>
                  <td>
                    <?php if($diskon_to < $harga_baru) { ?>
                     Rp. <?php echo number_format($pot_diskon);?>,-
                    <?php }else{ echo "tidak ada diskon"; } ?>
                  </td>
                  <td><?=$kat_nama ?></td>
                  <td>
                      <a href="<?php echo base_url().'add/'.$id;?>" class="btn btn-primary btn-icon my-2">
                       <span class="btn-inner--icon"><i class="ni ni-cart"></i></span>
                       <span class="btn-inner--text">Add to cart</span>
                     </a>
               
                  </td>
                </tr>
              <?php  
              }
               } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    