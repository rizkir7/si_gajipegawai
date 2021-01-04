<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan</title>
</head>
<body>
	<center><h2>PT.XYZ<br>
	Jalan Makalam No 10 Kota Jambi <br>
	Telp/Fax 650090/65091 <br>
	LAPORAN GAJI PEGAWAI</h2>
	</center>
	

	<table border="1" style="margin: auto">
        <tr>
          <th>NO</th>
          <th>NAMA PEGAWAI</th>
          <th>TANGGAL GAJIAN</th>
          <th>GAJI POKOK</th>
          <th>UANG MAKAN</th>
          <th>TUNJANGAN JABATAN</th> 
          <th>TOTAL GAJI</th>  
          <th>POTONGAN PPH</th>
          <th>GAJI BERSIH</th>                 
        </tr>    
        <?php 
          $i = 1; 
          $total_pengeluaran = 0;

        foreach($pegawai as $pegawai){ 
        	
        ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $pegawai->nama_pegawai ?></td>
            <td><?=date('d F Y', strtotime($pegawai->tanggal_gajian)); ?></td>
            <!-- <td><?php echo $gaji->nama_jabatan ?></td> -->
            <td><?php echo number_format($pegawai->gaji_pokok,0) ?></td>
            <td><?php echo number_format($pegawai->uang_makan,0) ?></td>
            <td><?php echo number_format($pegawai->tunjangan_jabatan,0) ?></td>
            <td><?php
            $total = $pegawai->gaji_pokok + $pegawai->uang_makan + $pegawai->tunjangan_jabatan;
            echo number_format($total,0) ?></td>
            <td><?php echo number_format($total/100,0) ?></td>
            <td><?php
            $total = $pegawai->gaji_pokok + $pegawai->uang_makan + $pegawai->tunjangan_jabatan;
            $total_gaji = ($pegawai->gaji_pokok + $pegawai->uang_makan + $pegawai->tunjangan_jabatan) - ($total*$pegawai->potongan_pph/100);
            echo number_format($total_gaji,0) ?></td>
          </tr>


        <?php $total_pengeluaran += $total_gaji; $i++; } ?>
     
    </table>
    <p style="text-align: right; margin-right: 300px;">Total Pengeluaran Gaji : <?php echo number_format($total_pengeluaran,0) ?>
    <br><br><br><br>
    Jambi, <?php echo date('d M Y') ?><br><br><br><br>
    Bagian Keuangan
    </p>

</body>
</html>