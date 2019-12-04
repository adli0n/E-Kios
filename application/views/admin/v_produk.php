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
              <div class="row">
                <div class="col-3">
                  <button data-toggle="modal" data-target="#modal_add" class="btn btn-primary btn-block">Tambah Produk</button>
                </div>
                <div class="col-3">
                  <button data-toggle="modal" data-target="#modal_view_kategori" class="btn btn-primary btn-block">Tambah Kategori</button>
                </div>
                <div class="col-3">
                  <button  data-toggle="modal" data-target="#modal_add_diskon" class="btn btn-primary btn-block">Beri Diskon</button>
                </div>
                <div class="col-3">
                  <button data-toggle="modal" data-target="#modal_add_qty" class="btn btn-primary btn-block">Tambah Quantity</button>
                </div>
              </div>
            </div>
            <div class="table-responsive py-4">
              <table id="basic-datatable" class="table nowrap table-striped">
                <thead class="thead-light">
                  <tr>
                  <th>No</th>
                  <th>view</th>
                  <th>view</th>
                  <th>Produk</th>
                  <th>Harga lama</th>
                  <th>Harga baru</th>
                  <th>Kategori</th>
                  <th>Quantity</th>
                  <th>Opsi</th>
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
                $qty=$a['menu_qty'];
                $gambar=$a['menu_gambar'];
                $diskon=$a['menu_a_diskon'];

              ?>
                <tr>
                  <td><?=$no++ ?></td>
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
                  <td>
                    <img src="<?php echo base_url().'assets/img/product/'.$gambar;?>" data-src="<?php echo base_url().'assets/gambar/'.$gambar;?>" alt="Product Thumbnail" class="avatar">
                  </td>
                  <td><?= $nama ?></td>
                  <td>
                    Rp. <?php echo number_format($harga_lama);?>,-
                  </td>
                  <td>
                    Rp. <?php echo number_format($harga_baru);?>,-
                  </td>
                  <td><?=$kat_nama ?></td>
                  <td>
                    <?=$qty ?>
                  </td>
                  <td>
                     <div class="dropdown">
                        <a class="btn btn-primary btn-block btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="#"data-toggle="modal" data-target="#modal_hapus_pengguna<?php echo $id;?>"><i class="fas fa-trash"></i>Delete</a>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_edit_<?=$id?>"><i class="fas fa-edit"></i>Update Menu</a>

                          <?php if (empty($diskon)){}else{ ?>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal_update_diskon_<?=$id?>"><i class="fas fa-edit"></i>Update Diskon</a>
                          <?php }?>

                        </div>
                      </div>
                  </td>
                </tr>
              <?php   } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



          
     <?php 
                foreach ($data->result_array() as $a) {
                $id=$a['menu_id'];
                $nama=$a['menu_nama'];

              ?>
        <div class="modal fade" id="modal_hapus_pengguna<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
          <form action="<?php echo base_url().'dell-produk'?>" method="post">
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

                  <div class="modal fade" id="modal_view_kategori" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-primary">
                              <div class="text-muted text-center text-white">Kategori</div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="row">
                                  <div class="col-12">
                                    <form method="post" role="form" action="<?php echo base_url().'add-kategori'?>">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Tambahkan Kategori" type="text" name="kategori">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="text-center">
                                </div>
                              </form>
                                    <div class="table-responsive">
                                      <table id="basic-datatable" class="table nowrap table-striped">
                                        <tr>
                                          <th>No</th>
                                          <th>Nama Kategori</th>
                                          <th>Opsi</th>
                                        </tr>
                                        <?php 
                                        $noo=1;
                                        foreach ($kat->result_array() as $row) { ?>
                                        <tr>
                                          <td><?=$noo++ ?></td>
                                          <td><?=$row['kategori_nama'] ?></td>
                                          <td>

                                            <form action="<?=base_url().'dell-kategori' ?>" method="post">
                                            <input type="hidden" name="kode" value="<?php echo $row['kategori_id'];?>">
                                            <input type="hidden" name="nama" value="<?php echo $row['kategori_nama'];?>">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </form>
                                          </td>
                                        </tr>
                                        <?php } ?>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
 <?php 
              foreach ($data->result_array() as $a) {
                $id=$a['menu_id'];
                $nama=$a['menu_nama'];  
                $harga_lama=$a['menu_harga_lama'];
                $harga_baru=$a['menu_harga_baru'];
                $kat_id=$a['menu_kategori_id'];
                $kat_nama=$a['menu_kategori_nama'];
                $qty=$a['menu_qty'];
                $gambar=$a['menu_gambar'];
                $diskon=$a['menu_a_diskon'];

              ?>
                  <div class="modal fade" id="modal_edit_<?=$id ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-primary">
                              <div class="text-muted text-center text-white">Edit Produk</div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                              <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url().'upd-produk'?>">
                                        <input class="form-control" placeholder="Menu Nama" type="hidden" name="kode" value="<?=$id ?>">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Menu Nama" type="text" name="nama" value="<?=$nama ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Harga" type="number"  name="harga"  value="<?=$harga_baru ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <select class="form-control" name="kategori_id">
                                              <?php 
                                               foreach ($kat->result_array() as $k) {
                                                  $k_id=$k['kategori_id'];
                                                  $k_nama=$k['kategori_nama'];
                                              ?>
                                              <option value="<?php echo $k_id;?>"><?php echo $k_nama;?></option>
                                              <?php } ?>  
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" type="file" name="filefoto">
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
                  <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-primary">
                              <div class="text-muted text-center text-white">Tambahkan Produk</div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                              <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url().'add-produk'?>">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Menu Nama" type="text" name="nama">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Harga" type="number"  name="harga">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <select class="form-control" name="kategori_id">
                                              <?php 
                                               foreach ($kat->result_array() as $k) {
                                                  $k_id=$k['kategori_id'];
                                                  $k_nama=$k['kategori_nama'];
                                              ?>
                                              <option value="<?php echo $k_id;?>"><?php echo $k_nama;?></option>
                                              <?php } ?>  
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" placeholder="Quantity" type="number"  name="qty">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <input class="form-control" type="file" name="filefoto">
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
                foreach ($data->result_array() as $a) {
                $id=$a['menu_id'];
                $nama=$a['menu_nama'];

              ?>
          <div class="modal fade" id="modal_update_diskon_<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-primary">
                              <div class="text-muted text-center text-white">Update Diskon</div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                              <form method="post" role="form" action="<?php echo base_url().'add-menu-diskon'?>">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="form-group mb-3">
                                      <div class="input-group input-group-merge input-group-alternative">
                                        <select class="form-control" name="kode_menu" readonly>
                                          <option value="<?=$a['menu_id'] ?>"><?php echo $a['menu_nama']; ?></option>
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
                  <?php } ?>