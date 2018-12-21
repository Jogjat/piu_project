<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
					aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Peringatan</h4>
		</div>
		<?php echo form_open( base_url( 'user/delete') ) ?>
		<input type="hidden" name="_method" value="DELETE">
		<div class="modal-body text-center">
			<span class="fa fa-exclamation-triangle fa-5x" style="color: orange"></span>
			<h3>Apakah anda yakin akan menghapus <?php echo  $judul ?> ?</h3>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-danger">Hapus</button>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>