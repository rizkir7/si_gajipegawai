<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Semua Pegawai</h5>        
    <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>admin/pegawai/tambah'>Tambahkan Data</a>        
  </div>

  <div class="card-body">
    <table id="example1" class="table datatable-responsive">
      <thead>
        <tr>
          <th>NO</th>
          <th>NIK</th>
          <th>NAMA PEGAWAI</th>
          <th>TANGGAL MASUK KERJA</th>
          <th>TANGGAL LAHIR</th>
          <th width="5%">OPTION</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php 
          $i = 1;
          foreach ($pegawai as $pegawai){ ?>
            <td><?php echo $i ?></td>
            <td><?php echo $pegawai->nik ?></td>
            <td><?php echo $pegawai->nama_pegawai ?></td>
            <td><?=date('d F Y', strtotime($pegawai->tanggal_masuk_kerja)); ?></td>
            <td><?=date('d F Y', strtotime($pegawai->tanggal_lahir)); ?></td>
            <td class='text-center'>
              <div class='list-icons'>
                <div class='dropdown'>
                  <a href='#' class='list-icons-item' data-toggle='dropdown'><i class='icon-menu9'></i></a>
                  <div class='dropdown-menu dropdown-menu-right'>                    
                    <a class='dropdown-item' title='Edit Data' href="<?php echo base_url('admin/pegawai/edit/'.$pegawai->id_pegawai) ?>"><i class='fa fa-edit'></i>Edit</a>
                    <a class='dropdown-item' title='Delete Data' href="<?php echo base_url('admin/pegawai/delete/'.$pegawai->id_pegawai) ?>" onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><i class='fa fa-trash'></i>Hapus</a>
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
