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
    <?php if (empty($this->cart->contents())){ ?>
<div class="container-fluid">
  <div class="row justify-content-center mt--6">
          <div class="col-lg-6"> 
                <img class="d-none d-lg-block mx-auto" src="<?php echo base_url().'assets/img/page-img/illustration-4.png' ?>" style="height:400px;width:auto;">
          </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="card">
       <div class="text-center mt-4">
          <h6 class="h2 my-4 text-primary">Keranjang Belanja Kosong.</h6>
          <p class="px-9 text-muted">
            Keranjang Belanja Masing Kosong, silahkan melakukan transaksi penjualan.
          </p>
          <a href="<?=base_url().'entry-penjualan' ?>" class="btn btn-primary mt-8 mb-4 badge-pill">Entry Penjualan</a>
        </div>
      </div>
    </div>
  </div>
</div>

  <?php }else{ ?>
     <!-- Cart Item-->
    <div class="container mt--6" >
       <form action="<?php echo base_url().'update-pesanan/'?>" method="post">  
      <?php
       $i = '1';
       foreach ($this->cart->contents() as $items){
       echo form_hidden($i.'[rowid]', $items['rowid']); 
       $harga_awal = $items['price']*$items['menu_a_diskon']
       ?>  
      <div class="card">
        <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <!-- Avatar -->
                  <a href="#" class="avatar avatar-xl">
                    <img alt="Image placeholder" src="<?php echo base_url().'assets/gambar/'.$items['image']?>">
                  </a>
                </div>
                <div class="col ml--2">
                  <h4 class="mb-0">
                    <a href="#!"><?=$items['name'];?></a>
                  </h4>
                  <p class="text-sm text-muted mb-0">
                    
                <?php if (empty($items['menu_a_diskon'])){ ?>
                Harga  : Rp.<?php echo $items['price'] ?>,-
                <?php }else{?>
                Harga  : Rp.<?php echo $items['price_awal'] ?>,-
              <?php } ?>
                  </p>
                  <small>
                    
                <?php if(empty($items['menu_nama_diskon'])) {}else{
                 echo $items['menu_nama_diskon'] ?>, Sebesar <?php echo $items['menu_a_diskon']."%"; }?>
                  </small>
                </div>
                <div class="col-auto">
                  <input class="form-control" type="number" name="<?php echo $i.'[qty]'?>" value="<?php echo number_format($items['qty']);?>" min="1" max="<?php echo $items['qty_awal']?>">
                </div>
                <div class="col-auto">
                  <h4> <?php echo "Rp".number_format($items['subtotal']).",-" ?></h4>
                </div>
                <div class="col-auto">
                  <a href="<?php echo base_url().'hapus-pesanan-2/'.$items['rowid'];?>" class="btn btn-danger">X</a>
                </div>
              </div>
            </div>
      </div>

  <?php $i++;
} ?>
      <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4 text-right">
          <span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">Total:</span>
          <span class="d-inline-block align-middle text-xl font-weight-medium">Rp.<?php echo number_format($this->cart->total());?>,-</span>
        </div>
      </div>
      <!-- Buttons-->
      <hr class="my-2">
      <div class="row pt-3 pb-5 mb-2">
        <div class="col-sm-6 mb-3">
          <button type="submit" class="btn btn-white btn-block"><i class="fe-icon-refresh-ccw"></i>&nbsp;Update Cart</button>
        </div>
    </form> 

        <div class="col-sm-6 mb-3">

           <form action="<?php echo base_url().'checkout/'?>" method="post">
          <input type="number" name="inv_bayar" class="form-control " placeholder="Pembayaran" required value="<?php echo ceil($this->cart->total()) ?>">
          <button class="btn btn-primary btn-block mt-3" type="submit"><i class="fe-icon-credit-card"></i>&nbsp;Checkout</button>
        </form>
        </div>

      </div>
  </div>

  <?php } ?>