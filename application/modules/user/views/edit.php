<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">
                <center>ATUR DATA PENGGUNA</center>
            </h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url(); ?>user/edit/<?php echo $users->id ?>" method="post"
              role="form" id="validation-form">
            <div class="modal-body" id="moda-edit">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label>Tipe</label>
                            <select name="tipe" class="form-control">
                                <?php
                                $user = array("admin", "bukan admin");
                                foreach ($user as $data) {
                                    ?>
                                    <option value="<?php echo strtolower($data); ?>"><?php echo $data; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label>Nama Pengguna</label>
                            <div>
                                <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $users->id; ?>">
                                <input class="form-control" type="text" name="nama_pengguna" id="username" value="<?php echo $users->username; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Depan</label>
                            <div>
                                <input class="form-control" type="text" name="nama_depan" id="first_name" value="<?php echo $users->first_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Belakang</label>
                            <div>
                                <input class="form-control" type="text" name="nama_belakang" id="last_name" value="<?php echo $users->last_name; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div>
                                <input class="form-control" type="text" name="email" id="email" value="<?php echo $users->email; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <div>
                                <input class="form-control" type="text" name="nomor_telepon" id="phone" value="<?php echo $users->phone; ?>">
                            </div>
                        </div>
                                     
                    </div>  
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Akses:</label>
                        <div class="col-lg-8">
                            <div class="m-b-2">
                            <select name="akses[]" class="form-control select2-example select2-hidden-accessible" multiple="" style="width: 100%" tabindex="-1" aria-hidden="true">
                            <?php foreach ($folder as $data): ?>
                                <option <?php echo $this->user_model->access($users->id,$data->id_folder) ? "selected" : "" ?> value="<?php echo $data->id_folder; ?>"><?php echo $data->folder_name; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        </div>
                    </div>      
                </div>

            <div class="modal-footer">
            <a class="btn btn-secondary" data-dismiss="modal">Batal</a>
            <button class="btn btn-info" type="submit"> Simpan</button>
      </div>
        </form>
        <?php echo px_validate()?>
        
    </div>
</div>
<script type="text/javascript">
$(function() {
      $('.select2-example').select2({
        placeholder: 'Pilih folder',
        dropdownParent: $('#myModelDialog')
      });
    });
</script>