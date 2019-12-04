<script type="text/javascript">
    $(document).ready(function(){       
        $(".btn-primary").mousedown(function(){
                document.getElementById("pass").type="text";
            }).mouseup(function(){
                document.getElementById("pass").type="password";
        });
    }); 
</script>  
<div class="account-pages mt-9">
  <div class="container mb-5">
      <div class="row justify-content-center">
          <div class="col-lg-7"> 
                <img class="d-none d-lg-block mx-auto" src="<?php echo base_url().'assets/img/page-img/illustration-3.png' ?>" style="height:400px;width:auto;">
          </div>
          <div class="col-lg-5">
            <?php if (!empty($this->session->flashdata('msg'))){ ?>
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <span class="alert-text"><?= $this->session->flashdata('msg') ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                
            <?php } ?>
            <div class="ml-5">
              
            <h5 class="display-3 text-muted">Welcome :)</h5>
            <p class="card-title">This is just a beta platform from Werls N Resto. </p>
            </div>
            <div class="container">
            <div class="card-body p-4"> 
                  <form role="form" method="post" action="<?php echo base_url().'auth' ?>">
                      <div class="form-group mb-3">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                          </div>
                          <input class="form-control" placeholder="Email" type="email" name="email" id="email" autocomplete="off">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                          </div>
                          <input class="form-control" name="pass" id="pass" placeholder="Password" autocomplete="off" type="password">
                        </div>
                      </div>
                      <div class="float-left mt-5">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <button type="reset" class="btn btn-secondary mr-5">Lupa Password?</button>
                      </div>
                  </form>
            </div>

          </div>
      </div>
  </div>
</div>