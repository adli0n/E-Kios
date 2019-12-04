    <div class="main-content" id="panel">
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
    <?php $b=$data_invoice->row_array(); ?>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4">
          <div class="card widget-calendar">
            <!-- Card header -->
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-7">
                  <!-- Title -->
                  <h5 class="h3 mb-0">Informasi Transaksi</h5>
                </div>
                <div class="col-5 float-right">
            <form class="contactForm" action="<?php echo base_url().'cetak-invoice'?>" method="post" target="_Blank">
              <input type="hidden" name="no_invoice" placeholder="Masukan No Invoice Anda" value="<?=$b['inv_no'] ?>" required>
              <button type="submit" class="btn btn-primary">Cetak Invoice</a>
          </form>
                </div>
              </div>
            </div>
            <!-- Card body -->
            <div class="card-body">
            <div class="d-flex justify-content-between pb-2">
              <div>No Invoice:</div>
              <div class="font-weight-medium"><?= $b['inv_no'] ?></div>
            </div>
            <div class="d-flex justify-content-between pb-2">
              <div>Tanggal</div>
              <div class="font-weight-medium"><?= $b['tanggal'] ?></div>
            </div>
            <div class="d-flex justify-content-between pb-2">
              <div>Nama Sales</div>
              <div class="font-weight-medium"><?= $b['inv_plg_nama'] ?></div>
            </div>
            <div class="d-flex justify-content-between pb-2">
              <div>Total Keseluruhan</div>
              <div class="font-weight-medium"><?php echo "Rp.".number_format($b['inv_total']).",-" ?></div>
            </div>
            <div class="d-flex justify-content-between pb-2">
              <div>Pembayaran</div>
              <div class="font-weight-medium"><?php echo "Rp.".number_format($b['inv_bayar']).",-" ?></div>
            </div>
            <div class="d-flex justify-content-between pb-2">
              <div>Kembalian</div>
              <div class="font-weight-medium"><?php echo "Rp.".number_format($b['inv_kembali']).",-" ?></div>
            </div>

            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Faktur Penjualan</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Menu</th>
                      <th scope="col" class="sort" data-sort="budget">Harga</th>
                      <th scope="col" class="sort" data-sort="status">Quantity</th>
                      <th scope="col" class="sort" data-sort="completion">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody class="list">

              <?php foreach ($data_invoice->result_array() as $a) {
                $menu=$a['detail_menu_nama'];
                $harga=$a['detail_harjul'];
                $porsi=$a['detail_porsi'];
                $subtotal=$a['detail_subtotal'];
                $total = $harga*$subtotal;
              ?>
                    <tr>
                      <td scope="row">
                        <div class="media align-items-center"><!-- 
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img alt="Image placeholder" src="">
                          </a> -->
                          <div class="media-body">
                            <span class="name mb-0 text-sm"><?=$menu ?></span>
                          </div>
                        </div>
                      </td>
                      <td class="budget">
                        Rp.<?php echo number_format($harga) ?>,-
                      </td>
                      <td class="media-body">
                          <?=$porsi ?>
                      </td>
                      <td>
                          Rp.<?php echo number_format($subtotal) ?>,-
                      </td>
                    </tr>

                  <?php } ?>
                  <tr>
                    <td colspan="4"><h5 class="float-right btn btn-primary text-white btn-sm" style="margin-right: 70px">Total Rp.<?php echo number_format($b['inv_total'])?>,- </h5></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>