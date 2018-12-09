
<div class="row">
    <div class="col-md-offset-10 col-md-2 ">
    	<a data-toggle="modal" data-target="#tambah-folder" class="btn btn-primary btn-lg"><span class="fa fa-plus"></span>&nbsp; ADD FOLDER</a>
    </div>
</div>
    <?=$this->session->flashdata('notif')?>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>No.</th>
					<th>Folder Name</th>
					<th>Create Date</th>
					<th><center>Subfolder</center></th>
					<th><center>Aksi</center></th>
				</tr>
			</thead>
			<tbody>
				<?php $no=0; foreach ($data as $dt){ ?>
				<tr>
					<td><?php echo ++$no;?></td>
					<td><?php echo $dt['folder_name'];?></td>
					<td><?php 
					//$data['create_date'] =  date('Y-m-d H:i:s');
					//$this->db->insert('create_date', $data);
					//$this->db->select('NOW() as create_date')->get()->row()->create_date
						$date = new DateTime();
						$date->setTimeZone(new DateTimeZone("Asia/Jakarta"));
						echo $date->format('d-m-y H:i:s');
						//echo $now->getTimestamp();
						?>
					</td>
					<td>
						<center><a href="#" class="btn btn-info">Add</a>
						</center>
					</td>
					<td><center>
						<a href="#" class="btn btn-info">Ubah</a>
						<a href="#" class="btn btn-danger">Hapus</a>
					</center>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

<!-- Modal Tambah -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-folder" class="modal fade">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
	                <h4 class="modal-title"><center>ADD FOLDER</center></h4>
	            </div>
	            <form class="form-horizontal" action="<?php echo base_url('dokumentasi/tambah')?>" method="post" enctype="multipart/form-data" role="form">
		            <div class="modal-body">
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Folder Name</label>
		                        <div class="col-lg-6">
		                            <input type="text" class="form-control" name="folder_name" placeholder="folder name">
		                        </div>
		                    </div>
		                    
		                   <div class="modal-footer">
		                    <button class="btn btn-info" type="submit"> ADD</button>
		                   </div>
	                </form>
	            </div>
	        </div>
	    </div>
</div>
	<!-- END Modal Tambah -->
</body>
</html>
