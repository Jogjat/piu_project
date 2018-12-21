<div class="modal-dialog" role="user">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        <h4 class="modal-title">Edit User</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url('user/edit')?>" method="post" enctype="multipart/form-data" role="form">
      <div class="modal-body" id="modal-edit">
          <div class="form-group">
           <label class="col-lg-3 control-label">Type</label>
            <div class="col-lg-8">
              <input class="form-control" type="hidden" name="id" id="id">
              <input class="form-control" type="text" name="type" id="type" value="<?php echo $user->type; ?>">
            </div>
          </div>
          <div class="form-group">
           <label class="col-lg-3 control-label">Username</label>
            <div class="col-lg-8">
              <input class="form-control" type="hidden" name="id" id="id">
              <input class="form-control" type="text" name="username" id="username" value="<?php echo $user->username; ?>">
            </div>
          </div>
          <div class="form-group">
           <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" type="hidden" name="id" id="id">
              <input class="form-control" type="text" name="email" id="email" value="<?php echo $user->email; ?>">
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
        <a class="btn btn-info" type="submit">Save</a>
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
