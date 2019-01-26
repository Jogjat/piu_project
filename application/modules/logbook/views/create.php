<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">
                <center>TAMBAH LOGBOOK</center>
            </h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('logbook/create') ?>" method="post"
              role="form" id="validation-form">
            <div class="modal-body">
            <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-5 col-md-offset-0"><?php echo bs_input("Nama Logbook", "required", null, "logbook_name"); ?></div>
                <div class="col-md-6 col-md-offset-1">Tanggal Logbook<input type="text" value="<?php echo date('d-m-Y') ?>">
                </div>  
            </div>
            <div class="form-group">
                    <label>Unggah Dokumen</label>
                    <input type="file" class="form-control" name="files[]" accept=".pdf, .jpg, .jpeg" multiple="">
                        *pdf, jpeg, jpg
            </div>
            <div class="control-group">
                <label class="control-label" for="description">Deskripsi Logbook</label>
                    <div class="controls">
                        <textarea rows="5" cols="40" class="form-control" id="description" required="required" name="deskripsi" placeholder="deskripsi"></textarea>
                        <span class="help-block"></span>
                     </div>
            </div>

            </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" type="submit"> SIMPAN</button>
            </div>
        </form>
        <?php echo px_validate("
        'nama_folder': {
            maxlength: 190,
         },
          "); ?>
    </div>
</div>
