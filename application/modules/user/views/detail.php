<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">
                <center>DETAIL AKSES FOLDER</center>
            </h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('user/detail') ?>" method="post"
              role="form" id="validation-form">
            <div class="modal-body">
            <div class="form-group">
                <div class="row">
                        <label class="col-lg-3 control-label">Daftar akses folder:</label>
                </div>
            </div>
        </form>
        <?php echo px_validate()?>
        
    </div>
</div>
