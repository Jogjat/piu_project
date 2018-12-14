  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>

      <form id="folder_form" enctype="multipart/form-data">
      <div class="modal-body" id="modal-edit">
          <div class="form-group">
           <label class="col-lg-3 control-label">Folder Name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="hidden" name="id_folder" id="id_folder">
              <input class="form-control" type="text" name="folder_name" id="folder_name" value="<?php echo $dokumentasi->folder_name; ?>">
            </div>
          </div>
          <br>
          <div class="form-group">
            <label class="col-lg-3 control-label">Access:</label>
            <div class="col-lg-8">
              <div class="m-b-2">
              <select class="form-control select2-example select2-hidden-accessible" multiple="" style="width: 100%" tabindex="-1" aria-hidden="true">
                <?php foreach ($user as $data): ?>
                  <option value="<?php echo $data->id_user; ?>"><?php echo $data->username; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            </div>
          </div> 
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
        <a id="update" class="btn btn-info">Save</a>
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