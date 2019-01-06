<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">
                <center>DETAIL AKSES FOLDER</center>
            </h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('user/detail') ?>" method="post"
              role="form">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8">
                    <div class="form-group">
                        <?php foreach ($userakses as $data): ?>
                        <?php echo $data->folder_name; ?><br>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        </form>      
    </div>
</div>