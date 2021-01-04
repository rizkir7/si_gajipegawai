<!-- Page content -->
<div class="page-content">

  <!-- Main sidebar -->
  <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
      <a href="#" class="sidebar-mobile-main-toggle">
        <i class="icon-arrow-left8"></i>
      </a>
      Navigation
      <a href="#" class="sidebar-mobile-expand">
        <i class="icon-screen-full"></i>
        <i class="icon-screen-normal"></i>
      </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

      <!-- User menu -->
      <div class="sidebar-user">
        <div class="card-body">
          <div class="media">
            <div class="mr-3">
              <a href="#"><img src="<?php echo base_url() ?>assets/admin/global_assets/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
            </div>

            <div class="media-body">
              <div class="media-title font-weight-semibold"><?php echo $this->session->userdata('username'); ?></div>
              <div class="font-size-xs opacity-50">
                <i class="icon-pin font-size-sm"></i> &nbsp;
              </div>
            </div>

             <!--  <div class="ml-3 align-self-center">
                <a href="#" class="text-white"><i class="icon-cog3"></i></a>
              </div> -->
            </div>
          </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
          <ul class="nav nav-sidebar" data-nav-type="accordion">

            <?php $nav1 = $this->uri->Segment(2,0) ?>
            <?php $nav2 = $this->uri->Segment(3,0) ?>

            <!-- Main -->
            <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menu Utama</div> <i class="icon-menu" title="Main"></i></li>
            <li class="nav-item">
              <a href="<?php echo base_url('admin/dasbor') ?>" class="nav-link <?php if($nav1 == 'dasbor'){ ?> active <?php }?>">
                <i class="icon-home4"></i><span>Dashboard</span>
              </a>
            </li> 

            <li class="nav-item">
              <a href="<?php echo base_url('admin/pegawai') ?>" class="nav-link <?php if($nav1 == 'pegawai'){ ?> active <?php }?>">
                <i class="icon-list"></i><span>Pegawai</span>
              </a>
            </li> 

            <li class="nav-item">
              <a href="<?php echo base_url('admin/gaji') ?>" class="nav-link <?php if($nav1 == 'gaji'){ ?> active <?php }?>">
                <i class="icon-list"></i><span>Gaji Pegawai</span>
              </a>
            </li> 

            <li class="nav-item">
              <a href="<?php echo base_url('admin/user') ?>" class="nav-link <?php if($nav1 == 'user'){ ?> active <?php }?>">
                <i class="icon-users"></i><span>User</span>
              </a>
            </li> 

          </ul>
        </div>
        <!-- /main navigation -->

      </div>
      <!-- /sidebar content -->
      
    </div>
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

      <!-- Page header -->
      <div class="page-header page-header-light">


        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
          <div class="d-flex">
            <div class="breadcrumb">
              <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
              <?php $u2=$this->uri->segment(2,0); ?>
              <?php $u3=$this->uri->segment(3,0); ?>
              <a class="breadcrumb-item" href="<?php echo base_url('admin/'.$u2) ?>"><?php echo ucfirst($u2); ?></a>
              <?php if($u3){ ?>
                <a class="breadcrumb-item"><?php echo ucfirst($u3); ?>
              </a>
            <?php } ?>
          </div>

          <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>          
      </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">