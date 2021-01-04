<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Daftar Gaji Pegawai</h5>        
    <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>admin/gaji/tambah'>Tambahkan Data</a>   
    <?php include ('modal_laporan.php') ?></p><br>       
  </div>

  <div class="card-body">
    <table id="example1" class="table datatable-responsive">
      <thead>
        <tr>
          <th>NO</th>
          <th>NAMA PEGAWAI</th>
          <th>TANGGAL GAJIAN</th>
          <th>GAJI POKOK</th>
          <th>UANG MAKAN</th>
          <th>TUNJANGAN JABATAN</th>
          <th>TOTAL GAJI</th>
          <th width="5%">OPTION</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php 
          $i = 1;
          foreach ($gaji as $gaji){ ?>
            <td><?php echo $i ?></td>
            <td><?php echo $gaji->nama_pegawai ?></td>
            <td><?=date('d F Y', strtotime($gaji->tanggal_gajian)); ?></td>
            <!-- <td><?php echo $gaji->nama_jabatan ?></td> -->
            <td><?php echo number_format($gaji->gaji_pokok,0) ?></td>
            <td><?php echo number_format($gaji->uang_makan,0) ?></td>
            <td><?php echo number_format($gaji->tunjangan_jabatan,0) ?></td>
            <td><?php
            $total = $gaji->gaji_pokok + $gaji->uang_makan + $gaji->tunjangan_jabatan;
            echo number_format(($gaji->gaji_pokok + $gaji->uang_makan + $gaji->tunjangan_jabatan) - ($total*$gaji->potongan_pph/100),0) ?></td>
            <!-- <td><?=date('d F Y', strtotime($gaji->tanggal_masuk_kerja)); ?></td> -->
            <td class='text-center'>
              <div class='list-icons'>
                <div class='dropdown'>
                  <a href='#' class='list-icons-item' data-toggle='dropdown'><i class='icon-menu9'></i></a>
                  <div class='dropdown-menu dropdown-menu-right'>                    
                    <a class='dropdown-item' title='Edit Data' href="<?php echo base_url('admin/gaji/edit/'.$gaji->id_gaji_pegawai) ?>"><i class='fa fa-edit'></i>Edit</a>
                    <a class='dropdown-item' title='Delete Data' href="<?php echo base_url('admin/gaji/delete/'.$gaji->id_gaji_pegawai) ?>" onclick="return confirm('Apa anda yakin untuk hapus Data ini?')"><i class='fa fa-trash'></i>Hapus</a>
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
