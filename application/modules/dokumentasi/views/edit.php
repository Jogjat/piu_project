  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url(); ?>dokumentasi/edit/<?php echo $dokumentasi->id_folder ?>" method="post" enctype="multipart/form-data" role="form">
      <div class="modal-body" id="modal-edit">
          <div class="form-group">
           <label class="col-lg-3 control-label">Folder Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="hidden" name="id_folder" id="id_folder" value="<?php echo $dokumentasi->id_folder; ?>">
              <input class="form-control" type="text" name="folder_name" id="folder_name" value="<?php echo $dokumentasi->folder_name; ?>">
            </div>
          </div>
          <br>
          <div class="form-group">
           <label class="col-lg-3 control-label">Akses:</label>
            <div class="col-lg-8">
              <div class="m-b-2">
              <select name="akses[]" class="form-control select2-example select2-hidden-accessible" multiple="" style="width: 100%" tabindex="-1" aria-hidden="true">
                <?php foreach ($users as $data): ?>
                  <option <?php echo $this->dokumentasi_model->access($dokumentasi->id_folder,$data->id) ? "selected" : "" ?> value="<?php echo $data->id; ?>"><?php echo $data->first_name.' '.$data->last_name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            </div>
          </div> 
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
        <button class="btn btn-info" type="submit"> Save</button>
      </div>
      </form>
    </div>
  </div>

<script type="text/javascript">
$(function() {
      $('.select2-example').select2({
        placeholder: 'Select user',
        dropdownParent: $('#myModelDialog')
      });
    });
</script>