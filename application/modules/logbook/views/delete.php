<div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Hapus Logbook</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('logbook/index')?>">
                <div class="modal-body text-center">
                    <span class="fa fa-exclamation-triangle fa-5x" style="color: orange"></span>
                    <h3>Anda yakin mau menghapus ?</h3>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
            </div>
            </div>
