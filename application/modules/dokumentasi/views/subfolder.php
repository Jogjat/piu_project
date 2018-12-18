<h4 class="m-y-1 font-weight-normal"><i class="fa fa-home"></i>&nbsp;&nbsp;/ Uploads</h4>
<div class="row">
    <div class="col-md-offset-10 col-md-2 ">
      <a data-toggle="modal" data-target="ajax-modal" class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp; ADD FOLDER</a>
    </div>
</div>

    <?=$this->session->flashdata('notif')?>
    <table class="table">
      <thead>
        <tr><center>
          <th>Folder Name</th>
          <th>Create Date</th>
          <th><center>Action</center></th>
        </tr></center>
      </thead>
      <tbody>
        <?php foreach ($data as $key => $value) { ?>
          <tr>
            <td>
              <a href="<?php echo base_url(); ?>dokumentasi/subfolder/<?php echo $value->id_folder ?>"><?php echo $value->folder_name?></a>
            </td>
            <td><?php echo $value->create_date?></td>
            <td>
              <center>
              <a href="<?php echo base_url(); ?>dokumentasi/edit/<?php echo $value->id_folder ?>" id="btnEdit"  target="ajax-modal" class="btn btn-info">Edit</a>
              <a class="btn btn-danger">Delete</a>
              </center>
            </td>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
