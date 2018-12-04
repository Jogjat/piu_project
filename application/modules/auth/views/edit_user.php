<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <br>
            <div class="row">
                <div class="col-md-2 col-md-offset-5">
                    <img class="profile-user-img img-responsive img-circle"
                         src="<?php echo base_url(); ?>assets/images/user.jpg" alt="User profile picture">
                    <h3 class="profile-username text-center"><?php echo $this->ion_auth->user( $id )->row()->nama_lengkap ?></h3>
                </div>
            </div>
            <div class="panel-body">
				<?php echo form_open( uri_string(), array( 'id' => 'edit' ) ) ?>
                <div class="row">
                    <div class="col-md-6">
						<?php echo bs_input( 'Nama Lengkap', $this->ion_auth->user( $id )->row()->nama_lengkap ) ?>
                    </div>
                    <div class="col-md-6">
						<?php echo bs_input( 'Nama Publikasi', $this->ion_auth->user( $id )->row()->nama_publikasi ) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
						<?php echo bs_input( 'Email', $this->ion_auth->user( $id )->row()->email, 'email','email','email' ) ?>
                    </div>
                    <div class="col-md-6">
						<?php echo bs_input( 'Username', $this->ion_auth->user( $id )->row()->username, 'text', 'username' ) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
						<?php echo bs_input( 'NIP/NPU', $this->ion_auth->user( $id )->row()->nip, 'text', 'nip', 'nip' ) ?>
                    </div>
                    <div class="col-md-3">
						<?php echo bs_input( 'Nomor Telepon', $this->ion_auth->user( $id )->row()->no_telp ) ?>
                    </div>
                    <div class="col-md-3">
						<?php echo bs_input( 'UGM ID', $this->ion_auth->user( $id )->row()->ugm_id, 'text' ) ?>
                    </div>
                    <div class="col-md-2">
                        <label for="">Tingkat Jabatan</label>
                        <select name="tingkat_jabatan" class="form-control">
							<?php $tj = array( 3, 2, 1 ); ?>
							<?php foreach ( $tj as $data ): ?>
                                <option <?php echo $data == $this->ion_auth->user( $id )->row()->tingkat_jabatan ? 'selected' : '' ?>
                                        value="<?php echo $data ?>"><?php echo $data ?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
						<?php echo bs_input( 'Nomor Rekening', $this->ion_auth->user( $id )->row()->no_rekening, 'text' ) ?>
                    </div>
                    <div class="col-md-6">
						<?php echo bs_input( 'Atas Nama Rekening', $this->ion_auth->user( $id )->row()->ugm_id, 'text' ) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
						<?php echo bs_input( 'Nama Bank', $this->ion_auth->user( $id )->row()->nama_bank ) ?>
                    </div>
                    <div class="col-md-6">
						<?php echo bs_input( 'Bank Cabang', $this->ion_auth->user( $id )->row()->bank_cabang, 'text' ) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
						<?php echo bs_input( 'Jabatan Fungsional', $this->ion_auth->user( $id )->row()->jabatan_fungsional ) ?>
                    </div>
                    <div class="col-md-6">
						<?php echo bs_input( 'Golongan', $this->ion_auth->user( $id )->row()->golongan ) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
						<?php echo bs_input( 'Password (Isi jika ingin diubah)', null, 'password', 'password', 'password' ) ?>
                    </div>
                    <div class="col-md-6">
						<?php echo bs_input( 'Konfirmasi Password', null, 'password' ) ?>
                    </div>
                </div>
				<?php if ( $this->ion_auth->is_admin() ): ?>
                    <label class="control-label">Anggota dari Grup</label>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-0">
							<?php $i = 0; ?>
							<?php foreach ( $groups as $group ): ?>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input name="group[<?php echo $group['id']; ?>]" <?php echo in_array( $group['id'], $currentGroups ) ? "checked" : "" ?>
                                                   type="checkbox">
											<?php echo htmlspecialchars( $group['name'], ENT_QUOTES, 'UTF-8' ); ?>
                                        </label>
                                    </div>
                                </div>
								<?php $i ++; ?>
							<?php endforeach ?>
                        </div>
                    </div>
				<?php endif ?>
				<?php echo form_hidden( 'id', $user->id ); ?>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    pxInit.push(function () {
        $("#edit").pxValidate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                nama_lengkap: {
                    maxlength: 100,
                    required: true
                },
                nama_publikasi: {
                    maxlength: 100,
                    required: true
                },
                email: {
                    maxlength: 100,
                    required: true,
                    email: true
                },
                nomor_telepon: {
                    maxlength: 15,
                    required: true
                },
                username: {
                    maxlength: 100,
                    required: true,
                    remote: '<?php echo base_url( 'auth/api_username' ) ?>?old_username=<?php echo $this->ion_auth->user()->row()->username ?>'
                },
                password: {},
                konfirmasi_password: {
                    equalTo: "#password"
                }
            }
        });
    });
</script>
