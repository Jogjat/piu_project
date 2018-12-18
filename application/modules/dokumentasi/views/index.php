
<div class="row">
    <div class="col-md-offset-10 col-md-2 ">
    	<a href="<?php echo base_url('dokumentasi/tambah'); ?>" target="ajax-modal" class="btn btn-primary btn-lg"><span class="fa fa-plus"></span>&nbsp; ADD FOLDER</a>
    </div>
</div>
    <?=$this->session->flashdata('notif')?>
    <?=$this->session->flashdata('hapus')?>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Folder Name</th>
					<th>Create Date</th>
					<th><center>Aksi</center></th>
				</tr>
			</thead>
			<tbody>
				<?php $no=0; foreach ($data as $dt){ ?>
				<tr>
					<td><?php echo ++$no;?></td>
					<td><?php echo $dt->folder_name; ?></td>
					<td><?php echo strftime('%A, %d %B %Y', strtotime($dt->create_date)); ?></td>
					<td><center>
						<a href="#" class="btn btn-info">Ubah</a>
						<a href="<?php echo base_url('dokumentasi/hapus'); ?>" target="ajax-modal" class="btn btn-danger">HAPUS</a>
					</center>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

<!-- Modal Tambah -->

</div>
	<!-- END Modal Tambah -->
</body>
</html>
