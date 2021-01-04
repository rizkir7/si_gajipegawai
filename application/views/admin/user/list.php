<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Semua User</h5>        
    <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>admin/user/tambah'>Tambahkan Data</a>        
  </div>

  <div class="card-body">
    <table id="example1" class="table datatable-responsive">
      <thead>
        <tr>
          <th>NO</th>
          <th>USERNAME</th>
          <th width="5%">OPTION</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php 
          $i = 1;
          foreach ($user as $user){ ?>
            <td><?php echo $i ?></td>
            <td><?php echo $user->username ?></td>
            <td class='text-center'>
              <div class='list-icons'>
                <div class='dropdown'>
                  <a href='#' class='list-icons-item' data-toggle='dropdown'><i class='icon-menu9'></i></a>
                  <div class='dropdown-menu dropdown-menu-right'>                    
                    <a class='dropdown-item' title='Edit Data' href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>"><i class='fa fa-edit'></i>Edit</a>
                    <a class='dropdown-item' title='Delete Data' href="<?php echo base_url('admin/user/delete/'.$user->id_user) ?>" onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><i class='fa fa-trash'></i>Hapus</a>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <?php $i++; } ?>

        </tbody>
      </table>
    </div>
  </div>
