<div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Bagikan Logbook</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('logbook/index')?>">
                <div class="modal-body">
                    <div class="row">
                <div class="col-md-2"><i class="fa fa-file-text-o" style="font-size:40px;"></i></div>
                <div class="col-md-2">
                    <!-- nama logbook -->
                </div>  
            </div>
            <?php echo bs_input("", "required", null, "share"); ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Kirim</button>
                    <a class="btn btn-danger" data-dismiss="modal">Batal</a>
                </div>
            </form>
            </div>
            </div>
