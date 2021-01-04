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
echo form_open_multipart(base_url('admin/user/tambah'));

?>
	<form>
		<fieldset class="mb-3">		
			<div class="form-group row">
				<label class="col-form-label col-lg-2">Username</label>
				<div class="col-lg-10">
					<input type="text" class="form-control" name="username" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-form-label col-lg-2">Password</label>
				<div class="col-lg-10">
					<input type="password" class="form-control" name="password" required>
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