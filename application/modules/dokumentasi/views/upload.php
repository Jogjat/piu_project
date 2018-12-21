<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">
                <center>TAMBAH FILE</center>
            </h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('dokumentasi/do_upload').'/'.$id ?>" method="post"
              enctype="multipart/form-data" role="form">
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-lg-4 col-sm-4 control-label">File :</label>
                    <div class="col-lg-6">
                        <input type="file" class="form-control" name="files[]" accept=".pdf, .jpg, .jpeg" multiple="">
                        *pdf, jpeg, jpg
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-info" type="submit" value="upload"> ADD</button>
                </div>
        </form>
    </div>
</div>
</div>