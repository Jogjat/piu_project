<div class="row">
    <div class="col-md-offset-10 col-md-2 ">
       <a href="<?php echo base_url('dokumentasi/tambah') ?>" id="btnAdd" target="ajax-modal" class="btn btn-info"><span class="fa fa-plus"></span>&nbsp; ADD FOLDER</a>
    </div>
</div>
    <?=$this->session->flashdata('notif')?>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>Folder Name</th>
          <th>Create Date</th>
          <th><center>Action</center></th>
        </tr>
      </thead>
      <tbody>
      <?php
        $no=0;
        foreach($folder as $data)
        {
      ?>
        <tr>
          <td><?php echo ++$no; ?></td>
          <td><a href="<?php echo base_url(); ?>dokumentasi/subfolder/<?php echo $data->id_folder ?>"><?php echo $data->folder_name; ?></a></td>
          <td><?php echo strftime('%A, %d %B %Y', strtotime($data->create_date)); ?></td>
          <td><center>
            <a href="<?php echo base_url(); ?>dokumentasi/edit/<?php echo $data->id_folder ?>" id="btnEdit" target="ajax-modal" class="btn btn-info">Edit</a>
            <a class="btn btn-danger">Delete</a>
          </center>
          </td>
        </tr>
        <?php }
    ?>
      </tbody>
    </table>
  </div>

