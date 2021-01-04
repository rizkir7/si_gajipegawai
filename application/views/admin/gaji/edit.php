<h2>Edit Pegawai</h2> 
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
echo form_open_multipart(base_url('admin/pegawai/edit/'.$pegawai->id_pegawai));

?>
	<form>
		<fieldset class="mb-3">		
			<div class="form-group row">
				<label class="col-form-label col-lg-2">NIK</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="nik" required value="<?php echo $pegawai->nik ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-form-label col-lg-2">Nama Pegawai</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="nama_pegawai" required value="<?php echo $pegawai->nama_pegawai ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-form-label col-lg-2">Tanggal Masuk Kerja</label>
				<div class="col-lg-10">
					<input type="date" class="form-control" name="tanggal_masuk_kerja" value="<?php echo $pegawai->tanggal_masuk_kerja ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-form-label col-lg-2">Tanggal Lahir Pegawai</label>
				<div class="col-lg-10">
					<input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $pegawai->tanggal_lahir ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-form-label col-lg-2">Jabatan</label>
				<div class="col-lg-10">
					<select name="id_jabatan" class="form-control">
							<option>--Pilih Jabatan--</option>
							<?php 
							$jabatan = $this->db->query("SELECT * from tbl_jabatan order by id_jabatan")->result();
							foreach ($jabatan as $jabatan){ ?>
								<option value="<?php echo $jabatan->id_jabatan ?>" <?php if($pegawai->id_jabatan==$jabatan->id_jabatan) { echo "selected";} ?>><?php echo $jabatan->nama_jabatan ?></option>
							<?php } ?>
						</select>
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