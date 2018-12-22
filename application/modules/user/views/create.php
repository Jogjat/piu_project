<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">
                <center>TAMBAH PENGGUNA</center>
            </h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('user/create') ?>" method="post"
              role="form" id="validation-form">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <label>Tipe</label>
                            <select name="tipe" class="form-control">
                                <?php
                                $user = array("admin", "non admin");
                                foreach ($user as $data) {
                                    ?>
                                    <option value="<?php echo strtolower($data); ?>"><?php echo $data; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <?php echo bs_input("Nama Pengguna"); ?>
                        <?php echo bs_input("Email", "required", null, "email"); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" type="submit"> TAMBAH</button>
            </div>
        </form>
        <?php echo px_validate()?>
    </div>
</div>