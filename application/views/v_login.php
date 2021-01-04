<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistem Informasi Gaji Pegawai</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/admin/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/admin/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/admin/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>assets/admin/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url() ?>assets/admin/global_assets/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url() ?>assets/admin/assets/js/app.js"></script>
	<!-- /theme JS files -->

</head>


<body>

  <!-- Page content -->
  <div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

      <!-- Content area -->
      <div class="content d-flex justify-content-center align-items-center">

        <!-- Login form -->
        <form class="login-form" action="<?php echo base_url('login') ?>" method="post">
          <div class="card mb-0">
            <div class="card-body">
              <div class="text-center mb-3">
                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>           
                <h5 class="mb-0">Login</h5>
                <span class="d-block text-muted">Masukkan Username dan Password Anda</span>
              </div>

              <?php 
                //Notifikasi Kalau ada input error
                echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');
                ?>

                <?php 
                if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger"><i class="fa fa-close"></i>';
                echo $this->session->flashdata('error');
                echo '</div>';
                }

                if ($this->session->flashdata('sukses')) {
                echo '<div class="alert alert-success"><i class="fa fa-close"></i>';
                echo $this->session->flashdata('sukses');
                echo '</div>';
                }
                ?>         
              
              <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="text" class="form-control" placeholder="Username" name="username">
                <div class="form-control-feedback">
                  <i class="icon-user text-muted"></i>
                </div>
              </div>

              <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="form-control-feedback">
                  <i class="icon-lock2 text-muted"></i>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Masuk <i class="icon-circle-right2 ml-2"></i></button>
              </div><br>
              <p>Username : admin <br>
               Password : 12345678</p>
            </div>
          </div>
          <br>
        </form>
        <!-- /login form -->


      </div>
      <!-- /content area -->


      

    </div>
    <!-- /main content -->

  </div>
  <!-- /page content -->

</body>
</html>
