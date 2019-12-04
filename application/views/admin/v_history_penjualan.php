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
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
            </div>
            <div class="table-responsive py-4">
              <table id="basic-datatable" class="table nowrap table-striped">
                <thead class="thead-light">
                  <tr>
                  <th>No</th>
                  <th>No Invoice</th>
                  <th>Nama seles</th>
                  <th>Tanggal</th>
                  <th></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $no = 1;
            foreach ($data_his->result_array() as $a)
               {

              ?>
                <tr>
                  <td><?=$no++ ?></td>
                  <td><?=$a['inv_no'] ?></td>
                  <td><?=$a['inv_plg_nama'] ?></td>
                  <td><?=$a['inv_tanggal'] ?></td>
                  <td>
                    
            <form class="contactForm" action="<?php echo base_url().'detail'?>" method="post">
              <input type="hidden" name="no_invoice" placeholder="Masukan No Invoice Anda" value="<?=$a['inv_no'] ?>" required>
              <button type="submit" class="btn btn-primary btn-sm mt-2"data-toggle="modal">View Order Details</a>
          </form>
                  </td>
                </tr>
              <?php   } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
