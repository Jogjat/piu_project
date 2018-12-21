<h4 class="m-y-1 font-weight-normal"><i class="fa fa-home"></i>&nbsp;&nbsp;/ <?php echo $bc; ?></h4>
<br>
<div class="row">
    <div class="col-md-12">
      <a href="<?php echo base_url('dokumentasi/upload'); ?>" id="btnUpload" target="ajax-modal" class="btn btn-primary btn-lg"><span class="fa fa-plus"></span>&nbsp; ADD FILE</a>&nbsp;&nbsp;
      <a href="<?php echo base_url('dokumentasi/create_subfolder').'/'.$id; ?>" id="btnAdd" target="ajax-modal" class="btn btn-info btn-lg"><span class="fa fa-plus"></span>&nbsp; ADD FOLDER</a><br><br>
    </div>
</div>

    <table class="table">
      <thead>
        <tr>
          <th>Folder Name</th>
          <th>Create Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $key => $value) { ?>
          <tr>
            <td>
              <a href="<?php echo base_url(); ?>dokumentasi/subfolder/<?php echo $value->id_folder ?>"><?php echo $value->folder_name ?></a>
            </td>
            <td><?php echo $value->create_date?></td>
            <td>
              <center>
              <a href="<?php echo base_url(); ?>dokumentasi/edit/<?php echo $value->id_folder ?>" id="btnEdit"  target="ajax-modal" class="btn btn-info">Edit</a>
              <a href="<?php echo base_url(); ?>dokumentasi/delete/<?php echo $value->id_folder ?>" id="btnDelete" target="ajax-modal" class="btn btn-danger">Delete</a>
              </center>
            </td>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
