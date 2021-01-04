	<button class="btn btn-danger" data-toggle="modal" data-target="#1">
	Cetak Laporan
</button>

<div class="modal fade" id="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header alert alert-success">
	<button type="button" class="close" data-dismiss="modal" aria_hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Cetak Laporan</h4>
</div>

<div class="modal-body">
	<form action="gaji/laporancetakperiode" method="post" target="_blank">
	<div class="col-md-6">
		<table>
			<b>Berdasarkan Tanggal Gajian : </b><br><br>
			<tr>
				<td>
					<div class="form-group">Dari Tanggal </div>				
				</td>
				<td align="center" width="5%">
					<div class="form-group"><b> 	:</b></div>				
				</td>
				<td>
					<div class="form-group">
					<input type="date" class="form-control" name="tgl_a">
					</div>				
				</td>
			</tr>
			<tr>
				<td>
					<div class="form-group">Sampai Tanggal </div>				
				</td>
				<td align="center">
					<div class="form-group"><b> 	:</b></div>				
				</td>
				<td>
					<div class="form-group">
					<input type="date" class="form-control" name="tgl_b">
					</div>				
				</td>
			</tr>			
			<tr>
				<td></td>
				<td></td>
				<td>
					<input type="submit" name="cetak" class="btn btn-default" value="Cetak">
				</td>
			</tr>
		</table>
	</form>
	</div>

	
</div>

<div class="modal-footer" style="padding-top: 200px">
	<!-- <a href="admin/gaji/laporancetaksemua" target="_blank" class="btn btn-default">Cetak Semua Data</a> -->
	<button type="button" class="btn btn-success" data-dismiss="modal"> Tutup</button>
</div>

</div>
</div>
</div>