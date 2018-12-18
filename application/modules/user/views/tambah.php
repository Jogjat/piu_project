  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <form id="folder_form" enctype="multipart/form-data">
      <div class="modal-body" id="modal-edit">
        <div class="form-group">
          <label class="col-lg-3 control-label">Name:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" name="name" value="name" required>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class="col-lg-3 control-label">Position:</label>
          <div class="col-lg-8">
            <input class="form-control" type="text" name="position" value="position">
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" type="email" name="email" value="email">
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class="col-lg-3 control-label">Password:</label>
          <div class="col-lg-8">
            <input class="form-control" type="password" name="password" value="password">
          </div>
        </div>  
        <br>
        <div class="form-group">
          <label class="col-lg-3 control-label">Password Confirmation:</label>
          <div class="col-lg-8">
            <input class="form-control" type="password" name="password_confirm" value="password">
          </div>
        </div>  
        <br> 
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-dismiss="modal">Close</a>
        <a id="update" class="btn btn-info">Save</a>
      </div>
      </form>
    </div>
  </div>

<!-- <script type="text/javascript">
$(function() {
      $('.select2-example').select2({
        placeholder: 'Select user',
        dropdownParent: $('#myModelDialog')
      });
    });
</script> -->