<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            <h4 class="modal-title">
                <!-- judul logbook -->
                <center>NOTULENSI RAPAT</center>
            </h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('logbook/preview') ?>" method="post"
              role="form" id="validation-form">
            <div class="modal-body">
                <p>Tanggal :</p>
                <p>Deskripsi :</p>
                <i class="fa fa-paperclip" style="font-size:20px;"></i>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="submit"> UNDUH</button>
            </div>
        </form>
        <?php echo px_validate("
        'nama_folder': {
            maxlength: 190,
         },
          "); ?>
    </div>
</div>
