	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
	                <h4 class="modal-title"><center>ADD FOLDER</center></h4>
	            </div>
	            <form class="form-horizontal" action="<?php echo base_url('dokumentasi/create_subfolder')?>" method="post" enctype="multipart/form-data" role="form">
		            <div class="modal-body">
		                    <div class="form-group">
		                        <label class="col-lg-4 col-sm-4 control-label">Folder Name</label>
		                        <div class="col-lg-6">
		                            <input type="text" class="form-control" name="folder_name" placeholder="Folder name">
		                        </div>
		                    </div>
		                    
		                   <div class="modal-footer">
		                    <button class="btn btn-info" type="submit"> ADD</button>
		                   </div>
	                </form>
	            </div>
	        </div>
	    </div>