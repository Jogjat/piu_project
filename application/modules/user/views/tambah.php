<div class="col-md-9 personal-info">
  <?=$this->session->flashdata('notif')?>
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
        <input class="form-control" type="text" name="name" value="position">
      </div>
    </div>
    <br>
    <div class="form-group">
      <label class="col-lg-3 control-label">Email:</label>
      <div class="col-lg-8">
        <input class="form-control" type="email" name="name" value="email">
      </div>
    </div>
    <br>
    <div class="form-group">
      <label class="col-lg-3 control-label">Password:</label>
      <div class="col-lg-8">
        <input class="form-control" type="password" name="name" value="password">
      </div>
    </div>  
    <br> 
    <div class="form-group">
      <div class="col-md-8">
        <a class="btn btn-info" type="submit">Save</a>
      </div>
    </div>
</div>