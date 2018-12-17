<div class="row">
    <div class="col-md-offset-10 col-md-2 ">
      <a href="<?php echo base_url(); ?>user/add" id="btnAdd" class="btn btn-info"><span class="fa fa-plus"></span>&nbsp; ADD USER</a>
    </div>
</div>
    <?=$this->session->flashdata('notif')?>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>Username</th>
          <th>Role</th>
          <th><center>Action</center></th>
        </tr>
      </thead>
      <tbody>
      <?php
      if($fetch_data->num_rows() > 0)
      {
        foreach($fetch_data->result() as $data)
        {
          $no=0;
      ?>
        <tr>
          <td><?php echo ++$no; ?></td>
          <td><?php echo $data->username; ?></td>
          <td><?php echo $data->type; ?></td>
          <td><center>
            <a href="<?php echo base_url(); ?>user/edit/<?php echo $data->id_user ?>" id="btnEdit" class="btn btn-info">Edit</a>
            <a class="btn btn-danger">Delete</a>
          </center>
          </td>
        </tr>
        <?php }
      }
        else{
    ?>
       <tr>
          <td colspan="4">No Folder Found</td>
       </tr>
    <?php
    }
    ?>
      </tbody>
    </table>
  </div>

