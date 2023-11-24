<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/css/plugin/screen.css">
<style>
	/* Chrome, Safari, Edge, Opera */
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	/* Firefox */
	input[type=number] {
		-moz-appearance: textfield;
	}

</style>
<?= $this->session->flashdata('message');?>
<div class="box">
	<div class="box-header">
		<!-- <h3 class="boc-title">Cek NIK</h3> -->
	</div>
	<div class="box-body">
		<table id="datatable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>NIM</th>
					<th>Tanggal absen</th>
					<th>Tanda tangan digital</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1;
				foreach ($row as $key => $data) { ?>
				<tr>
					<td style="width:5%;"><?=$no++?></td>
					<td><?=$data->nama?></td>
					<td><?=$data->nim?></td>
					<td><?=date("d-m-Y", strtotime($data->created_at));?></td>
					<td><img src="<?=base_url('upload/ttd_digital/'.$data->ttd);?>" class="user-image" alt="User Image" width="200" height="100"></td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>NIM</th>
					<th>Tanggal absen</th>
					<th>Tanda tangan digital</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>


<!-- -- PBI MODAL -- -->
<div class="modal fade" id="pbiModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Cek NIK yang diusulkan</h4>
			</div>
			<form method="post" id="form-nik-pbi" name="form-nik-pbi" action="<?=site_url('dashboard/cek_nik_pbi')?>"
				enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>NIK KIS PBI</label>
								<input type="number" class="form-control no-arrow" id="nik_pbi" name="nik_pbi"
									placeholder="Masukkan NIK" data-rule-required="true" data-rule-minlength="16"
									data-rule-maxlength="20" data-msg-required="NIK masih kosong, silakan isi"
									data-msg-minlength="NIK minimal 16 karakter"
									data-msg-maxlength="NIK maksimal 20 karakter">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" id="kispbi" class="btn btn-primary">Cek Data</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- -- PPKS MODAL -- -->
<div class="modal fade" id="ppksModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Cek NIK yang diusulkan</h4>
			</div>
			<form method="post" id="form-nik-ppks" name="form-nik-ppks" action="<?=site_url('dashboard/cek_nik_ppks')?>"
				enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>NIK PPKS</label>
								<input type="number" class="form-control no-arrow" id="nik_ppks" name="nik_ppks"
									placeholder="Masukkan NIK" data-rule-required="true" data-rule-minlength="16"
									data-rule-maxlength="20" data-msg-required="NIK masih kosong, silakan isi"
									data-msg-minlength="NIK minimal 16 karakter"
									data-msg-maxlength="NIK maksimal 20 karakter">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Cek Data</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- <div id="result" class="warning">Please login!</div> -->

<script src="<?php echo base_url();?>/assets/backend/js/plugin/jquery.validate.js"></script>
<script>
  $(document).ready(function(){
    $('#datatable').DataTable()
  })
</script>
