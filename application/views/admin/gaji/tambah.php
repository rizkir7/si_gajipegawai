<h2>Tambah Pegawai Baru</h2> 
<div class="card">
<div class="card-body">
<?php 
//Notifikasi Kalau ada input error

echo validation_errors('<div class = "alert alert-danger"><i class="fa fa-warning"></i> ','</div>');


if(isset($error)){
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

//Open Form
echo form_open_multipart(base_url('admin/gaji/tambah'));

?>
	<form>
		<fieldset class="mb-3">		
			<div class="form-group row">
				<label class="col-form-label col-lg-2">NIK</label>
				<div class="col-lg-10">
					<select name="id_pegawai" class="form-control" onChange="get_data(this.value)">
							<option>--Pilih Pegawai--</option>
							<?php foreach($pegawai as $pegawai) { ?>
								<option value="<?php echo $pegawai->id_pegawai ?>">
									<?php echo $pegawai->nik?> | <?php echo $pegawai->nama_pegawai?>
								</option>
							<?php } ?>
						</select>
				</div>
			</div>

			<div class="form-group row" hidden>
				<label class="col-form-label col-lg-2">Jabatan</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="id_gaji" required>
				</div>
			</div>

			<!-- <div class="form-group row">
				<label class="col-form-label col-lg-2">Jabatan</label>
				<div class="col-lg-10">
					<select name="id_gaji" class="form-control">
							<option>--Pilih jabatan--</option>
							<?php foreach($jabatan as $jabatan) { ?>
								<option value="<?php echo $jabatan->id_jabatan ?>">
									<?php echo $jabatan->nama_jabatan?>
								</option>
							<?php } ?>
						</select>
				</div>
			</div> -->

			<div class="form-group row">
				<label class="col-form-label col-lg-2">Tanggal Gajian</label>
				<div class="col-lg-10">
					<input type="date" class="form-control" name="tanggal_gajian" required>
				</div>
			</div>

			

			<div class="form-group row">
				<div class="col-lg-10">
				<button type='submit' name='submit' class='btn btn-primary'>Simpan <i class='icon-paperplane ml-2'></i></button>
				<button type='reset' class='btn btn-default'>Cancel <i class='icon-cross ml-2'></i></button>	
				</div>
			</div>
		</fieldset>
	</form>
	<?php 

echo form_close();

?>
</div>
</div>

<script type="text/javascript">
	function get_data(id_pegawai)
	{
		$.ajax({
			url :"<?php echo base_url(); ?>admin/gaji/get_pegawai",
			data:{id_pegawai : id_pegawai},
			success: function(data)
			{
				var dt = JSON.parse(data);
				$("input[name=id_gaji]").val(dt.id_jabatan);			
			}
		});	
	}
</script>