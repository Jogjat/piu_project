<h4 class="m-y-1 font-weight-normal"><i class="fa fa-home"></i>&nbsp;&nbsp;/ Uploads</h4>
<div class="row">
    <div class="col-md-offset-10 col-md-2 ">
      <a data-toggle="modal" data-target="#tambah-folder" class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp; ADD FOLDER</a>
    </div>
</div>

    <?=$this->session->flashdata('notif')?>
    <table class="table">
      <thead>
        <tr><center>
          <th>No.</th>
          <th>Folder Name</th>
          <th>Create Date</th>
          <th><center>Action</center></th>
        </tr></center>
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
          <td><?php echo $no++; ?></td>
          <td><?php echo $data->folder_name; ?></td>
          <td><?php 
            $date = new DateTime();
            $date->setTimeZone(new DateTimeZone("Asia/Jakarta"));
            echo $date->format('d-m-y H:i:s');
            ?>
          </td>
          <td><center>
            <a href="<?php echo base_url(); ?>dokumentasi/edit/<?php echo $data->id_folder ?>" id="btnEdit"  target="ajax-modal" class="btn btn-info">Edit</a>
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
